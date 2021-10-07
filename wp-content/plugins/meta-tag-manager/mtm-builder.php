<?php
if( !defined('ABSPATH') ) exit;

include_once('mtm-tag-admin.php'); //extend MTM_Tag for admin purposes
class MTM_Builder {
	
	public static $context_options = array();
	
	public static function get_post( $args = array() ){
		$mtm_data = array();
		if( !empty($_REQUEST['mtm-fields']) ){
			foreach( $_REQUEST['mtm-fields'] as $k => $posted_tag ){
				if( $k === 't' ) continue; //skip the template
				$tag = new MTM_Tag_Admin($posted_tag);
				$mtm_data[] = $tag->to_array();
			}
		}
		return $mtm_data;
	}
	
	public static function output($meta_tags, $args = array() ){
		?>
		<div class="mtm-builder">
			<div class="mtm-fields<?php if( empty($args['context']) ): ?> no-context<?php endif; ?><?php if( empty($args['reference']) ): ?> no-reference<?php endif; ?>">
				<?php
					$i = 0;
					foreach( $meta_tags as $tag ){
						self::output_field($i, $tag, $args);
						$i++;
					}
					$placeholder_style = ($i != 0) ? ' style="display:none;"':'';
				    echo '<div class="mtm-field-placeholder mtm-add-field"'.$placeholder_style.'>'.esc_html__('No tags added yet, click here or on the button below to add one!','meta-tag-manager').'</div>';
				?>
			</div>
			<div class="mtm-field-template">
				<?php self::output_field('t', new MTM_Tag(array()), $args); ?>
			</div>
			<div class="mtm-field-type-templates" style="display:none; visibility:hidden;">
				<?php foreach( MTM_Tag::get_types() as $type ): $type_values = MTM_Tag_Admin::get_type_values($type); ?>
					<?php if( !empty($type_values) ): ?>
					<select name="mtm-field-type-template" class="mtm-field-input-tag-<?php echo esc_attr($type); ?> mtm-field-input-tag-value">
						<option value=""><?php esc_html_e('choose a value or type in a custom one...', 'meta-tag-manager'); ?></option>
						<?php echo self::output_select_options($type_values); ?>
					</select>
					<?php elseif( $type == 'charset' ): ?>
					<input name="mtm-field-type-template" type="text" value="<?php bloginfo( 'charset' ); ?>" class="mtm-field-input-tag-<?php echo esc_attr($type); ?> mtm-field-input-tag-value" />
					<?php else: ?>
					<input name="mtm-field-type-template" type="text" class="mtm-field-input-tag-<?php echo esc_attr($type); ?> mtm-field-input-tag-value" />
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<button type="button" class="button-secondary mtm-add-field"><span class="dashicons dashicons-plus"></span> <?php esc_html_e('Add Meta Tag','meta-tag-manager'); ?></button>
		</div>		
		<?php
	}

