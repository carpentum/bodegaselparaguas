<?php
global $wpdb;

//
include( plugin_dir_path( __FILE__ ) . 'assets/functions.php');

//
// Check for integer value
//
if (isset($_GET['id']) && (int)$_GET['id'] > 0) {

    $form_id = (int)$_GET['id'];

    $query = 'SELECT * FROM `' . $wpdb->prefix . 'bs_forms` WHERE `' . $wpdb->prefix . 'bs_forms`.`form_id`=' . esc_sql($form_id) . ' ORDER BY `form_id` ASC';

    // Get Form data from db
    $formData = $wpdb->get_row($query, ARRAY_A);

    //
    // check if we have existing form data (even it its using pre 0.3.1)
    // if we have no data it wont load any form data, although the form is still savable
    //
    if (isset($formData['form_data']) && $formData['form_data']) {
        $temp = unserialize($formData['form_data']);
    } else {
        $temp = $wpdb->get_results('SELECT * FROM `' . $wpdb->prefix . 'bs_formdata` WHERE `' . $wpdb->prefix . 'bs_formdata`.`form_id`=' . esc_sql($form_id) . ' ORDER BY `sort_id` ASC', ARRAY_A);
    }

}

?>

<div class="bs_container">

    <?php include( plugin_dir_path( __FILE__ ) . 'assets/header.php'); ?>

    <!-- FORM -->
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <input type="hidden" name="action" value="update_form">
        <input type="hidden" name="form_id" value="<?php echo (isset($_GET['id']) && $_GET['id']?$_GET['id']:''); ?>">

        <div class="col-100">
            <h1 class="bs_title"><?php echo isset($_GET['id']) ? 'Edit Form' : 'Create Form'; ?></h1>

            <p class="bs_text"><?php echo isset($_GET['id']) ? $edit_str : $new_str; ?></p>
        </div>
        
        <?php include( plugin_dir_path( __FILE__ ) . 'assets/message.php'); ?>

        <div class="col-9">

            <input name="formname" class="form-control input input-lg" placeholder="Please enter a form name... (Required)" value="<?php echo $formData['form_name']; ?>">

            <div class="row">

                <div class="col-3">
                    <div class="panel">
                        <h2 class="panel-title">Toolbox</h2>

                        <div>
                            <h4>General Fields</h4>
                            <button type="button" class="btn btn-default btn-block btn-sm fielditem addtext" data-type="1">Text</button>
                            <button type="button" class="btn btn-default btn-block btn-sm fielditem addtext" data-type="4">Number</button>
                            <button type="button" class="btn btn-default btn-block btn-sm fielditem addtext" data-type="5">Email</button>
                            <button type="button" class="btn btn-default btn-block btn-sm fielditem addtext" data-type="2">Text Area</button>
                            <button type="button" class="btn btn-default btn-block btn-sm fielditem addtext" data-type="3">Select</button>
                        </div>

                        <div>
                            <h4>Security</h4>
                            <button type="button" class="btn btn-danger btn-block btn-sm fielditem addtext" data-type="99">reCaptcha</button>
                        </div>

                    </div>
                </div>

                <div class="col-9">

                    <div class="bsf-preview">

                        <div class="panel">

                            <h2 class="panel-title">Form Builder</h2>

                            <p>You can Drag + Drop the Form Controls to change the order of how they will be displayed.</p>

                            <ul id="sortable">

                                <?php if (isset($temp)) {
                                    $i = 0;
                                    $builder = new BS_Forms_Builder();

                                    foreach($temp as $key => $d) {
                                        $type = $d['data_type'];
                                        if ($type > 0) {
                                            echo $builder->getInputType($type, $i, $d);
                                            $i++;
                                        }
                                    }
                                } ?>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-3">

            <div class="createform">

                <div>
                    <h3 class="fancy_title">Email Settings</h3>

                    <label>Form Email</label>
                    <input name="formemail" class="form-control" placeholder="Form Email" value="<?php echo $formData['form_email']; ?>">

                    <label>Form Email (CC)</label>
                    <input name="formemailcc" class="form-control" placeholder="Form Email CC" value="<?php echo $formData['form_emailCC']; ?>">

                </div>

            </div>

            <!-- SUBMIT BUTTON -->
            <button type="submit" class="button button-primary button-xl button-block">Save Form</button>

            <br><br>

            <div class="panel">

                <h2 class="panel-title">Shortcode</h2>

                <p class="bs_text"><strong>Copy and Paste</strong> the following <strong>Shortcode</strong> into any post or widget
                    area to display the form. </p>

                <p class="bs_text change" style="font-size:22px;"><strong>[bsforms formid="<?php echo $_GET['id']; ?>"]</strong></p>

            </div>

        </div>

    </form>

</div>