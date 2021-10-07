<?php
/*
Copyright (C) 2016 Marcus Sykes

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
if( !defined('ABSPATH') ) exit;

class Meta_Tag_Manager_Admin {
	
	/** loads the plugin */
	public static function init() {	
	    global $pagenow;
		// add plugin page to admin menu
		add_action ( 'admin_menu', array ( __CLASS__, 'menus' ) );
		if( version_compare(MTM_VERSION, get_option('mtm_version', 0)) ){
			include_once('mtm-update.php');
		}
		if($pagenow == 'post.php' || $pagenow == 'post-new.php' ){ //only needed if editing post 
			//meta boxes
			add_action('add_meta_boxes', 'Meta_Tag_Manager_Admin::meta_boxes');
    		//Save/Edit actions
    		add_filter('wp_insert_post_data', 'Meta_Tag_Manager_Admin::wp_insert_post_data', 100, 2); //validate post meta before saving is done
		}		
	}
	
	public static function load_plugin_textdomain(){
		load_plugin_textdomain('meta-tag-manager', false, dirname( plugin_basename( __FILE__ ) ).'/languages');
	}
	
	/** adds plugin page to admin menu; put it under 'Settings' */
	public static function menus() {
		$page = add_options_page ( __ ( 'Meta Tag Manager', 'meta-tag-manager' ), __ ( 'Meta Tag Manager', 'meta-tag-manager' ), 'list_users', 'meta-tag-manager', 'Meta_Tag_Manager_Admin::options' );
		// add javascript
		add_action ( "admin_enqueue_scripts", 'Meta_Tag_Manager_Admin::scripts', 10, 1 );
	}
	
	/** loads javascript on plugin admin page */
	public static function scripts( $hook ) {
	    if( in_array($hook, array('post.php', 'post-new.php', 'settings_page_meta-tag-manager')) ){
	        if($hook == 'post.php' || $hook == 'post-new.php' ){
	            global $post;
	            $mtm_custom = get_option('mtm_custom');
	            if( !in_array($post->post_type, $mtm_custom['post-types']) ) return;
	        }
	        $jquery_deps = array('jquery','jquery-ui-core','jquery-ui-widget','jquery-ui-mouse','jquery-ui-sortable');
	        if( defined('WP_DEBUG') && WP_DEBUG ){
		        wp_enqueue_script('mtm-selectize', plugins_url('js/selectize.js',__FILE__), $jquery_deps, MTM_VERSION);
    			wp_enqueue_script('meta-tag-manager', plugins_url('js/meta-tag-manager.js',__FILE__), $jquery_deps, MTM_VERSION);
    			wp_enqueue_style('mtm-selectize', plugins_url('css/selectize.css',__FILE__), array(), MTM_VERSION);
    			wp_enqueue_style('meta-tag-manager', plugins_url('css/meta-tag-manager.css',__FILE__), array(), MTM_VERSION);
	        }else{
		        wp_enqueue_script('mtm-selectize', plugins_url('js/selectize.min.js',__FILE__), $jquery_deps, MTM_VERSION);
	        	wp_enqueue_script('meta-tag-manager', plugins_url('js/meta-tag-manager.js',__FILE__), $jquery_deps, MTM_VERSION);
	        	wp_enqueue_style('meta-tag-manager', plugins_url('css/meta-tag-manager.min.css',__FILE__), array(), MTM_VERSION);
	        }
	    }
	}
	
	public static function meta_boxes(){
	    global $post;
	    //no need to proceed if we're not dealing with posts we're set to add meta
	    $mtm_custom = get_option('mtm_custom');
	    add_meta_box('meta-tag-manager', __('Meta Tag Manager','meta-tag-manager'), 'Meta_Tag_Manager_Admin::post_meta_box', $mtm_custom['post-types'], 'normal','low');
	}
	
	public static function post_meta_box(){
		global $post;
		//output builder
		include('mtm-builder.php');
	    echo MTM_Builder::output(Meta_Tag_Manager::get_post_data($post->ID), array('context'=>false));
	}
	
	public static function wp_insert_post_data($data, $postarr){
		$post_type = $data['post_type'];
		$post_ID = !empty($postarr['ID']) ? $postarr['ID'] : false;
		$mtm_custom = get_option('mtm_custom');
		//get posted meta tag data and save it to CPT meta
		if( $post_ID && !empty($mtm_custom['post-types']) && in_array($post_type, $mtm_custom['post-types']) ){
			include_once('mtm-builder.php');
			$mtm_data = MTM_Builder::get_post(array('context'=>false));
			if( !empty($mtm_data) ) update_post_meta($post_ID, 'mtm_data', $mtm_data);
		}
		return $data;
	}
		
	/** the plugin options page */
	public static function options() {
		include_once('mtm-builder.php');
		include('mtm-admin-settings.php');
	}
}

// Start this plugin once all other plugins are fully loaded
add_action( 'init', array('Meta_Tag_Manager_Admin', 'init') );
add_action('plugins_loaded', 'Meta_Tag_Manager_Admin::load_plugin_textdomain');
