<?php
class MTM_Tag_Admin extends MTM_Tag {
	
	public static $type_options = array();
	
	/**
	 * Constructs a meta tag object but assumes $values is dirty and sanitizes it before passing onto parent constructor
	 * @param array $values
	 */
	public function __construct($values){
		//context may be passed as an array, if so we implode it first
		if( !empty($values['context']) && is_array($values['context']) ){
			if( in_array('all',$values['context']) ){
				//all pages equates to no context, since when we're outputting global meta tags no context implies outputting it everywhere
				$values['context'] = false;
			}else{
				//implode the context values
				$values['context'] = wp_unslash(implode(',', $values['context']));
			}
		}
		//go through all non-empty values and wp_kses it
		foreach( $values as $k => $v ){
			if( $k == 'content'){
				$values[$k] = wp_unslash($v);
			}else{
				$values[$k] = wp_kses(wp_unslash($v), array());
			}
		}
		//now pass cleaned values to parent constructor
		parent::__construct($values);
	}
	
	public static function get_type_values($type = false){
		if( empty(self::$type_options) ){
			$options = array(
				'name' => array(
					__('Common values','meta-tag-manager') => array( 'application-name', 'author', 'description', 'generator', 'keywords', 'referrer' ),
					__('Other possible values','meta-tag-manager') => array( 'creator', 'googlebot', 'publisher', 'robots', 'slurp', 'viewport')
				),
				'http-equiv' => array( 'Content-Security-Policy', 'default-style', 'refresh' ),
				'property' => array(
					'OpenGraph Properties' => array( 'og:url', 'og:type', 'og:title', 'og:locale', 'og:image', 'og:image:secure_url', 'og:image:type', 'og:image:width', 'og:image:height', 'og:video', 'og:video:secure_url', 'og:video:type', 'og:video:width', 'og:video:height', 'og:audio', 'og:audio:secure_url', 'og:audio:type', 'og:description', 'og:site_name', 'og:determiner' ),
					'Twitter Card Properties' => array( 'twitter:card', 'twitter:site', 'twitter:site:id', 'twitter:creator', 'twitter:creator:id', 'twitter:description', 'twitter:title', 'twitter:image', 'twitter:image:alt', 'twitter:player', 'twitter:player:width', 'twitter:player:height', 'twitter:player:stream', 'twitter:app:name:iphone', 'twitter:app:id:iphone', 'twitter:app:url:iphone', 'twitter:app:name:ipad', 'twitter:app:id:ipad', 'twitter:app:url:ipad', 'twitter:app:name:googleplay', 'twitter:app:id:googleplay', 'twitter:app:url:googleplay' )
				)
			);
			self::$type_options = apply_filters('mtm_tag_type_options', $options);
		}
		if( !empty($type) ){
			return array_key_exists($type, self::$type_options) ? self::$type_options[$type] : array();
		}
		return apply_filters('mtm_tag_type_options', self::$type_options);
	}
	
}