<?php

//
if (isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id']) {
    global $wpdb;
    $wpdb->delete($wpdb->prefix . 'bs_forms', array('form_id' => $_GET['id']));
    $wpdb->delete($wpdb->prefix . 'bs_formdata', array('form_id' => $_GET['id']));
}

if(!class_exists( 'WP_List_Table')) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

//TODO: CHANGE COLUMN METHOD SO ITS MORE DYNAMIC

// MY CUSTOM TABLE CLASS //
class customTable extends WP_List_Table {

    // CONTAINS TABLE DATA //
    public $dataArray = array();

    function column_form_name($item)
    {
        $actions = array(
            'edit' => sprintf('<a href="?page=' . WPS_DIR_NAME . '/create-form.php&action=%s&id=%s">Edit</a>', 'edit', $item['form_id']),
            'delete' => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>', $_REQUEST['page'], 'delete', $item['form_id']),
        );

        return sprintf('%1$s %2$s', $item['form_name'], $this->row_actions($actions));
    }

    function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $this->dataArray;
    }

    function get_columns() {
        $columns = array(
            'form_name' => 'Name',
            'form_posts' => 'Posts',
            'form_shortcode' => 'Shortcode'
        );
        return $columns;
    }

    function column_default( $item, $column_name ) {
        global $wpdb;

        switch( $column_name ) {
            case 'form_name':
                return $item[$column_name];
            case 'form_posts':

                $postData = $wpdb->get_results("SELECT * FROM `" . $wpdb->prefix . "bs_postdata` WHERE `form_id`=" . $item['form_id'], ARRAY_A);
                $count = count($postData);

                if ($count > 0) {
                    return '<a href="?page=' . WPS_DIR_NAME . '/posts.php&id=' . $item['form_id'] . '">' . $count . ' (Click to View)</a>';
                } else {
                    return 0;
                }
            case 'form_shortcode':
                return '[bsforms formid="'.$item['form_id'].'"]';
            default:
                return print_r($item, true) ; //Show the whole array for troubleshooting purposes
        }

    }

}

function my_add_menu_items(){
    add_menu_page( 'My Plugin List Table', 'My List Table Example', 'activate_plugins', 'my_list_test', 'customTable' );
}
add_action( 'admin_menu', 'my_add_menu_items');

//
global $wpdb;
$data = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_forms`', ARRAY_A);

?>
    <!--<link href="<?php /*echo plugins_url('', __FILE__); */ ?>/assets/style.css" rel="stylesheet" type="text/css"/>-->



<?php
$myListTable = new customTable();
$myListTable->dataArray = $data;
$myListTable->prepare_items();

echo '<div class="bs_container">';

include( plugin_dir_path( __FILE__ ) . 'assets/header.php');

$text = '<p class="bs_text">Thank you for choosing Bootstrap Forms. With Bootstrap Forms you can create responsive forms for your website using the famous mobile fist Bootstrap Framework. We look forward to having you as a part of our community and serve your web design needs.</p>';

echo '<div class="col-100">';
echo '<h1 class="bs_title">Form List</h1> ' . $text . ' <a class="btn btn-control" href="?page=' . WPS_DIR_NAME . '/create-form.php">Create Form</a>';
echo '</div>';


echo '<div class="col-75">';
$myListTable->display();
echo '</div>';


echo '<div class="col-25">';

echo '
<div class="bs_panel height-modi">



    <h3 class="bs_title">Bootstrap Forms <div class="fright">Version: ' . WPS_VERSION . '</div></h3>

    <div class="bs_body">
    <img class="logo" src="' . WPS_BASE_URL . 'assets/logo.png">
    <p><strong>We are WordPress specialists!</strong><br>We help small and medium size businesses by developing bespoke web based applications that improve efficiency, reduce costs and eliminate non-value added processes. </p>
<br>
    <a class="btn btn-control btn-block" href="https://www.webfwd.co.uk">Visit the website</a>
    <br>
 <div class="clear"></div>
    <a class="bs_icon facebook" href="https://www.facebook.com/webfwdltd"><span class="dashicons dashicons-facebook clear"></span></a>
    <a class="bs_icon twitter" href="https://twitter.com/webfwd"><span class="dashicons dashicons-twitter clear"></span></a>
    <div class="clear"></div>
    <p> </p>
    </div>

</div>
';

echo '</div>';


echo '</div>';

?>