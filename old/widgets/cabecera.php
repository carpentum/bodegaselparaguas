<div id="cabecera">
    <div class="menu">
        <ul class="listaMenu">
            <li class="quienessomos elementoListaMenu">
                <div class="title-nav-count">
                    <div class="btn-group">
                        <a href="<?php echo $urlpath; ?>quienes-somos.php" class="dropdown-toggle hover" data-toggle="dropdown">
                            <img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 1) echo 'quienes_somos_activo.png';
else echo 'quienes_somos.png'; ?>" alt="Quienes somos" />
                        </a>
                        <ul class="dropdown-menu submenu oculto hover" id="ul-nav-count">
                            <li><a href="<?php echo $urlpath ?>quienes-somos.php" style="text-decoration:none!important" title="<?php echo T_QUIENES; ?>"><?php echo T_QUIENES; ?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $urlpath ?>marcial-pita.php" style="text-decoration:none!important" title="<?php echo T_MARCIAL; ?>"><?php echo T_MARCIAL; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>felicisimo-pereira.php" style="text-decoration:none!important" title="<?php echo T_FELI; ?>"><?php echo T_FELI; ?></a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="vinedo elementoListaMenu">
                <a href="<?php echo $urlpath; ?>vinedo.php" title="<?php echo T_VINEDO; ?>">
                    <img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 2) echo 'vinedo_activo.png';
else echo 'vinedo.png'; ?>" alt="<?php echo T_VINEDO; ?>" />
                </a>

            </li>
            <li class="bodega elementoListaMenu"><a href="<?php echo $urlpath; ?>bodega.php" title="Bodega"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 3) echo 'bodega_activo.png';
else echo 'bodega.png'; ?>" alt="Bodega" /></a></li>
            <li class="vino elementoListaMenu">
                <div class="title-nav-count">
                    <div class="btn-group">
                        <a href="<?php echo $urlpath; ?>vino.php" class="dropdown-toggle hoverVino" data-toggle="dropdown">
                            <img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 4) echo 'vino_activo.png';
else echo 'vino.png'; ?>" alt="<?php echo T_PALABRA_VINO ?>" />
                        </a>
                        <ul class="dropdown-menu submenuVino oculto hoverVino" id="ul-nav-count">
                            <li><a href="<?php echo $urlpath ?>la-sombrilla-2015.php" style="text-decoration:none!important" title="<?php echo T_SOMBRILLA2015; ?>"><?php echo T_SOMBRILLA2015; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>fai-un-sol-de-carallo-2015.php" style="text-decoration:none!important" title="<?php echo T_FAIUNSOL2015; ?>"><?php echo T_FAIUNSOL2015; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>fai-un-sol-de-carallo-2014.php" style="text-decoration:none!important" title="<?php echo T_FAIUNSOL2014; ?>"><?php echo T_FAIUNSOL2014; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>fai-un-sol-de-carallo-2013.php" style="text-decoration:none!important" title="<?php echo T_FAIUNSOL2013; ?>"><?php echo T_FAIUNSOL2013; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>el-paraguas-atlantico-2016.php" style="text-decoration:none!important" title="<?php echo T_VINO2015; ?>"><?php echo T_VINO2016; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>el-paraguas-atlantico-2015.php" style="text-decoration:none!important" title="<?php echo T_VINO2015; ?>"><?php echo T_VINO2015; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>el-paraguas-atlantico-2014.php" style="text-decoration:none!important" title="<?php echo T_VINO2014; ?>"><?php echo T_VINO2014; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>el-paraguas-atlantico-2013.php" style="text-decoration:none!important" title="<?php echo T_VINO2013; ?>"><?php echo T_VINO2013; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>el-paraguas-atlantico-2012.php" style="text-decoration:none!important" title="<?php echo T_VINO2012; ?>"><?php echo T_VINO2012; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>el-paraguas-atlantico-2011.php" style="text-decoration:none!important" title="<?php echo T_VINO; ?>"><?php echo T_VINO; ?></a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="reconocimientos elementoListaMenu">
                <a href="<?php echo $urlpath; ?>reconocimientos.php" title="<?php echo T_RECONOCIMIENTOS;?>"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 8) echo 'reconocimientos_activo.png';
else echo 'reconocimientos.png'; ?>" alt="<?php echo T_RECONOCIMIENTOS;?>" />
                </a>
            </li>
            <li class="i_d elementoListaMenu">
                <a href="<?php echo $urlpath; ?>i-d.php" title="<?php echo T_ID;?>"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 9) echo 'id_activo.png';
else echo 'id.png'; ?>" alt="<?php echo T_ID;?>" />
                </a>
            </li>
            <li class="clubsocios elementoListaMenu">
                <div class="title-nav-count">
                    <div class="btn-group">
                        <a href="<?php echo $urlpath; ?>club-de-amigos.php" title="<?php echo T_CLUB;?>" class="dropdown-toggle hoverClub" data-toggle="dropdown">
                            <img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 5) echo 'club_de_amigos_activo.png';
else echo 'club_de_amigos.png'; ?>" alt="<?php echo T_CLUB;?>" />
                        </a>
                        <ul class="dropdown-menu submenuClub oculto hoverClub" id="ul-nav-count">
                            <li><a href="<?php echo $urlpath; ?>club-de-amigos.php" style="text-decoration:none!important" title="<?php echo T_CLUB ?>"><?php echo T_CLUB; ?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $urlpath ?>condiciones.php" style="text-decoration:none!important" title="<?php echo T_CONDICIONES ?>"><?php echo T_CONDICIONES; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>ventajas.php" style="text-decoration:none!important" title="<?php echo T_VENTAJAS ?>"><?php echo T_VENTAJAS; ?></a></li>
                            <li><a href="<?php echo $urlpath ?>hagase-socio.php" style="text-decoration:none!important" title="<?php echo T_SOCIO ?>"><?php echo T_SOCIO; ?></a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="prensa elementoListaMenu"><a href="<?php echo $urlpath; ?>prensa.php" title="Prensa"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 6) echo 'prensa_activo.png';
else echo 'prensa.png'; ?>" alt="Prensa" /></a></li>
            <li class="contacto elementoListaMenu"><a href="<?php echo $urlpath; ?>contacto.php" title="Contacto"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/<?php if (isset($menuOption) && $menuOption == 7) echo 'contacto_activo.png';
else echo 'contacto.png'; ?>" alt="Contacto" /></a></li>
        </ul>
    </div>
    <div class="clear"><!----></div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo $urlpath; ?>js/bootstrap.min.js"></script>

</div>