	public static function output_field( $i = '', $tag, $args = array() ){
		?>
		<div class="mtm-field">
			<div class="mtm-field-header">
				<div class="mtm-field-header-toggle"></div>
				<div class="mtm-col-sort"><span class="dashicons dashicons-sort"></span></div>
				<div class="mtm-field-title">
					<?php if( !empty($args['reference']) ): ?>
					<div class="mtm-meta-reference">
						<?php $reference = empty($tag->reference) ? __('Custom Meta Tag','meta-tag-manager') : $tag->reference; ?>	
						<span class="mtm-meta-reference-value" title="<?php esc_attr_e('Custom Meta Tag Reference','meta-tag-manager'); ?>"><?php echo esc_html($reference); ?></span>
						<label class="mtm-field-input-reference">		
							<span class="screen-reader-text" ><?php esc_html_e('Reference Name','meta-tag-manager'); ?></span>
							<input type="text" name="mtm-fields[<?php echo esc_attr($i); ?>][reference]" value="<?php echo esc_attr($tag->reference); ?>" placeholder="<?php esc_html_e('optional reference name', 'meta-tag-manager'); ?>"  class="mtm-field-input-tag-reference" />
						</label>
						<?php if( !empty($args['context']) ): ?>
						<span class="mtm-meta-context">
							<span class="dashicons dashicons-admin-page"></span>
							<span class="mtm-meta-context-values">
							<?php
							$context_value = empty($tag->context) ? array('all') : $tag->context; 
							$display_contexts = array();
							foreach( self::get_context_options() as $context_label => $context_option ){
								if( is_array($context_option) ){
									foreach( $context_option as $context_option_label => $context_option_value )
									if( in_array($context_option_value, $context_value) ){
										$display_contexts[] = $context_option_label;
									}
								}else{
									if( in_array($context_option, $context_value) ){
										$display_contexts[] = $context_label;
									}
								}
							}
							echo implode(', ', $display_contexts);
							?>
							</span>
						</span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<code>
						<span class="mtm-meta-closing-tag">&lt;meta</span>
						<span class="mtm-meta-type">
							<?php
							$type_val = !empty($tag->value) ? $tag->value:'...';
							?>
					 		<span class="mtm-meta-type-att"><?php echo esc_html($tag->type); ?></span>="<span class="mtm-meta-type-val"><?php echo esc_html($type_val); ?></span>"
					 	</span>
					 	<span class="mtm-meta-content<?php if($tag->type == 'charset') echo ' hidden'; ?>">
					 		<?php $content_val = !empty($tag->content) ? $tag->content:'...' ?>
							content="<span class="mtm-meta-content-value"><?php echo esc_html($content_val); ?></span>"
						</span>
						<span class="mtm-meta-closing-tag">/&gt;</span>
					</code>
					<a class="mtm-field-remove" title="<?php esc_attr_e('Remove Meta Tag','meta-tag-manager'); ?>"><span class="dashicons dashicons-trash"></span></a>
				</div>
			</div>
			<div class="mtm-field-data">
				<div class="mtm-field-input mtm-field-type-type">
					<label> 
						<span class="mtm-field-input-label"><?php esc_html_e('Tag Type','meta-tag-manager'); ?></span> 
						<select name="mtm-fields[<?php echo esc_attr($i); ?>][type]" class="mtm-field-input-tag-type">
							<option value=""><?php esc_html_e('choose a tag type', 'meta-tag-manager'); ?></option>
							<?php 
								$type_options = MTM_Tag::get_types();
								echo self::output_select_options($type_options, $tag->type);
							?>
						</select>
					</label>
				</div>
				<div class="mtm-field-input mtm-field-type-value">
					<label> 
						<span class="mtm-field-input-label"><?php echo sprintf(esc_html__('%s Value','meta-tag-manager'), '<em>'.esc_html($tag->type).'</em>'); ?></span> 
						<?php $type_values = MTM_Tag_Admin::get_type_values($tag->type); ?>
						<?php if( !empty($type_values) ): ?>
						<select name="mtm-fields[<?php echo esc_attr($i); ?>][value]" class="mtm-field-input-tag-<?php echo esc_attr($tag->type); ?> mtm-field-input-tag-value mtm-field-input-selectize">
							<option value=""><?php esc_html_e('choose a value or type in a custom one...', 'meta-tag-manager'); ?></option>
							<?php echo self::output_select_options($type_values, $tag->value); ?>
						</select>
						<?php else: ?>
						<input  name="mtm-fields[<?php echo esc_attr($i); ?>][value]" type="text" class="mtm-field-input-<?php echo esc_attr($type); ?> mtm-field-input-tag-value" value="<?php echo esc_attr($tag->value); ?>" />
						<?php endif; ?>
					</label>
				</div>
				<div class="mtm-field-input mtm-field-type-content mtm-field-attr">
					<label>
					    <span class="mtm-field-input-label"><?php echo sprintf(esc_html__('%s Attribute','meta-tag-manager'), '<em>content</em>'); ?></span>
						<input type="text" name="mtm-fields[<?php echo esc_attr($i); ?>][content]" value="<?php echo esc_attr($tag->content); ?>" placeholder="<?php esc_attr_e('add content corresponding to the chosen tag type', 'meta-tag-manager'); ?>" class="mtm-field-input-tag-content" />
					</label>
				</div>
				<?php if( !empty($args['context']) ): ?>
				<div class="mtm-field-input mtm-field-input-context">
					<label> 
						<span class="mtm-field-input-label"><?php echo esc_html_e('Where to display this tag','meta-tag-manager'); ?></span> 
						<select name="mtm-fields[<?php echo esc_attr($i); ?>][context][]" class="mtm-field-input-tag-context" multiple>
							<option value=""><?php esc_html_e('choose one or more contexts', 'meta-tag-manager'); ?></option>
							<?php
								$context_options = self::get_context_options();
								echo self::output_select_options($context_options, $context_value);
							?>
						</select>
					</label>
				</div>
				<?php endif; ?>
				<?php 
				/*
				This is currently shelved as a feature unless there's demand, due to the extra work involved.
				The intention of the bit below is to allow for extra custom attributes since the meta tag does allow for various global attributes. 
				https://www.w3.org/TR/html5/document-metadata.html#the-meta-element
				If you're reading this and you want to see this functionality, drop us a line on the support forums (and maybe a little context as for why)
				so we know there's demand for it!
				*/
				/*
				<div class="mtm-field-section">
					<div class="mtm-field-section-header">
						<div class="mtm-field-section-toggle"></div>
						<div class="mtm-field-section-title"><?php esc_html_e('Additional Attributes (Advanced)','meta-tag-manager'); ?></div>
					</div>
					<div class="mtm-field-section-data">
						<div class="mtm-field-type-custom">
							<div class="mtm-field-input mtm-field-type-custom-name">
								<label>
									<span class="screen-reader-text"><?php sprintf(esc_html_x('Custom %s', 'label for custom attribute name/value fields', 'meta-tag-manager'),esc_html__('attribute name','meta-tag-manager')); ?></span>
									<input type="text" name="mtm-fields[<?php echo esc_attr($i); ?>][][label]" value="" placeholder="<?php esc_attr_e('attribute name','meta-tag-manager'); ?>" />
								</label>
							</div>
							<div class="mtm-field-input mtm-field-type-custom-value">
								<label>
									<span class="screen-reader-text"><?php sprintf(esc_html_x('Custom %s', 'label for custom attribute name/value fields', 'meta-tag-manager'),esc_html__('attribute value','meta-tag-manager')); ?></span>
									<input type="text" name="mtm-fields[<?php echo esc_attr($i); ?>][][label]" value="" placeholder="<?php esc_attr_e('attribute value','meta-tag-manager'); ?>" />
								</label>
							</div>
						</div>
						<br class="clear" />
					</div>
				</div>
				*/ ?>
				<div class="mtm-field-actions">
					<button type="button" class="button-secondary mtm-field-close"><?php esc_html_e('Close Meta Tag Options','meta-tag-manager'); ?></button>
				</div>
			</div>
		</div>		
		<?php
	}
	
