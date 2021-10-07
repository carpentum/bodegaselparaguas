<?php
foreach($_GET as $nombre_campo => $valor){
    //urldecode decodes any %##  encoding in the given string, useful if we've encoded a string to be used in a query part of a URL,
    //as a convenient way to pass variables to the next page.
    $asignacion = "urldecode($".$nombre_campo."='".$valor."');";
    //echo $asignacion."<br />";
    eval($asignacion);
}
//die;
?>