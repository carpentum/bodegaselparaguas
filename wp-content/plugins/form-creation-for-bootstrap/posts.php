<?php

//
if ($_GET['action'] == 'delete' && $_GET['post_id'] && $_GET['id']) {
    global $wpdb;
    $post_id = (int)esc_sql($_GET['post_id']);
    $wpdb->delete($wpdb->prefix . 'bs_postdata', array('post_id' => $post_id));
}

//
if ($_GET['id']) {
    global $wpdb;
    $data = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_postdata` WHERE `form_id`=' . esc_sql($_GET['id']) . ' ORDER BY `post_id` DESC', ARRAY_A);
} else {
    echo '<h1>No Posts</h1>';
    exit;
}

//
if (!is_array($data)) {
    echo '<h1>No Posts</h1>';
    exit;
}
?>

<div class="bs_container">

    <?php include( plugin_dir_path( __FILE__ ) . 'assets/header.php'); ?>

    <div class="col-12">
        <h1 class="bs_title">Posts</h1>
    </div>

    <div class="clear"></div>

    <div class="col-9">
    <?php
    foreach($data as $key => $d) {
        if ($d['post_data']) {

            $posts = explode(':', $d['post_data']);

            echo '<div class="panel"><a style="margin: 1em 0 0;" class="pull-right button button-secondary" href="?page=' . WPS_DIR_NAME . '/posts.php&action=delete&id='.$_GET['id'].'&post_id='.$d['post_id'].'">Delete</a> <h2 class="panel-title">Post Date: '.$d['post_added'].'</h2><div class="inner">';
            echo '<table class="form-table"><tbody>';

            foreach ($posts as $p) {
                echo '<tr>';
                $post = explode(',',$p);
                echo '<th>'.strtoupper($post[0]).': </th>';
                echo '<td>'.$post[1].'</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
            echo '</div></div>';

        }
    }
    ?>
    </div>

</div>