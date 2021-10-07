<?php
if( defined('MTM_VERSION') ){
	//coming in from MTM 1.x we change the values to something else
	if( !get_option('mtm_version') ){
		$mtm_data = get_option('mtm_data', array());
		$new_mtm_data = array();
		foreach($mtm_data as $mtm_tag){
			$new_tag = array(
				'value' => $mtm_tag[0],
				'content' => $mtm_tag[1],
				'reference' => $mtm_tag[2],
				'type' => 'name'
			);
			if( !empty($mtm_tag[3]) ){
				$new_tag['location'] = 'home';
			}else{
				$new_tag['location'] = 'all';
			}
			$new_mtm_data[] = $new_tag;
		}
		update_option('mtm_data', $new_mtm_data);
		update_option('mtm_custom', array('post-types'=>get_post_types()));
		update_option('mtm_shiny_update_notice', 1);
	}
	update_option('mtm_version', MTM_VERSION);
}