<?php
include("../include/conx.php");
$id_producto = $_GET["id_producto"];

$data = "";


$re = $mysqli->query("SELECT `url` FROM fichas WHERE id_producto = '$id_producto' LIMIT 1 ") or die($mysqli->error);
while($f = $re->fetch_object()){
   $data = $f->url;
 }
mysqli_close($mysqli);

echo $data;


?>