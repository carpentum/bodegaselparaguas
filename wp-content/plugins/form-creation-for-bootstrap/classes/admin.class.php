<?php

class BS_Forms_Admin {

    private $builder;

    public function __construct() {

        $this->builder = new BS_Forms_Builder();

    }

    //
    // Register WordPress Menu
    //
    // @access private
    // @since 0.1.0
    // @return void
    //
    public function bsf_admin_register_menu() {

        // Add Top Level
        add_menu_page('Forms', 'Forms', 'administrator', WPS_BASE_PATH . 'index.php', '', 'dashicons-schedule', 57.122);

        // Add Sub Pages
        add_submenu_page(WPS_BASE_PATH . 'index.php', 'View Forms', 'View Forms', 'administrator', WPS_BASE_PATH . 'index.php');
        add_submenu_page(WPS_BASE_PATH . 'index.php', 'Create Form', 'Create Form', 'administrator', WPS_BASE_PATH . 'create-form.php');
        add_submenu_page(WPS_BASE_PATH . 'index.php', 'Settings', 'Settings', 'administrator', WPS_BASE_PATH . 'settings.php');


        add_submenu_page(NULL, 'Posts', 'Posts', 'administrator', WPS_BASE_PATH . 'posts.php');
    }

    //
    // Enqueue the CSS and JavaScripts.
    //
    // @access public
    // @since 0.1.0
    // @return void
    //
    public function bsf_admin_enqueue_scripts($hook)
    {
        // all plugin pages
        if ($hook == WPS_DIR_NAME . '/index.php' || $hook == WPS_DIR_NAME . '/settings.php' || $hook == WPS_DIR_NAME . '/create-form.php' || $hook == WPS_DIR_NAME . '/posts.php') {

            // Style
            wp_enqueue_style('jquery_ui_theme', '//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css', array(), WPS_VERSION, 'all');
            wp_enqueue_style('bs_admin_style', plugins_url('assets/style.css', dirname(__FILE__)), array(), WPS_VERSION, 'all');
            wp_enqueue_style('bs_bootstrap_style', plugins_url('assets/bootstrap.min.css', dirname(__FILE__)), array(), WPS_VERSION, 'all');

            // Enque jQuery (All Pages)
            wp_enqueue_script('jquery');
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script('jquery-ui-tabs');

            wp_enqueue_script('bs_recaptcha', '<script src="https://www.google.com/recaptcha/api.js"></script>', array(), WPS_VERSION);

            // only on "/create-form.php"
            if ($hook == WPS_DIR_NAME . '/create-form.php') {
                wp_enqueue_script('bs_functions', plugins_url('assets/functions.js', dirname(__FILE__)), array(), WPS_VERSION);
            }


            // only on "/create-form.php"
            if ($hook == WPS_DIR_NAME . '/settings.php') {
                wp_enqueue_script('bs_settings', plugins_url('assets/settings.js', dirname(__FILE__)), array(), WPS_VERSION);
            }


            $bsf_ajaxArray = array(
                'plugin_url' => plugins_url('',dirname(__FILE__)),
                'ajax_url' => admin_url( 'admin-ajax.php' )
            );
            wp_localize_script( 'bs_functions', 'ajax_object', $bsf_ajaxArray);


        }
    }

