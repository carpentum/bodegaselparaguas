<?php
if( !defined('ABSPATH') ) exit;

$count = 0;
if (is_admin () and !empty($_REQUEST['mtm_nonce']) && wp_verify_nonce($_REQUEST['mtm_nonce'], 'mtm_options_submitted') ) {
	$mtm_data = MTM_Builder::get_post();
	update_option ( 'mtm_data', $mtm_data );
	//quickly sanitize the post type custom data and save
	$mtm_custom = array('post-types'=>array());
	if( !empty($_REQUEST['mtm-post-types']) ){
		$post_types = get_post_types(array('public'=>true), 'names');
		foreach( $_REQUEST['mtm-post-types'] as $post_type ){
			if( in_array($post_type, $post_types) ){
				$mtm_custom['post-types'][] = $post_type;
			}
		}
	}
	update_option('mtm_custom', $mtm_custom);
	echo '<div id="message" class="updated fade"><p><strong>' . __ ( 'Settings saved.' ) . '</strong></p></div>'; // No textdomain: phrase used in core, too
} else {
	$mtm_custom = get_option('mtm_custom', array('post-type'=>array()));
}
?>
<script type="text/javascript" charset="utf-8"><?php include('js/meta-tag-manager-settings.js'); ?></script>
<div class="wrap tabs-active">
	<h1><?php esc_html_e( 'Meta Tag Manager', 'meta-tag-manager' ); ?></h1>
	<h2 class="nav-tab-wrapper">
		<a href="#builder" id="mtm-menu-builder" class="nav-tab nav-tab-active"><?php esc_html_e('Custom Meta Tags','meta-tag-manager'); ?></a>
		<a href="#general" id="mtm-menu-general" class="nav-tab"><?php esc_html_e('General Options','meta-tag-manager'); ?></a>
	</h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2 mtm-settings">
			<div id="postbox-container-2" class="postbox-container">
				<form action="" method="post">
					<?php wp_nonce_field('mtm_options_submitted', 'mtm_nonce'); ?>
					<div class="mtm-menu-general mtm-menu-group"  style="display:none;">
						<div id="mtm-post-types" class="postbox mtm-post-types">
							<h2 class="hndle"><?php esc_html_e('Post Type Support', 'meta-tag-manager'); ?></h2>
							<div class="inside">
								<p><?php esc_html_e('Enable the meta tag builder on the edit pages of your selected post types below. This will allow you to create specific post types for specific posts on your site.', 'meta-tag-manager'); ?></p>
								<?php
								//Post Types
								$post_type_options = array();
								foreach( get_post_types(array('public'=>true), 'objects') as $post_type){
									$post_type_options[$post_type->labels->name] = $post_type->name;
								}
								?>
								<select name="mtm-post-types[]" class="mtm-post-types-select" multiple>
									<option value=""><?php esc_html_e('choose one or more post types', 'meta-tag-manager'); ?></option>
									<?php
										echo MTM_Builder::output_select_options($post_type_options, $mtm_custom['post-types']);
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="mtm-menu-builder mtm-menu-group">
						<p><?php esc_html_e('Use the meta tag builder to create meta tags which will be used on your site. You can choose what kind of meta tag to display, as well as where to display them such as on all your pages, just the home page or specific post types and taxonomies.', 'meta-tag-manager'); ?></p>
						<p><?php esc_html_e('You can also enter a reference name at the top of each field card (something to help you remember the meta tag) and then enter the values below it that you want the meta tag to hold.', 'meta-tag-manager'); ?></p>
						<p><?php esc_html_e('For adding meta tags to specific post types, please click on the \'General Options\' tab above.', 'meta-tag-manager'); ?></p>
						<?php MTM_Builder::output(Meta_Tag_Manager::get_data(), array('context'=>true, 'reference'=>true)); ?>
					</div>
					<div class="mtm-actions">
						<button type="submit" class="button-primary"><?php esc_html_e('Save Changes','meta-tag-manager'); ?></button>
					</div>
				</form>
			</div>
			<div id="postbox-container-1" class="postbox-container">
					<div id="mtm-plugin-info" class="postbox ">
						<button type="button" class="handlediv button-link"
							aria-expanded="true">
							<span class="screen-reader-text"><?php echo sprintf(esc_html__('Toggle panel: %s'), esc_html__('About This Plugin','meta-tag-manager')); ?></span>
							<span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h2 class="hndle ui-sortable-handle">
							<span><?php esc_html_e('About This Plugin','meta-tag-manager'); ?></span>
						</h2>
						<div class="inside">
							<p>
								<?php echo sprintf(esc_html__('This plugin was developed by %s.', 'meta-tag-manager'), '<a href="http://msyk.es/?utm_source=meta-tag-manager&utm_medium=settings&utm_campaign=plugins" target="_blank">Marcus Sykes</a>'); ?>
							</p>
							<p style="color:green; font-weight:bold;">
								<?php
									echo sprintf(esc_html__('Please leave us a %s review on %s to show your support and help us keep making this plugin better!','meta-tag-manager'),
									'<a href="http://wordpress.org/support/view/plugin-reviews/meta-tag-manager?filter=5" target="_blank">★★★★★</a>',
									'<a href="https://wordpress.org/plugins/meta-tag-manager/" target="_blank">WordPress.org</a>'
									);
								?>
							</p>
						</div>
					</div>
					<div id="mtm-plugin-support" class="postbox ">
						<button type="button" class="handlediv button-link"
							aria-expanded="true">
							<span class="screen-reader-text"><?php echo sprintf(esc_html__('Toggle panel: %s'), esc_html__('Need Help?','meta-tag-manager')); ?></span>
							<span class="toggle-indicator" aria-hidden="true"></span>
						</button>
						<h2 class="hndle ui-sortable-handle">
							<span><?php esc_html_e('Need Help?','meta-tag-manager'); ?></span>
						</h2>
						<div class="inside">					
							<p>
								<?php echo sprintf(esc_html__('Please visit our %s if you have any questions.', 'meta-tag-manager'), 
										'<a href="http://wordpress.org/support/plugin/meta-tag-manager/" target="_blank">'.esc_html__('Support Forum','meta-tag-manager').'</a>'); ?>
							</p>
						</div>
					</div>
			</div>
		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div>