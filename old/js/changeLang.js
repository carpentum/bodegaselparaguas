$(document).ready(function() {
    $("a[name='cooken'],a[name='cookes'],a[name='cookga']").click(function(event) {
        //En cuántos días caducará la cookie
        var expiredays = 7;
        var cookiename = 'lan';
        //alert(cookiename);
        var lang = $(this).attr("name");
        //alert(lang);
        language = lang.substr(lang.length - 2, 2);
        //alert(language);
        event.preventDefault();
        //cookieval = $.cookie(cookiename,language,{ expires: 7 , path: '/'});


        var expiredate = new Date();
        expiredate.setDate(expiredate.getDate() + expiredays);
        var c_value = escape(language) + ((expiredays == null) ? "" : "; expires=" + expiredate.toUTCString());
        document.cookie = cookiename + "=" + c_value;
        
        //Si está en quienes-somos.php viniendo de index.php, le quita el parámetro de idioma para que no interfiera
        if (window.location.href.substr(-10) == "?idioma=es" || window.location.href.substr(-10) == "?idioma=en" || window.location.href.substr(-10) == "?idioma=ga") {
            var pag_destino = window.location.href.substr(0, window.location.href.length - 10);
        }else{
            var pag_destino = window.location.href;
        }
        window.location.href = pag_destino;
    });
});