    //
    // Ajax Callback Functions
    //
    // @access public
    // @since 0.1.0
    // @return void
    //
    public function bsf_ajax_callback() {

        if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

            // CHECK ACTIONS
            if (isset($_POST['post_type'])) {

                // Get Type
                $a = (string)sanitize_text_field($_POST['post_type']);

                if ($a == 'addFormType') {

                    $formType = (int)sanitize_text_field($_POST['type']);
                    $formID = (int)sanitize_text_field($_POST['order']);

                    // Return JSON Array
                    echo $this->builder->getInputType($formType, $formID, array());
                    wp_die();
                }

                if ($a == 'addOption') {

                    $input_id = (int)sanitize_text_field($_POST['input_id']);

                    // Return JSON Array
                    echo $this->builder->generateOption($input_id);
                    wp_die();
                }

            }

        }
        ob_clean();
        print_r($_POST);
        wp_die(); // this is required to terminate immediately and return a proper response

    }

    //
    // For Admin Post Requests (Settings)
    //
    // @access public
    // @since 0.4.2
    // @return void
    //
    public function bsf_admin_save_settings()
    {

        // Init
        $sanitisedData = array();

        //
        // Validation
        //
        if (is_array($_POST['settings']) && $_POST['settings']) {
            $sanitisedData = serialize($_POST['settings']);
        }

        // Update Option
        update_option('bsf_settings', $sanitisedData);

        $_SESSION['message']['ok'] = 'Saved Successfully';

        header('location: '.admin_url('admin.php?page=form-creation-for-bootstrap%2Fsettings.php'));
        exit;

    }

    //
    // For Admin Post Requests
    //
    // @access public
    // @since 0.4.0
    // @return void
    //
    public function bsf_admin_update_form() {
        global $wpdb;

        // Init
        $sanitisedData = array();
        $sanitisedType = array();
        $err = array();

        //
        // Validation
        //

        if (is_array($_POST) && $_POST) {

            // Sanitize Course ID, if we don't have one then we are attempting to create a new course
            if (isset($_POST['form_id']) && $_POST['form_id']) {
                //$sanitisedData['course_updated'] = date('Y-m-d H:i:s');
                $sanitisedData['form_id'] = (int)sanitize_text_field($_POST['form_id']);
                $sanitisedType[] = '%d';

            } else {
                //$sanitisedData['course_added'] = date('Y-m-d H:i:s');
            }

            // Sanitize Form Name
            if (isset($_POST['formname']) && $_POST['formname']) {
                $sanitisedData['form_name'] = (string)sanitize_text_field($_POST['formname']);
                $sanitisedType[] = '%s';
            }

            // Sanitize Form Email
            if (isset($_POST['formemail']) && $_POST['formemail']) {
                $sanitisedData['form_email'] = (string)sanitize_text_field($_POST['formemail']);
                $sanitisedType[] = '%s';
            }

            // Sanitize Form Email CC
            if (isset($_POST['formemailcc']) && $_POST['formemailcc']) {
                $sanitisedData['form_emailCC'] = (string)sanitize_text_field($_POST['formemailcc']);
                $sanitisedType[] = '%s';
            }

            // Sanitize Form Data
            if (isset($_POST['form']) && $_POST['form']) {

                foreach($_POST['form'] as $key => $f) {

                    $tempArray = array();

                    // Most Important (MUST BE SANITIZED)
                    // TODO: Use Function()
                    $fieldName = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $f['data_name'])));
                    $fieldName = str_replace(' ', '_', $fieldName);
                    $tempArray['data_name'] = (string)strtolower(sanitize_text_field($fieldName));

                    // Common
                    $tempArray['data_type'] = (int)sanitize_text_field($f['data_type']);

                    if ($f['data_type'] != 99) {
                        $tempArray['data_label'] = (string)sanitize_text_field($f['data_label']);
                        $tempArray['data_class'] = (string)sanitize_text_field($f['data_class']);
                    }

                    // 1 and 2 only
                    if ($f['data_type'] == 1 || $f['data_type'] == 2 || $f['data_type'] == 4 || $f['data_type'] == 5) {


                        $tempArray['data_placeholder'] = (string)sanitize_text_field($f['data_placeholder']);

                    }

                    // For all types
                    if ($f['data_type'] != 99) {
                        $tempArray['data_req'] = (int)sanitize_text_field($f['data_req']);
                    }

                    if ($f['data_type'] == 3) {

                        $i = 0;

                        if (is_array($f['optionname']) && $f['optionname']) {
                            foreach($f['optionname'] as $keyO => $o) {

                                // If blank dont save
                                if ($o) {
                                    $tempArray['options'][$i]['option_text'] = (string)$o;
                                    $tempArray['options'][$i]['option_value'] = (string)($f['optionvalue'][$keyO]?$f['optionvalue'][$keyO]:0);
                                    $i++;
                                }

                            }
                        }

                    }

                    // Columns
                    $tempArray['data_column_xs'] = (int)sanitize_text_field($f['data_column_xs']);
                    $tempArray['data_column_sm'] = (int)sanitize_text_field($f['data_column_sm']);
                    $tempArray['data_column_md'] = (int)sanitize_text_field($f['data_column_md']);
                    $tempArray['data_column_lg'] = (int)sanitize_text_field($f['data_column_lg']);
                    $tempArray['data_column_xl'] = (int)sanitize_text_field($f['data_column_xl']);

                    // Append to Sanitized Array
                    $sanitisedData['form_data'][] = $tempArray;

                }

                //
                // Serialise Form Data
                //
                $sanitisedData['form_data'] = serialize($sanitisedData['form_data']);
                $sanitisedType[] = '%s';

            }

        }

        //
        // End Validation
        //

        //
        // Required Fields
        //

        // Form Name
        if (!(isset($sanitisedData['form_name']) && $sanitisedData['form_name'])) {
            $err['form_name'] = 'Please enter a form name...';
        }

        //
        // End Required Fields
        //





        // If we have error set error message and continue else save and redirect
        if ($err) {

            //
            $_SESSION['message']['error'] = implode('<br>', $err);

            // Save Post so we don't lose data, unset once we uses the array
            $_SESSION['form'] = $_POST;

            // If its an insert we have value
            if ($sanitisedData['form_id']  > 0) {
                $redirectID = $sanitisedData['form_id'];
            } else {
                $redirectID = $wpdb->insert_id;
            }

            // Redirect back to form page
            header('location: '.admin_url('admin.php?page=form-creation-for-bootstrap%2Fcreate-form.php&action=edit&id='.$redirectID));
            exit;

        } else {

            //
            $wpdb->replace($wpdb->prefix . 'bs_forms', $sanitisedData, $sanitisedType);

            // If its an insert we have value
            if ($sanitisedData['form_id']  > 0) {
                $redirectID = $sanitisedData['form_id'];
            } else {
                $redirectID = $wpdb->insert_id;
            }

            $_SESSION['message']['ok'] = 'Saved Successfully';

            header('location: '.admin_url('admin.php?page=form-creation-for-bootstrap%2Fcreate-form.php&action=edit&id='.$redirectID));
            exit;

        }

    }


}