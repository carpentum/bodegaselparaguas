<?php
global $wpdb;

//
include( plugin_dir_path( __FILE__ ) . 'assets/functions.php');

// LOL :D Thank you WordPress Very Easy
if (get_option('bsf_settings')) {
    $settings = get_option('bsf_settings');
    $settings = unserialize($settings);
}
?>
<div class="bs_container">

    <?php include( plugin_dir_path( __FILE__ ) . 'assets/header.php'); ?>

    <div class="col-12">
        <h1 class="bs_title">Bootstrap Form Settings</h1>
    </div>

    <?php include( plugin_dir_path( __FILE__ ) . 'assets/message.php'); ?>


    <!-- FORM -->
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">

        <input type="hidden" name="action" value="save_settings">


            <div class="col-9">

                <div id="tabs">

                    <ul>
                        <li><a href="#bootstrap">Bootstrap</a></li>
                        <li><a href="#mail">Email</a></li>
                        <li><a href="#security">Security</a></li>
                    </ul>

                    <div id="bootstrap">

                        <h2 class="title">Bootstrap Version</h2>

                        <table class="form-table">
                            <tbody>

                            <tr>
                                <th><label for="settings[bootstrap][version]">Bootstrap Version</label></th>
                                <td>
                                    <select class="regular-text" name="settings[bootstrap][version]"">
                                        <option <?php echo ($settings['bootstrap']['version'] == '' || $settings['bootstrap']['version'] == '3' ? 'selected' : ''); ?> value="3">Bootstrap 3</option>
                                        <option <?php echo ($settings['bootstrap']['version'] == '4' ? 'selected' : ''); ?> value="4">Bootstrap 4</option>
                                    </select>
                                    <p class="description">NOTE: This will not include bootstrap.</p>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div id="mail">

                        <h2 class="title">Global Email Settings</h2>

                        <table class="form-table">
                            <tbody>

                            <tr>
                                <th><label for="settings[mail][primary_email]">Primary Email</label></th>
                                <td>
                                    <input type="text" class="regular-text" name="settings[mail][primary_email]" value="<?php echo (isset($settings['mail']['primary_email'])?$settings['mail']['primary_email']:''); ?>">
                                    <p class="description">The main email address for form submission notifications.</p>
                                </td>
                            </tr>

                            <tr>
                                <th><label for="settings[mail][header_image_url]">Header Image URL</label></th>
                                <td>
                                    <input type="text" class="regular-text" name="settings[mail][header_image_url]" value="<?php echo (isset($settings['mail']['header_image_url'])?$settings['mail']['header_image_url']:''); ?>">
                                    <p class="description">URL to the image you want to use on your email header.</p>
                                </td>
                            </tr>

<!--                            <tr>-->
<!--                                <th><label for="settings[mail][footer_text]">Footer Text</label></th>-->
<!--                                <td>-->
<!---->
<!--                                    --><?php
//                                    $editorSettings = array(
//                                        'teeny' => true,
//                                        'textarea_name' => 'settings[mail][footer_text]',
//                                        'textarea_rows' => 10
//                                    );
//
//                                    wp_editor((isset($settings['mail']['footer_text'])?isset($settings['mail']['footer_text']):''), 'settings[mail][footer_text]', $editorSettings);
//                                    ?>
<!---->
<!--                                    <p class="description">The text to appear in the email footer.</p>-->
<!--                                </td>-->
<!--                            </tr>-->




                            </tbody>

                        </table>

                    </div>

                    <div id="security">

                        <h2 class="title">Google reCAPTCHA Spam Protection</h2>

                        <table class="form-table">
                            <tbody>

                            <tr>
                                <th><label for="settings[security][recaptcha_site_key]">Site Key</label></th>
                                <td>
                                    <input type="text" class="regular-text" name="settings[security][recaptcha_site_key]" value="<?php echo $settings['security']['recaptcha_site_key']; ?>">
                                    <p class="description">Enter Google reCaptcha Site Key.</p>
                                </td>
                            </tr>

                            <tr>
                                <th><label for="settings[security][recaptcha_secrete_key]">Secrete Key</label></th>
                                <td>
                                    <input type="text" class="regular-text" name="settings[security][recaptcha_secrete_key]" value="<?php echo $settings['security']['recaptcha_secrete_key']; ?>">
                                    <p class="description">Enter Google reCaptcha Secret Key.</p>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <h2 class="title">What is reCAPTCHA?</h2>

                        <p>reCAPTCHA is a free service that protects your website from spam and abuse. reCAPTCHA uses an advanced risk analysis engine and adaptive CAPTCHAs to keep automated software from engaging in abusive activities on your site. It does this while letting your valid users pass through with ease.</p>

                        <p>reCAPTCHA offers more than just spam protection. Every time our CAPTCHAs are solved, that human effort helps digitize text, annotate images, and build machine learning datasets. This in turn helps preserve books, improve maps, and solve hard AI problems.</p>

                        <a class="button button-primary" target="_blank" href="https://www.google.com/recaptcha/admin">Get reCAPTCHA</a>

                    </div>



                </div>
                <br><br>


            </div>

            <div class="col-3">

                <div style="margin-top:30px;" class="panel">
                    <h2 class="panel-title">Plugin Info</h2>

                    <p>Plugin Name : <strong>Bootstrap Forms</strong></p>

                    <p>Author: <a href="https://profiles.wordpress.org/mozza912/" target="_blank"><strong>Mark Morris</strong></a></p>

                    <p>Website: <a href="https://www.webfwd.co.uk" target="_blank"><strong>Webforward</strong></a></p>

                    <p style="margin-bottom:0;">Email: <a href="mailto:support@webfwd.co.uk" target="_blank"><strong>support@webfwd.co.uk</strong></a></p>


                </div>

                <button class="button button-primary button-block button-xl" type="submit">Save Settings</button>

            </div>




    </form>

</div>