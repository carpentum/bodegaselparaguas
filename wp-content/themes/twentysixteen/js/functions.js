/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

(function ($) {
    var body, masthead, menuToggle, siteNavigation, socialNavigation, siteHeaderMenu, resizeTimer;

    function initMainNavigation(container) {

        // Add dropdown toggle that displays child menu items.
        var dropdownToggle = $('<button />', {
            'class': 'dropdown-toggle',
            'aria-expanded': false
        }).append($('<span />', {
            'class': 'screen-reader-text',
            text: screenReaderText.expand
        }));

        container.find('.menu-item-has-children > a').after(dropdownToggle);

        // Toggle buttons and submenu items with active children menu items.
        container.find('.current-menu-ancestor > button').addClass('toggled-on');
        container.find('.current-menu-ancestor > .sub-menu').addClass('toggled-on');

        // Add menu items with submenus to aria-haspopup="true".
        container.find('.menu-item-has-children').attr('aria-haspopup', 'true');

        container.find('.dropdown-toggle').click(function (e) {
            var _this = $(this),
                    screenReaderSpan = _this.find('.screen-reader-text');

            e.preventDefault();
            _this.toggleClass('toggled-on');
            _this.next('.children, .sub-menu').toggleClass('toggled-on');

            // jscs:disable
            _this.attr('aria-expanded', _this.attr('aria-expanded') === 'false' ? 'true' : 'false');
            // jscs:enable
            screenReaderSpan.text(screenReaderSpan.text() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand);
        });
    }
    initMainNavigation($('.main-navigation'));

    masthead = $('#masthead');
    menuToggle = masthead.find('#menu-toggle');
    siteHeaderMenu = masthead.find('#site-header-menu');
    siteNavigation = masthead.find('#site-navigation');
    socialNavigation = masthead.find('#social-navigation');

    // Enable menuToggle.
    (function () {

        // Return early if menuToggle is missing.
        if (!menuToggle.length) {
            return;
        }

        // Add an initial values for the attribute.
        menuToggle.add(siteNavigation).add(socialNavigation).attr('aria-expanded', 'false');

        menuToggle.on('click.twentysixteen', function () {
            $(this).add(siteHeaderMenu).toggleClass('toggled-on');

            // jscs:disable
            $(this).add(siteNavigation).add(socialNavigation).attr('aria-expanded', $(this).add(siteNavigation).add(socialNavigation).attr('aria-expanded') === 'false' ? 'true' : 'false');
            // jscs:enable
        });
    })();

    // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
    (function () {
        if (!siteNavigation.length || !siteNavigation.children().length) {
            return;
        }

        // Toggle `focus` class to allow submenu access on tablets.
        function toggleFocusClassTouchScreen() {
            if (window.innerWidth >= 910) {
                $(document.body).on('touchstart.twentysixteen', function (e) {
                    if (!$(e.target).closest('.main-navigation li').length) {
                        $('.main-navigation li').removeClass('focus');
                    }
                });
                siteNavigation.find('.menu-item-has-children > a').on('touchstart.twentysixteen', function (e) {
                    var el = $(this).parent('li');

                    if (!el.hasClass('focus')) {
                        e.preventDefault();
                        el.toggleClass('focus');
                        el.siblings('.focus').removeClass('focus');
                    }
                });
            } else {
                siteNavigation.find('.menu-item-has-children > a').unbind('touchstart.twentysixteen');
            }
        }

        if ('ontouchstart' in window) {
            $(window).on('resize.twentysixteen', toggleFocusClassTouchScreen);
            toggleFocusClassTouchScreen();
        }

        siteNavigation.find('a').on('focus.twentysixteen blur.twentysixteen', function () {
            $(this).parents('.menu-item').toggleClass('focus');
        });
    })();

    // Add the default ARIA attributes for the menu toggle and the navigations.
    function onResizeARIA() {
        if (window.innerWidth < 910) {
            if (menuToggle.hasClass('toggled-on')) {
                menuToggle.attr('aria-expanded', 'true');
            } else {
                menuToggle.attr('aria-expanded', 'false');
            }

            if (siteHeaderMenu.hasClass('toggled-on')) {
                siteNavigation.attr('aria-expanded', 'true');
                socialNavigation.attr('aria-expanded', 'true');
            } else {
                siteNavigation.attr('aria-expanded', 'false');
                socialNavigation.attr('aria-expanded', 'false');
            }

            menuToggle.attr('aria-controls', 'site-navigation social-navigation');
        } else {
            menuToggle.removeAttr('aria-expanded');
            siteNavigation.removeAttr('aria-expanded');
            socialNavigation.removeAttr('aria-expanded');
            menuToggle.removeAttr('aria-controls');
        }
    }

    // Add 'below-entry-meta' class to elements.
    function belowEntryMetaClass(param) {
        if (body.hasClass('page') || body.hasClass('search') || body.hasClass('single-attachment') || body.hasClass('error404')) {
            return;
        }

        $('.entry-content').find(param).each(function () {
            var element = $(this),
                    elementPos = element.offset(),
                    elementPosTop = elementPos.top,
                    entryFooter = element.closest('article').find('.entry-footer'),
                    entryFooterPos = entryFooter.offset(),
                    entryFooterPosBottom = entryFooterPos.top + (entryFooter.height() + 28),
                    caption = element.closest('figure'),
                    newImg;

            // Add 'below-entry-meta' to elements below the entry meta.
            if (elementPosTop > entryFooterPosBottom) {

                // Check if full-size images and captions are larger than or equal to 840px.
                if ('img.size-full' === param) {

                    // Create an image to find native image width of resized images (i.e. max-width: 100%).
                    newImg = new Image();
                    newImg.src = element.attr('src');

                    $(newImg).on('load.twentysixteen', function () {
                        if (newImg.width >= 840) {
                            element.addClass('below-entry-meta');

                            if (caption.hasClass('wp-caption')) {
                                caption.addClass('below-entry-meta');
                                caption.removeAttr('style');
                            }
                        }
                    });
                } else {
                    element.addClass('below-entry-meta');
                }
            } else {
                element.removeClass('below-entry-meta');
                caption.removeClass('below-entry-meta');
            }
        });
    }

    $(document).ready(function () {
        body = $(document.body);

        $(window)
                .on('load.twentysixteen', onResizeARIA)
                .on('resize.twentysixteen', function () {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(function () {
                        belowEntryMetaClass('img.size-full');
                        belowEntryMetaClass('blockquote.alignleft, blockquote.alignright');
                    }, 300);
                    onResizeARIA();
                });

        belowEntryMetaClass('img.size-full');
        belowEntryMetaClass('blockquote.alignleft, blockquote.alignright');

        var fondo_activo = "#fff";
        var fuente_activo = "#BCA426";
        var fondo_noactivo = "#BCA426";
        var fuente_noactivo = "#fff";

        function colores_menu(enlace) {
            enlace.closest(".menu").find(".menu-item").css('background-color', fondo_noactivo).find("a").css('color', fuente_noactivo);
            enlace.closest(".menu-item").css('background-color', fondo_activo);
            enlace.css('color', fuente_activo);
        }
        
        function abrir_submenu (este) {
            este.closest(".menu-item").find(" > .sub-menu").toggle("slow");
        }

        /***********    MENÃš RECONOCIMIENTOS    ***********/
        $("#menu-item-52 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow");
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-intro").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-53 a").click(function (e) {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-elparaguas").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-54 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-sombrilla").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-55 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-fai").show("slow");
                colores_menu(enlace);
            });
        });
        /***********    END MENÃš RECONOCIMIENTOS    ***********/

        /***********    MENÃš RECONOCIMIENTOS (en)    ***********/
        $("#menu-item-2140 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow");
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-intro").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-2142 a").click(function (e) {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-elparaguas").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-2144 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-sombrilla").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-2146 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-fai").show("slow");
                colores_menu(enlace);
            });
        });
        /***********    END MENÃš RECONOCIMIENTOS (en)    ***********/

        /***********    MENÃš RECONOCIMIENTOS (ga)    ***********/
        $("#menu-item-2148 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow");
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-intro").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-2150 a").click(function (e) {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-elparaguas").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-2152 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-sombrilla").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-2154 a").click(function () {
            var enlace = $(this);
            $(".reconocimientos-txt").hide("slow")
            $(".reconocimientos-txt").promise().done(function () {
                $(".reconocimientos-fai").show("slow");
                colores_menu(enlace);
            });
        });
        /***********    END MENÃš RECONOCIMIENTOS (ga)    ***********/

        /***********    MENÃš QUIENES SOMOS    ***********/
        $("#menu-item-75 a").click(function () {
            var enlace = $(this);
            $(".quienessomos-txt").hide("slow");
            $(".quienessomos-txt").promise().done(function () {
                $(".quienessomos-intro").show("slow");
                colores_menu(enlace);
            });
        });

        $("#menu-item-76 a").click(function () {
            var enlace = $(this);
            $(".quienessomos-txt").hide("slow");
            $(".quienessomos-txt").promise().done(function () {
                $(".quienessomos-marcial").show("slow");
                colores_menu(enlace);
            });
        });

        $("#menu-item-77 a").click(function () {
            var enlace = $(this);
            $(".quienessomos-txt").hide("slow");
            $(".quienessomos-txt").promise().done(function () {
                $(".quienessomos-felicisimo").show("slow");
                colores_menu(enlace);
            });
        });
        /***********    END MENÃš QUIENES SOMOS    ***********/

        /***********    MENÃš VIÃ‘EDO    ***********/
        $("#menu-item-96 a").click(function () {
            var enlace = $(this);
            $(".vinedo-txt").hide("slow");
            $(".vinedo-txt").promise().done(function () {
                $(".vinedo-intro").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-97 a").click(function () {
            var enlace = $(this);
            $(".vinedo-txt").hide("slow");
            $(".vinedo-txt").promise().done(function () {
                $(".vinedo-cabrita").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-98 a").click(function () {
            var enlace = $(this);
            $(".vinedo-txt").hide("slow");
            $(".vinedo-txt").promise().done(function () {
                $(".vinedo-castineira").show("slow");
                colores_menu(enlace);
            });
        });
        $("#menu-item-99 a").click(function () {
            var enlace = $(this);
            $(".vinedo-txt").hide("slow");
            $(".vinedo-txt").promise().done(function () {
                $(".vinedo-chateau").show("slow");
                colores_menu(enlace);
            });
        });

        /***********    END MENÃš VIÃ‘EDO    ***********/
        
        function idi_mostrar_region(enlace) {
            $(".idi-txt").hide("slow");
            $(".idi-txt").promise().done(function () {
                $("#content").removeClass("pagina_vino");
                $(".sub-menu").hide("slow");
                $(".idi-region").show("slow");
                colores_menu(enlace);
            });
        }
        function idi_mostrar_vinedo(enlace) {
            $(".idi-txt").hide("slow");
            $(".idi-txt").promise().done(function () {
                $("#content").removeClass("pagina_vino");
                $(".sub-menu").hide("slow");
                $(".idi-vinedo").show("slow");
                colores_menu(enlace);
            });
        }
        function idi_mostrar_astillero_intro(enlace) {
            abrir_submenu (enlace);
            $(".idi-txt").hide("slow");
            $(".idi-txt").promise().done(function () {
                $("#content").addClass("pagina_vino");
                $(".idi-vinoexperimental-botella").show("slow");
                $(".idi-vinoexperimental-intro").show("slow");
                colores_menu(enlace);
            });
        }
        function idi_mostrar_astillero_reconocimientos (enlace) {
            $(".idi-txt").hide("slow");
            $(".idi-txt").promise().done(function () {
                $("#content").addClass("pagina_vino");
                $(".idi-vinoexperimental-botella").show("slow");
                $(".idi-vinoexperimental-reconocimientos").show("slow");
                colores_menu(enlace);
            });
        }
        function idi_mostrar_astillero_etiqueta (enlace) {
            $(".idi-txt").hide("slow");
            $(".idi-txt").promise().done(function () {
                $("#content").addClass("pagina_vino");
                $(".idi-vinoexperimental-botella").show("slow");
                $(".idi-vinoexperimental-etiqueta").show("slow");
                colores_menu(enlace);
            });
        }
        function idi_mostrar_astillero_descargas (enlace) {
            $(".idi-txt").hide("slow");
            $(".idi-txt").promise().done(function () {
                $("#content").addClass("pagina_vino");
                $(".idi-vinoexperimental-botella").show("slow");
                $(".idi-vinoexperimental-descargas").show("slow");
                colores_menu(enlace);
            });
        }

        /***********    MENÃš I+D+I    ***********/
        $("#menu-item-127 a").click(function () {
            idi_mostrar_region($(this));
        });
        $("#menu-item-128 a").click(function () {
            idi_mostrar_vinedo($(this));
        });
        $("#menu-item-129 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-948 a").click(function () {
            idi_mostrar_astillero_intro($(this));
        });
        $("#menu-item-129 a").click(function () {
            idi_mostrar_astillero_reconocimientos($(this));
        });
        $("#menu-item-947 a").click(function () {
            idi_mostrar_astillero_etiqueta($(this));
        });
        $("#menu-item-993 a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1112 a").click(function () {
            window.location.href= "/astillero-2015";
        });
        $("#menu-item-994 a").click(function () {
            idi_mostrar_astillero_descargas($(this));
        });
        /***********    END MENÃš I+D+I    ***********/

        /***********    MENÃš I+D+I (en)    ***********/
        $("#menu-item-1627 a").click(function () {
            idi_mostrar_region($(this));
        });
        $("#menu-item-1628 a").click(function () {
            idi_mostrar_vinedo($(this));
        });
        $("#menu-item-1629 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1630 a").click(function () {
            idi_mostrar_astillero_intro($(this));
        });
        $("#menu-item-1638 a").click(function () {
            idi_mostrar_astillero_reconocimientos($(this));
        });
        $("#menu-item-1631 a").click(function () {
            idi_mostrar_astillero_etiqueta($(this));
        });
        $("#menu-item-1632 a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1635 a").click(function () {
            window.location.href= "/astillero-2015";
        });
        $("#menu-item-1634 a").click(function () {
            idi_mostrar_astillero_descargas($(this));
        });
        /***********    END MENÃš I+D+I (en)   ***********/

        /***********    MENÃš I+D+I (ga)    ***********/
        $("#menu-item-1636 a").click(function () {
            idi_mostrar_region($(this));
        });
        $("#menu-item-1637 a").click(function () {
            idi_mostrar_vinedo($(this));
        });
        $("#menu-item-1638 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1639 a").click(function () {
            idi_mostrar_astillero_intro($(this));
        });
        $("#menu-item-1629 a").click(function () {
            idi_mostrar_astillero_reconocimientos($(this));
        });
        $("#menu-item-1640 a").click(function () {
            idi_mostrar_astillero_etiqueta($(this));
        });
        $("#menu-item-1641 a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1643 a").click(function () {
            window.location.href= "/astillero-2015";
        });
        $("#menu-item-1642 a").click(function () {
            idi_mostrar_astillero_descargas($(this));
        });
        /***********    END MENÃš I+D+I (ga)     ***********/

        function clubamigos_mostrar_intro (enlace) {
            $(".clubamigos-txt").hide("slow");
            $(".clubamigos-txt").promise().done(function () {
                $(".clubamigos-intro").show("slow");
                colores_menu(enlace);
            });
        }
        function clubamigos_mostrar_condiciones (enlace) {
            $(".clubamigos-txt").hide("slow");
            $(".clubamigos-txt").promise().done(function () {
                $(".clubamigos-condiciones").show("slow");
                colores_menu(enlace);
            });
        }
        function clubamigos_mostrar_ventajas (enlace) {
            $(".clubamigos-txt").hide("slow");
            $(".clubamigos-txt").promise().done(function () {
                $(".clubamigos-ventajas").show("slow");
                colores_menu(enlace);
            });
        }
        function clubamigos_mostrar_hagasesocio (enlace) {
            $(".clubamigos-txt").hide("slow");
            $(".clubamigos-txt").promise().done(function () {
                $(".clubamigos-hagasesocio").show("slow");
                colores_menu(enlace);
            });
        }
        /***********    MENÃš CLUB DE AMIGOS (es)   ***********/
        $("#menu-item-143 a").click(function () {
            clubamigos_mostrar_intro ($(this));
        });
        $("#menu-item-144 a").click(function () {
            clubamigos_mostrar_condiciones ($(this));
        });
        $("#menu-item-145 a").click(function () {
            clubamigos_mostrar_ventajas ($(this));
        });
        $("#menu-item-146 a").click(function () {
            clubamigos_mostrar_hagasesocio ($(this));
        });
        /***********    END MENÃš CLUB DE AMIGOS (es)   ***********/
        
        /***********    MENÃš CLUB DE AMIGOS (en)   ***********/
        $("#menu-item-1943 a").click(function () {
            clubamigos_mostrar_intro ($(this));
        });
        $("#menu-item-1944 a").click(function () {
            clubamigos_mostrar_condiciones ($(this));
        });
        $("#menu-item-1945 a").click(function () {
            clubamigos_mostrar_ventajas ($(this));
        });
        $("#menu-item-1946 a").click(function () {
            clubamigos_mostrar_hagasesocio ($(this));
        });
        /***********    END MENÃš CLUB DE AMIGOS (en)   ***********/
        
        /***********    MENÃš CLUB DE AMIGOS (ga)   ***********/
        $("#menu-item-1947 a").click(function () {
            clubamigos_mostrar_intro ($(this));
        });
        $("#menu-item-1948 a").click(function () {
            clubamigos_mostrar_condiciones ($(this));
        });
        $("#menu-item-1949 a").click(function () {
            clubamigos_mostrar_ventajas ($(this));
        });
        $("#menu-item-1950 a").click(function () {
            clubamigos_mostrar_hagasesocio ($(this));
        });
        /***********    END MENÃš CLUB DE AMIGOS (ga)   ***********/

        function vino_mostrar_infobasica (enlace) {
            $(".epa-txt").hide("slow");
            $(".epa-txt").promise().done(function () {
                $(".epa-intro").show("slow");
                colores_menu(enlace);
            });
        }
        function vino_mostrar_reconocimientos (enlace) {
            $(".epa-txt").hide("slow")
            $(".epa-txt").promise().done(function () {
                $(".epa-reconocimientos").show("slow");
                colores_menu(enlace);
            });
        }
        function vino_mostrar_etiqueta (enlace) {
            $(".epa-txt").hide("slow");
            $(".epa-txt").promise().done(function () {
                $(".epa-etiqueta").show("slow");
                colores_menu(enlace);
            });
        }
        function vino_mostrar_descargas (enlace) {
            $(".epa-txt").hide("slow")
            $(".epa-txt").promise().done(function () {
                $(".epa-descargas").show("slow");
                colores_menu(enlace);
            });
        }


        /***********    MENÃš EPA (es)   ***********/
        $("#menu-item-809 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-810 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-834 a").click(function () {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-954 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-811 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš EPA (es)    ***********/

        /***********    MENÃš EPA (en)   ***********/
        $("#menu-item-1484 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1485 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1486 a").click(function () {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1487 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1488 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš EPA (en)    ***********/

        /***********    MENÃš EPA (ga)   ***********/
        $("#menu-item-1507 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1508 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1509 a").click(function () {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1510 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1511 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš EPA (ga)    ***********/

        /***********    MENÃš LS    ***********/
        $("#menu-item-1065 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1066 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1067 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1068 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1069 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš LS    ***********/

        /***********    MENÃš LS (en)    ***********/
        $("#menu-item-1566 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1567 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1568 a").click(function () {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1569 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1570 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš LS (en)    ***********/

        /***********    MENÃš LS (ga)    ***********/
        $("#menu-item-1577 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1578 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1579 a").click(function () {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1580 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1581 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš LS (ga)    ***********/

        /***********    MENÃš FSC    ***********/
        $("#menu-item-1074 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1075 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1076 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1077 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1078 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš FSC    ***********/

        /***********    MENÃš FSC (en)    ***********/
        $("#menu-item-1588 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1589 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1590 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1591 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1592 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš FSC (en)    ***********/

        /***********    MENÃš FSC (ga)    ***********/
        $("#menu-item-1602 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1603 a").click(function () {
            vino_mostrar_reconocimientos($(this));
        });
        $("#menu-item-1604 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1605 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1606 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš FSC (ga)    ***********/

        /***********    MENÃš EA    ***********/
        $("#menu-item-1124 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1125 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1126 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1127 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš EA    ***********/

        /***********    MENÃš EA (en)   ***********/
        $("#menu-item-1613 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1614 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1615 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1616 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš EA (en)    ***********/

        /***********    MENÃš EA (ga)    ***********/
        $("#menu-item-1619 a").click(function () {
            vino_mostrar_infobasica($(this));
        });
        $("#menu-item-1620 a").click(function (e) {
            vino_mostrar_etiqueta($(this));
        });
        $("#menu-item-1621 > a").click(function () {
            var este = $(this);
            abrir_submenu(este);
        });
        $("#menu-item-1622 a").click(function () {
            vino_mostrar_descargas($(this));
        });
        /***********    END MENÃš EA (ga)    ***********/
    
        if ( $('.page-id-123').length > 0 ) {
            idi_mostrar_astillero_intro($("#menu-item-948 a"));
        }

    });


// 
// Animated Bottles of Wine
// 

    jQuery(document).ready(function () {

        var desc_epa = "El Paraguas AtlÃ¡ntico";
        var desc_fsc = "Fai un Sol de Carallo";
        var desc_ls = "La Sombrilla";

        jQuery(".vinos_bottle_container_epa").hover(
                function () {
                    jQuery('#selector').animate({left: '0px'}, {queue: false, duration: 100});
                    jQuery('.selector_txt').html(desc_epa);
                },
                function () {

                }
        );

        jQuery(".vinos_bottle_container_ls").hover(
                function () {
                    jQuery('#selector').animate({left: '240px'}, {queue: false, duration: 100});
                    jQuery('.selector_txt').html(desc_ls);
                },
                function () {

                }
        );

        jQuery(".vinos_bottle_container_fsc").hover(
                function () {
                    jQuery('#selector').animate({left: '480px'}, {queue: false, duration: 100});
                    jQuery('.selector_txt').html(desc_fsc);
                },
                function () {

                }
        );

        jQuery(".vinos_bottle_container_epa").click(
                function () {
                    jQuery('.vinos_bottle_container_fsc').animate({opacity: 0}, 500);
                    jQuery('.vinos_bottle_container_ls').animate({opacity: 0}, 500);
                    jQuery('.vinos_bottle_container_epa').animate({
                        left: $(".vinos_bottle_container_epa").parent().width() / 2 - $(".vinos_bottle_container_epa").width() / 2
                    }, 1000);
                    window.location = "/el-paraguas-atlantico-2019";
                    jQuery('#selector').animate({opacity: 0}, 500);
                }
        );

        jQuery(".vinos_bottle_container_ls").click(
                function () {
                    jQuery('.vinos_bottle_container_epa').animate({opacity: 0}, 500);
                    jQuery('.vinos_bottle_container_fsc').animate({opacity: 0}, 500);
                    jQuery('.vinos_bottle_container_ls').animate({
                        left: 0
                    }, 1000, window.location.href = "la-sombrilla-2018");
                    jQuery('#selector').animate({opacity: 0}, 500);
                }
        );

        jQuery(".vinos_bottle_container_fsc").click(
                function () {
                    jQuery('.vinos_bottle_container_epa').animate({opacity: 0}, 500);
                    jQuery('.vinos_bottle_container_ls').animate({opacity: 0}, 500);
                    jQuery('.vinos_bottle_container_fsc').animate({
                        left: -240
                    }, 1000);
                    window.location = "/fai-un-sol-de-carallo-2018/";
                    jQuery('#selector').animate({opacity: 0}, 500);
                }
        );

    });
})(jQuery);
