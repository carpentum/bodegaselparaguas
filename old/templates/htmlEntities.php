<?php
function aHtmlEntities($stringEntrante){
    $stringSaliente = str_replace("�","&aacute;",$stringEntrante);
    $stringSaliente = str_replace("�","&eacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&iacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&oacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&uacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&Aacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&Eacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&Iacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&Oacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&Uacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&nacute;",$stringSaliente);
    $stringSaliente = str_replace("�","&Nacute;",$stringSaliente);
    $stringSaliente = str_replace("�","#252;",$stringSaliente);
    $stringSaliente = str_replace("�","#220;",$stringSaliente);

}
?>
