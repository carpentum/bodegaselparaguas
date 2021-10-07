<?php
foreach($_POST as $nombre_campo => $valor){
    //Si viene de un select múltiple, es decir, es un array
    if(is_array($valor) && count($valor) > 0){
		$asignacion = "$".$nombre_campo." = array();";
        //echo $asignacion."<br />";
        eval($asignacion);
        foreach($valor as $valorValor){
            $asignacion = "$".$nombre_campo."[] =".$valorValor.";";
            //echo $asignacion."<br />";
            eval($asignacion);
        }
        //print_r($arrayQueSea);die;
    }else{
		$asignacion = "$".$nombre_campo."='".$valor."';";
		//echo $asignacion."<br />";
		eval($asignacion);
    }
}
//die;
?>