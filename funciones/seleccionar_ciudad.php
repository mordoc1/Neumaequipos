<?php

include("../include/conx.php");
$ciudad = array();

$codigo = $_POST["id_region"];


$re = $mysqli->query("SELECT id, ciudad FROM regiones WHERE id_reg = '$codigo' ") or die(mysql_error());
    while($f = $re->fetch_object()){
        array_push($ciudad, array("id" => $f->id, "ciudad" => $f->ciudad ));
}
$mysqli->close;

echo  json_encode($ciudad);



 ?>
