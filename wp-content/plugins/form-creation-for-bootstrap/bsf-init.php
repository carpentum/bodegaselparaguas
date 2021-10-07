<?php
/*
Plugin Name: Bootstrap Form Builder
Plugin URI: http://www.webtotal.co.uk
Description: Create your own forms using the powerful mobile first framework Bootstrap!
Version: 1.1.0
Author: Mark Morris
Author URI: http://www.webfwd.co.uk
License: GPL2

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

global $wpdb;

if (!class_exists('BS_Forms')) {

    class BS_Forms {

        //
        // @var (object) BS_Forms stores the instance of this class.
        //
        private static $instance;
        private static $loader;

        //
        // A dummy constructor to prevent BS_Forms from being loaded more than once.
        //
        // @access private
        // @since 0.1.0
        // @see BS_Forms::instance()
        // @see BS_Forms();
        //
        private function __construct() { /* Do nothing here */ }

        //
        // Main BS_Forms Instance
        //
        // Insures that only one instance of BS_Forms exists in memory at any one time.
        //
        // @access public
        // @since 0.1.0
        // @return object BS_Forms
        //
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self;
                self::$instance->init();
            }
            return self::$instance;
        }

        //
        // Initiate the plugin.
        //
        // @access private
        // @since 0.1.0
        // @return void
        //
        private function init() {
            
            // Initialise Plugin
            self::defineConstants();
            self::includeDependencies();

            // Init Loader
            self::$loader = new BS_Forms_Loader();

            // Common Hooks
            add_shortcode('bsforms', array( __CLASS__, 'generateShortcode'));
            self::$loader->add_action('init', __CLASS__, 'bsf_start_session', 1);

            //self::$loader->add_filter('widget_text', __CLASS__, 'do_shortcode', 11);
            add_filter( 'widget_text', 'do_shortcode' );

            // Admin Hooks
            $bsfAdmin = new BS_Forms_Admin();
            self::$loader->add_action('wp_ajax_bsf_ajax', $bsfAdmin, 'bsf_ajax_callback');
            self::$loader->add_action('admin_menu', $bsfAdmin, 'bsf_admin_register_menu');
            self::$loader->add_action('admin_enqueue_scripts', $bsfAdmin, 'bsf_admin_enqueue_scripts');
            self::$loader->add_action('admin_post_save_settings', $bsfAdmin, 'bsf_admin_save_settings');
            self::$loader->add_action('admin_post_update_form', $bsfAdmin, 'bsf_admin_update_form');

            // Call when plugin is activated to upgrade database
            self::$loader->add_action('plugins_loaded', __CLASS__, 'bsf_upgradeDB');

            // Active Plugin Hooks
            self::$loader->run();
        }

        //
        // Define the constants.
        //
        // @access private
        // @since 0.1.0
        // @return void
        //
        private static function defineConstants() {
            define( 'WPS_VERSION', '1.1.0' );
            define( 'WPS_DIR_NAME', plugin_basename( dirname( __FILE__ ) ) );
            define( 'WPS_BASE_NAME', plugin_basename( __FILE__ ) );
            define( 'WPS_BASE_PATH', plugin_dir_path( __FILE__ ) );
            define( 'WPS_BASE_URL', plugin_dir_url( __FILE__ ) );
        }

        //
        // Define the constants.
        //
        // @access private
        // @since 0.1.0
        // @return void
        //
        private static function includeDependencies() {

            // Include Loader Class
            require_once plugin_dir_path( __FILE__ ) . 'classes/loader.class.php';

            // Include Form Builder Class
            require_once plugin_dir_path( __FILE__ ) . 'classes/formbuilder.class.php';

            // Include Admin Class
            require_once plugin_dir_path( __FILE__ ) . 'classes/admin.class.php';

        }

        //
        // Called when activating via the activation hook.
        //
        // @access public
        // @since 0.1.0
        // @return void
        //
        public static function activate() {
            require_once plugin_dir_path( __FILE__ ) . 'classes/activate.class.php';
            BS_Forms_Activate::activate();
        }

        //
        // Called when deactivating via the deactivation hook.
        //
        // @access private
        // @since 0.1.0
        // @return void
        //
        public static function deactivate() {
            require_once plugin_dir_path( __FILE__ ) . 'classes/deactivate.class.php';
            BS_Forms_Deactivate::deactivate();
        }

        //
        // Called during the upgrade process.
        //
        // @access private
        // @since 0.1.4
        // @return void
        //
        public static function bsf_upgradeDB() {

            if ( get_site_option( 'bsf_db_version' ) != WPS_VERSION ) {
                self::activate();
            }

        }

        //
        // For Admin Post Sessions
        //
        // @access public
        // @since 0.4.0
        // @return void
        //
        public static function bsf_start_session() {
            if(!session_id()) {
                session_start();
            }
        }

        //
        // Deleting  Form
        //
        // @access public
        // @since 0.1.0
        // @return int
        //
        public static function deleteControl($field_id)
        {
            global $wpdb;
            return $wpdb->delete($wpdb->prefix . 'bs_formdata', array('data_id' => $field_id));
        }

        //
        // Generate Short Code BS_Forms
        //
        // @access public
        // @since 0.1.0
        // @return string
        //
        public static function generateShortcode($atts=array()) {
            global $wpdb;

            $formid = 0;
            $thankyou = "Thank You";

            // Get Shortcode Attributes
            extract(shortcode_atts(array(
                "formid" => '',
                "thankyou" => 'Thank You! We will be in contact shortly.'
            ), $atts));

            // No formid? Dont show anything...
            if ($formid == 0) return '';

            $query = 'SELECT * FROM `' . $wpdb->prefix . 'bs_forms` WHERE `' . $wpdb->prefix . 'bs_forms`.`form_id`=' . esc_sql($formid) . ' ORDER BY `form_id` ASC';

            // Get Form data from db
            $formData = $wpdb->get_row($query, ARRAY_A);

            // Simple
            $settings = get_option('bsf_settings');
            $settings = unserialize($settings);

            //
            // check if we have existing form data (even it its using pre 0.4.0)
            // if we have no data it wont load any form data, although the form is still savable
            //
            if (isset($formData['form_data']) && $formData['form_data']) {
                $temp = unserialize($formData['form_data']);
            } else {
                $temp = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_formdata` WHERE `' . $wpdb->prefix . 'bs_formdata`.`form_id`=' . esc_sql($formid) . ' ORDER BY `sort_id` ASC', ARRAY_A);
            }
            // MySQL retrieve form data
            //$formData = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_forms` INNER JOIN `' . $wpdb->prefix . 'bs_formdata` ON `' . $wpdb->prefix . 'bs_forms`.`form_id` = `' . $wpdb->prefix . 'bs_formdata`.`form_id` WHERE `' . $wpdb->prefix . 'bs_forms`.`form_id`=' . $formid . ' ORDER BY `' . $wpdb->prefix . 'bs_formdata`.`sort_id` ASC', ARRAY_A);

            // TODO: Merge Loop
            //foreach($formData as $key => $d) {
            //    $formData[] = $d['data_name'];
            //}

            // Clever Post
            $return = '<form class="form" id="bs_form_'.$formid.'" method="post"><input class="bs_hiddenfield" name="bs_form_'.$formid.'" type="hidden" value="'.$formid.'">';

            // Honey Pot Protection
            $return .= '<div style="height: 0; overflow: hidden;"><input class="form-control bs_honeypot" name="bs_form_hp_name" type="text" value=""></div>';

            // Post ;)
            if ($_POST['bs_form_'.$formid]) {

                $err = array();
                $hasCaptcha = false;

                // Honey Pot Protection
                if ($_POST['bs_form_hp_name']) {
                    $err['honey'] = 'Failed Spam Verification!';
                }

                // TODO: Merge Loop
                foreach($temp as $key => $d) {
                    $a = $d['data_name'];

                    $b = $d['data_type'];

                    if ($b == 99) {
                        $hasCaptcha = true;
                    }

                    if ($_POST[trim('bs_'.$a)]) {
                        $post_data[] = $a.','.$_POST['bs_'.$a];
                    }

                    if (!$_POST['bs_'.$a] > 0 && $d['data_req']) {
                        $err['bs_'.$a] = 'Missing Required Field: '.$d['data_name'];
                    }

                }

                // If $captcha is not set then its simply dont exist and continue
                if($hasCaptcha) {

                    if (strlen($_POST['g-recaptcha-response']) > 0) {
                        $captcha = $_POST['g-recaptcha-response'];

                        // Check if we have capture data
                        if (isset($captcha) && $captcha) {
                            $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $settings['security']['recaptcha_secrete_key'] . "&response=" . $captcha . ""), true);
                            if ($response['success'] == false) {
                                $err['bs_recaptcha'] = 'Failed reCaptcha. Your are a spammer';
                            }
                        }

                    } else {
                        $err['Captcha'] = 'Please complete the Captcha.';
                    }

                }

                //
                if (is_array($err) && isset($err) && $err) {

                    $msg = implode('<br>', $err);
                    $return .= '<div class="alert alert-danger" role="alert">'.$msg.'</div>';

                } else {

                    // Array of All Post Data
                    if ($post_data) {
                        $data = @implode(':', $post_data);
                        $body = @implode('<br>', $post_data);
                        $body = str_replace(',', ': ', $body);
                    }

                    //
                    // Check if we have master email if we set email on form itself use that one.
                    //
                    if (isset($settings['mail']['primary_email']) && $settings['mail']['primary_email']) {
                        $email = $settings['mail']['primary_email'];
                    } else if (isset($formData['form_email']) && $formData['form_email']) {
                        $email = $formData['form_email'];
                    }

                    // Email
                    $emailCC = $formData['form_emailCC'];

                    $emailHeader = '<h1>'.get_bloginfo().'</h1><br><br>You have received a Contact Enquiry. Further details below. <br><br>';

                    // Send Email
                    if (isset($email, $body)) {

                        // EMAIL HEADERS
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: '.$email.'' . "\r\n" .
                            'Reply-To: '.$email.'' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion() . "\r\n";

                        // CC
                        if (isset($emailCC) && $emailCC) {
                            $headers .= 'Cc: '.$emailCC. "\r\n";
                        }

                        @mail($email, get_bloginfo().' Enquiry', $emailHeader.$body, $headers);
                    }

                    $return .= '<div class="alert alert-success" role="alert">'.$thankyou.'</div>';

                    // If we have data
                    if (isset($data) && $data) {
                        $bs_sql = $wpdb->prepare("INSERT INTO " . $wpdb->prefix . "bs_postdata (post_data, form_id) VALUES (%s, %d)", $data, $formid);
                        $wpdb->query($bs_sql);
                    }

                }

            }

            $return .= '<div class="row">';

            foreach($temp as $key => $d) {

                //$columnCount = 0;
                //$columnCount += $d['data_column'];
                $hasError = '';
                $hasLabel = $d['data_label'];

                $xs = '';
                $sm = '';
                $md = '';
                $lg = '';
                $xl = '';

                if ($d['data_column_xs']) {
                    if ($settings['bootstrap']['version']=='' || $settings['bootstrap']['version'] =='3') {
                        $xs = 'col-xs-'.$d['data_column_xs'];
                    } else {
                        $xs = 'col-'.$d['data_column_xs'];
                    }
                }

                if ($d['data_column_sm']) {
                    $sm = 'col-sm-'.$d['data_column_sm'];
                }

                if ($d['data_column_md']) {
                    $md = 'col-md-'.$d['data_column_md'];
                }

                if ($d['data_column_lg']) {
                    $lg = 'col-lg-'.$d['data_column_lg'];
                }

                if ($d['data_column_xl']) {
                    $xl = 'col-xl-'.$d['data_column_xl'];
                }

                $return .= '<div class="'.$xs.' '.$sm.' '.$md.' '.$lg.' '.$xl.'">';

                if ($err['bs_'.$d['data_name']]) {
                    $hasError = ' has-error';
                }

                if ($d['data_type'] == 1) {

                    $return .= '<div class="form-group'.$hasError.'">'.($hasLabel?'<label>'.$hasLabel.'</label>':'').'<input '.($d['data_req']?'required':'').'  type="text" class="form-control ' . $d['data_class'] . '" name="bs_' . $d['data_name'] . '" placeholder="' . $d['data_placeholder'] . '"></div>';

                } elseif ($d['data_type'] == 2) {

                    $return .= '<div class="form-group'.$hasError.'">'.($hasLabel?'<label>'.$hasLabel.'</label>':'').'<textarea class="form-control ' . $d['data_class'] . '" name="bs_' . $d['data_name'] . '" placeholder="' . $d['data_placeholder'] . '"></textarea></div>';

                } elseif ($d['data_type'] == 3) {

                    if (is_array($d['options']) && $d['options']) {
                        $optionData = $d['options'];
                    } else {
                        $optionData = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_options` WHERE `data_id`='.$d['data_id'].' ORDER BY `data_id` DESC', ARRAY_A);
                    }

                    $return .= '<div class="form-group'.$hasError.'">'.($hasLabel?'<label>'.$hasLabel.'</label>':'').'<select class="form-control '.$d['data_class'].'" name="bs_'.$d['data_name'].'">';

                    if (is_array($optionData)) {
                        foreach($optionData as $o) {
                            $return .= '<option value="'.$o['option_value'].'">'.$o['option_text'].'</option>';
                        }
                    }
                    $return .= '</select></div>';

                } elseif ($d['data_type'] == 4) {

                    $return .= '<div class="form-group'.$hasError.'">'.($hasLabel?'<label>'.$hasLabel.'</label>':'').'<input '.($d['data_req']?'required':'').' type="number" class="form-control ' . $d['data_class'] . '" name="bs_' . $d['data_name'] . '" placeholder="' . $d['data_placeholder'] . '"></div>';

                } elseif ($d['data_type'] == 5) {

                    $return .= '<div class="form-group'.$hasError.'">'.($hasLabel?'<label>'.$hasLabel.'</label>':'').'<input '.($d['data_req']?'required':'').' type="email" class="form-control ' . $d['data_class'] . '" name="bs_' . $d['data_name'] . '" placeholder="' . $d['data_placeholder'] . '"></div>';

                } elseif ($d['data_type'] == 99) {

                    $return .= '<div class="form-group'.$hasError.'">';
                    $return .= '<div class="g-recaptcha" data-sitekey="'.$settings['security']['recaptcha_site_key'].'"></div>';
                    $return .= '</div>';

                }

                $return .= "</div>";

            }

            $return .= '</div>';

            $return .= '<button type="submit" class="btn btn-submit">Submit</button>';

            $return .= '</form>';

            return $return;
        }

    }

    //
    // The main function responsible for returning the BS_Forms instance
    // to functions everywhere.
    //
    // Use this function like you would a global variable, except without needing
    // to declare the global.
    //
    // Example: $bs_forms = BS_Forms();
    //
    // @access public
    // @since 1.0
    // @return mixed (object)
    //
    register_activation_hook(__FILE__, array('BS_Forms', 'activate'));
    register_deactivation_hook(__FILE__, array('BS_Forms', 'deactivate'));

    function BS_Forms() {
        return BS_Forms::getInstance();
    }

    //
    // Start the plugin.
    //
    add_action('plugins_loaded', 'BS_Forms' );

}





//
// Creating Widget Area for Bootstrap Forms
//
class BS_Forms_Widget extends WP_Widget {

    function __construct() {

        parent::__construct(

        // Base ID of your widget
            'bs_forms_widget',

            // Widget name will appear in UI
            __('Bootstrap Forms', 'bs_forms_widget_domain'),

            // Widget description
            array( 'description' => __( 'Display a form in a widget area.', 'bs_forms_widget_domain' ), )
        );

    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $formID = apply_filters( 'widget_form-id', $instance['form-id'] );
        $formStyle = $instance['formStyle'];

        if ($formStyle != 'none') {
            echo '<div class="panel panel-'.$formStyle.'">';
            echo '<div class="panel-heading">';
            echo '<h3 class="panel-title">'.$title.'</h3>';
            echo '</div>';
            echo '<div class="panel-body">';
            echo do_shortcode('[bsforms formid="'.$formID.'"]');
            echo '</div>';
            echo '</div>';
        } else {
            echo do_shortcode('[bsforms formid="'.$formID.'"]');
        }

    }

    // Widget Backend
    public function form( $instance ) {
        global $wpdb;

        $formData = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_forms` ORDER BY `form_id` ASC', ARRAY_A);
        $formID = 0;
        $formStyle = 'none';


        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'New title', 'bs_forms_widget_domain' );
        }

        if ( isset( $instance[ 'form-id' ] ) ) {
            $formID = $instance[ 'form-id' ];
        }

        if ( isset( $instance[ 'formStyle' ] ) ) {
            $formStyle = $instance[ 'formStyle' ];
        }


        ?>
        <div class="form-group">
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </div>

        <div class="form-group">
            <label for="<?php echo $this->get_field_id( 'form-id' ); ?>"><?php _e( 'Form ID:' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'form-id' ); ?>" name="<?php echo $this->get_field_name( 'form-id' ); ?>">
                <?php
                foreach ($formData as $f) {
                    echo '<option '.($formID==$f['form_id']?'selected':'').' value="'.$f['form_id'].'">'.$f['form_name'].'</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="<?php echo $this->get_field_id( 'formStyle' ); ?>"><?php _e( 'Style:' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'formStyle' ); ?>" name="<?php echo $this->get_field_name( 'formStyle' ); ?>">
                <option <?php echo ($formStyle=='none'?'selected':''); ?> value="none">None</option>
                <option <?php echo ($formStyle=='primary'?'selected':''); ?> value="primary">Panel Primary</option>
                <option <?php echo ($formStyle=='success'?'selected':''); ?> value="success">Panel Success</option>
                <option <?php echo ($formStyle=='info'?'selected':''); ?> value="info">Panel Information</option>
                <option <?php echo ($formStyle=='warning'?'selected':''); ?> value="warning">Panel Warning</option>
                <option <?php echo ($formStyle=='danger'?'selected':''); ?> value="danger">Panel Danger</option>
            </select>
        </div>
        <?php
    }

    //
    // Updating widget replacing old instances with new
    //
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['form-id'] = ( ! empty( $new_instance['form-id'] ) ) ? strip_tags( $new_instance['form-id'] ) : '';
        $instance['formStyle'] = ( ! empty( $new_instance['formStyle'] ) ) ? strip_tags( $new_instance['formStyle'] ) : '';
        return $instance;
    }

}

//
// Register and load the widget
//
function bs_forms_load_widget() {
    register_widget( 'bs_forms_widget' );
}
add_action( 'widgets_init', 'bs_forms_load_widget' );