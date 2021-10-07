<?php
function aHtmlEntities($stringEntrante){
    $stringSaliente = str_replace("á","&aacute;",$stringEntrante);
    $stringSaliente = str_replace("é","&eacute;",$stringSaliente);
    $stringSaliente = str_replace("í","&iacute;",$stringSaliente);
    $stringSaliente = str_replace("ó","&oacute;",$stringSaliente);
    $stringSaliente = str_replace("ú","&uacute;",$stringSaliente);
    $stringSaliente = str_replace("Á","&Aacute;",$stringSaliente);
    $stringSaliente = str_replace("É","&Eacute;",$stringSaliente);
    $stringSaliente = str_replace("Í","&Iacute;",$stringSaliente);
    $stringSaliente = str_replace("Ó","&Oacute;",$stringSaliente);
    $stringSaliente = str_replace("Ú","&Uacute;",$stringSaliente);
    $stringSaliente = str_replace("ñ","&nacute;",$stringSaliente);
    $stringSaliente = str_replace("Ñ","&Nacute;",$stringSaliente);
    $stringSaliente = str_replace("ü","#252;",$stringSaliente);
    $stringSaliente = str_replace("Ü","#220;",$stringSaliente);

}
?>
