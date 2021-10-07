jQuery(document).ready(function($){
	//Meta Box Options
	//$(".postbox > h2").click(function(){ $(this).parent().toggleClass('closed'); });
	//$(".postbox").addClass('closed');
	//Navigation Tabs
	$('.tabs-active .nav-tab-wrapper .nav-tab').click(function(){
		el = $(this);
		elid = el.attr('id');
		$('.mtm-menu-group').hide(); 
		$('.'+elid).show();
		//$(".postbox").addClass('closed');
		//open_close.text(EM.open_text);
	});
	$('.nav-tab-wrapper .nav-tab').click(function(){
		$('.nav-tab-wrapper .nav-tab').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
	});
	var navUrl = document.location.toString();
	if (navUrl.match('#')) { //anchor-based navigation
		var nav_tab = navUrl.split('#');
		var current_tab = 'a#mtm-menu-' + nav_tab[1];
		$(current_tab).trigger('click');
		if( nav_tab.length > 2 ){
			section = $("#mtm-opt-"+nav_tab[2]);
			if( section.length > 0 ){
				section.children('h2').trigger('click');
		    	$('html, body').animate({ scrollTop: section.offset().top - 30 }); //sends user back to current section
			}
		}
	}else{
		//set to general tab by default, so we can also add clicked subsections
		document.location = navUrl+"#builder";
	}
	$('.nav-tab-link').click(function(){ $($(this).attr('rel')).trigger('click'); }); //links to mimick tabs
	$('input[type="submit"]').click(function(){
		var el = $(this).parents('.postbox').first();
		var docloc = document.location.toString().split('#');
		var newloc = docloc[0];
		if( docloc.length > 1 ){
			var nav_tab = docloc[1].split('#');
			newloc = newloc + "#" + nav_tab[0];
			if( el.attr('id') ){
				newloc = newloc + "#" + el.attr('id').replace('mtm-opt-','');
			}
		}
		document.location = newloc;
	});
});