	public static function output_select_options( $options, $selected='', $add_selected_option = true ){
	    $html = '';
		foreach( $options as $key => $option ){
			$selected_attr = ( (is_array($selected) && in_array($option, $selected)) || $selected == $option ) ? ' selected="selected"':'';
			if( is_array($option) ){
				$html .= '<optgroup label="'.esc_attr($key).'">';
				$html .= self::output_select_options($option, $selected, false);
				$html .= '</optgroup>';
			}else{
				//single option, output value no key
				if( is_numeric($key) ){
					$html .= '<option'.$selected_attr.'>'.esc_html($option).'</option>';
				}else{
					$html .= '<option value="'.esc_attr($option).'"'.$selected_attr.'>'.esc_html($key).'</option>';
				}
			}
		}
		if( !preg_match('/selected="selected"/', $html) && $selected != '' && $add_selected_option ){
		    //value not existing, so we add it as an option
		    $html = '<option selected="selected">'.esc_html($selected).'</option>' . $html;
		}
		return $html;
	}

	public static function get_context_options(){
		if( !empty(self::$context_options) ) return self::$context_options;
		$context_options = array(
				__('All Pages', 'meta-tag-manager') => 'all',
				__('Front Page', 'meta-tag-manager') => 'home'
		);
		//Post Types
		$post_types_label = __('Post Types', 'meta-tag-manager');
		foreach( get_post_types(array('public'=>true), 'objects') as $post_type){
			$context_options[$post_types_label][$post_type->labels->name] = 'post-type_' . $post_type->name;
		}
		//Taxonomies
		$taxonomies_label = __('Taxonomies', 'meta-tag-manager');
		foreach( get_taxonomies(array('public'=>true), 'objects') as $taxonomy ){
			$context_options[$taxonomies_label][$taxonomy->labels->name] = 'taxonomy_' . $taxonomy->name;
		}
		self::$context_options = $context_options;
		return $context_options;
	}
}