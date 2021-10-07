<?php
$queryFotos = "SELECT * FROM pics WHERE visible= '1' ";
//$queryFotos .= (isset($idActividad) && $idActividad != "")?" AND idActividad='".$idActividad."' ":"";
$queryFotos .= " ORDER BY id ASC";
//echo $queryFotos;die;
$resultFotos = mysql_query($queryFotos);
$numFotos = mysql_num_rows($resultFotos);

if($numFotos > 1){
    $i=0;
    while ($rowFotos = mysql_fetch_array($resultFotos)){
        $arrFotos[$i]['id'] = $rowFotos['id'];
        $arrFotos[$i]['name'] = $rowFotos['name'];
        $arrFotos[$i]['path'] = $rowFotos['path'];
        $arrFotos[$i]['visible'] = $rowFotos['visible'];
        $i++;
    }
}else if ($numFotos > 0){
    $arrFotos[0] = mysql_fetch_assoc($resultFotos);
    extract($arrFotos[0]);
    //print_r($arrFotos[0]);
}
?>