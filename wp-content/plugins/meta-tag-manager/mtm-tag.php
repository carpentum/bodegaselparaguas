<?php
class MTM_Tag {
	public $reference;
	public $type;
	public $value;
	public $content;
	public $context = false;
	
	public static $types = array();
	public static $types_with_content = array();
	
	public function __construct($values){
		$this->reference = !empty($values['reference']) ? $values['reference']:'';
		$this->type = !empty($values['type']) ? $values['type']:'';
		$this->value = !empty($values['value']) ? $values['value']:'';
		$this->content = !empty($values['content']) ? $values['content']:'';
		if( !empty($values['context']) ){
			$this->context = explode(',', $values['context']);
		}
	}
	
	public function output(){
		$tag_string = '<meta '.esc_attr($this->type).'="'.esc_attr($this->value).'"';
		if( $this->has_content() ){
			if( $this->type == 'http-equiv' && $this->value == 'Link' ){
				//escape the attribute but allow for the <url>; format to pass through 
				$tag_string .= ' content="'.preg_replace('/&lt;(.+)&gt;;/', '<$1>;', esc_attr($this->content)).'"';
			}else{
				$tag_string .= ' content="'.esc_attr($this->content).'"';
			}
		}
		$tag_string .= ' />';
		return $tag_string;
	}
	
	public function to_array(){
		$array = array(
			'reference' => $this->reference,
			'type' => $this->type,
			'value' => $this->value
		);
		if( $this->has_content() ){
			$array['content'] = $this->content;
		}
		if( $this->context !== false && is_array($this->context) ){
			$array['context'] = implode(',', $this->context);
		}
		return $array;
	}
	
	public function is_valid(){
		if( in_array($this->type, $this->get_types()) ){ //pass
			if( !empty($this->value) ){ //pass
				if( $this->has_content() && empty($this->content) ){ //fail
					return false; //empty content, no point in outputting
				}
				return true; //if we get here, we're good
			}
		}
		return false;
	}
	
	public static function get_types(){
		if( empty(self::$types) ){
			self::$types = apply_filters('mtm_tag_get_types', array('name','http-equiv','charset','itemprop','property'));
		}
		return self::$types;
	}
	
	public function has_content(){
		if( empty(self::$types_with_content) ){
			self::$types_with_content = apply_filters('mtm_types_with_content', array('name','http-equiv','itemprop','property'));
		}
		return in_array($this->type, self::$types_with_content);
	}
}