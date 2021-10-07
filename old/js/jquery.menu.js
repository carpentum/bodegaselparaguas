$(document).ready(function(){
	  /*$("p").click(function(){
	    $(this).hide();
	  });
	}); */
});

$(document).ready(function () {
    $(".hover").hover(
        function () {
  	     $('ul.submenu').addClass('visible');
  	     $('ul.submenu').removeClass('oculto');
  	  	}, 
  	  	function () {
  	    	$('ul.submenu').addClass('oculto');
  	    	$('ul.submenu').removeClass('visible');
  	  	}
	);

});

$(document).ready(function () {
    $(".hoverVino").hover(
        function () {
  	     $('ul.submenuVino').addClass('visible');
  	     $('ul.submenuVino').removeClass('oculto');
  	  	}, 
  	  	function () {
  	    	$('ul.submenuVino').addClass('oculto');
  	    	$('ul.submenuVino').removeClass('visible');
  	  	}
	);

});

$(document).ready(function () {
    $(".hoverClub").hover(
        function () {
  	     $('ul.submenuClub').addClass('visible');
  	     $('ul.submenuClub').removeClass('oculto');
  	  	}, 
  	  	function () {
  	    	$('ul.submenuClub').addClass('oculto');
  	    	$('ul.submenuClub').removeClass('visible');
  	  	}
	);

});