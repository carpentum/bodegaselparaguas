jQuery(document).ready( function($) {
	//initialize one or many meta tag field forms
	var init_fields = function( container ){
		//add selectize for the type selector
		container.find('.mtm-field-input-tag-type').each( function(e){
			if( this.value == 'charset' ){
				$(this).closest('.mtm-field').find('.mtm-field-type-content').show();
			}
		});
		container.find('.mtm-field-input-tag-type').selectize().on('change', function(e){
			var parent = $(this).closest('.mtm-field');
			parent.find('.mtm-field-type-content').hide();
			if( this.value != 'charset' ){
				parent.find('.mtm-field-type-content').show();
			}
			//get value input from template and selectize
			var value_template = $(this).closest('.mtm-builder').find('.mtm-field-type-templates .mtm-field-input-tag-'+this.value).first().clone();
			if( value_template.length > 0 ){
				//clone, rename, selectize
				value_template = value_template.clone();
				var current_value = parent.find('select.mtm-field-input-tag-value, input.mtm-field-input-tag-value');
				var current_value_name = current_value.attr('name');
				current_value.each(function(){ if( typeof this.selectize != 'undefined' ) this.selectize.destroy(); }).replaceWith(value_template);
				parent.find('.mtm-field-input.mtm-field-type-value label em').text(this.value);
				value_template.attr('name', current_value_name).trigger('change');
				if( value_template.is('select') ) value_template.selectize({ create: true });
			}
		});
		//add selectize for contexts, which is a tag-style selection
		container.find('.mtm-field-input-tag-context').selectize({
			plugins: ['remove_button'],
		    maxItems: 100,
		    closeAfterSelect: true,
		    //add some extra functions in case 'all' is selected, hence no need to select other things
		    onItemAdd: function(value, item){
		    	if( this.items.length > 1 ){
			    	if( value == 'all' ){
			    		this.clear(true);
			    		this.addItem('all', true);
			    		//this.settings.maxItems = 1;
			    	}else if( this.getItem('all').length ){ 
			    		this.removeItem('all', true); 
			    	}
		    	}
		    },
		    //update display values on header of field card
		    onChange: function(items){
		    	var values = [];
		    	if( typeof items == 'object' && items ){
			    	items.forEach(function(item){
			    		values.push(this.getItem(item).text().replace(/×$/i, ''));
			    	}, this);
		    	}
		    	this.$control.closest('.mtm-field').find('.mtm-meta-context-values').text(values.join(', '));		    	
		    }
		}).on('click', function(){ this.selectize.open(); });
		//general selectize for other selectizable dropdowns
		container.find('.mtm-field-input-selectize').selectize({
		    create: true,
		});
		container.find('.mtm-field-input-tag-reference').hide();
	}
	//init displayed fields on page load
	$('.mtm-builder .mtm-fields .mtm-field').addClass('closed')
	init_fields($('.mtm-builder .mtm-fields'));
	
	//build meta tag dynamically
	var build_meta_tag = function( container ){
		var meta_type = container.find('.mtm-field-input-tag-type option:selected').val();
		if( meta_type ){
			container.find('.mtm-field-title code').show();
			var meta_value = container.find('select.mtm-field-input-tag-'+ meta_type +' option:selected').val();
			container.find('.mtm-field-title code .mtm-meta-type-att').text(meta_type).css('opacity','0.1').animate({'opacity':'1'});
			container.find('.mtm-field-title code .mtm-meta-type-val').text(meta_value).css('opacity','0.1').animate({'opacity':'1'});
			if( meta_type == 'charset' ){
				container.find('.mtm-field-title code .mtm-meta-content').hide();
			}else{
				container.find('.mtm-field-title code .mtm-meta-content').fadeIn().children('.mtm-meta-content-value').text(container.find('.mtm-field-input-tag-content').val()).css('opacity','0.1').animate({'opacity':'1'});
			}
		}
	}
	$('.mtm-builder').on('change', '.mtm-field-input-tag-type', function(){
		build_meta_tag( $(this).closest('.mtm-field') );
	});
	$('.mtm-builder').on('keyup change', '.mtm-field-input-tag-content', function(){
		$(this).closest('.mtm-field').find('.mtm-field-title code .mtm-meta-content-value').css('opacity','0.1').animate({'opacity':'1'}).text(this.value);
	});
	$('.mtm-builder').on('change keyup', '.mtm-field-input-tag-value', function(){
		$(this).closest('.mtm-field').find('.mtm-field-title code .mtm-meta-type-val').css('opacity','0.1').animate({'opacity':'1'}).text(this.value);
	});
	$('.mtm-builder').on('keyup change', '.mtm-field-input-tag-reference', function(){
		$(this).closest('.mtm-field').find('.mtm-field-title .mtm-meta-reference .mtm-meta-reference-value').text(this.value);
	});
	$('.mtm-builder').on('blur', '.mtm-field-input-tag-reference', function(e){
		e.preventDefault();
	});
	
	//make sortable
	$(".mtm-builder .mtm-fields" ).sortable({
		placeholder: "mtm-field-placeholder",
		handle: '.mtm-field-header',
		start: function( event, ui ){
			ui.item.addClass('closed').data('openField', false);
			ui.item.css('height', 'auto');
		}
	});
	//actions for field cards
	$('.mtm-builder').on('mousedown mouseup', '.mtm-field-header, button.mtm-field-close', function(e){
		//open/close functionality for fields
		if( $(e.target).hasClass('mtm-field-input-tag-reference') ) return;
		var field = $(this).closest('.mtm-field');
		if( e.type == 'mousedown' ){
			field.data('openField', field.hasClass('closed')); //allow sortable overriding
			field.addClass('closed');
			field.find('.mtm-meta-reference .mtm-meta-reference-value').show();
			field.find('.mtm-meta-reference .mtm-field-input-tag-reference').hide();
		}else if( field.data('openField') ){
			field.siblings('.mtm-field').addClass('closed');
			field.removeClass('closed');
			field.find('.mtm-meta-reference .mtm-meta-reference-value').hide();
			field.find('.mtm-meta-reference .mtm-field-input-tag-reference').show();
		}
	}).on('click', '.mtm-field-remove', function(){
		//removing a card
		if( $(this).closest('.mtm-fields').children('.mtm-field').length <= 1 ){
			$(this).closest('.mtm-builder').find('.mtm-field-placeholder').show();
		}
		$(this).closest('.mtm-field').remove();
	}).on('click', '.mtm-add-field', function(e){
		//adding a field
		e.preventDefault();
		var container = $(this).closest('.mtm-builder');
		container.find('.mtm-field-placeholder').hide();
		container.find('.mtm-field').addClass('closed');
		var index = container.data('nextIndex');
		container.data('nextIndex', index + 1);
		var new_field = $('.mtm-field-template .mtm-field').clone().data('thisIndex', index);
		new_field.find("[name*='[t]']").each( function( i ){
			var new_attribute = $(this).attr('name').replace('mtm-fields[t]', 'mtm-fields['+ index +']');
			$(this).attr('name', new_attribute);
		});
		$('.mtm-builder .mtm-fields').append(new_field);
		init_fields(new_field);
		new_field.removeClass('closed');		
		new_field.find('.mtm-meta-reference .mtm-meta-reference-value').hide();
		new_field.find('.mtm-meta-reference .mtm-field-input-tag-reference').show();
		$(this).blur();		
	}).data('nextIndex', $('.mtm-builder .mtm-fields .mtm-field').length); //set index counter
	
	$('.mtm-settings .mtm-post-types .mtm-post-types-select').selectize({
		plugins: ['remove_button'],
	    maxItems: 100,
	    closeAfterSelect: false
	}).on('click', function(){ this.selectize.open(); });
});