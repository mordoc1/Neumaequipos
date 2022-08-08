<?php

function precio_pack($id){
    include("../include/conx_pdo.php");
  
    $data = 0;
  
    $sql = "SELECT p_oferta FROM packs WHERE id = '$id' LIMIT 1";
  
    $result = $base->prepare($sql);
    $result->execute();
  
    while($f = $result->fetch(PDO::FETCH_OBJ)){
        $data = $f->p_oferta;
    }
  
    $base = null;
    $result->closeCursor();
  
    return $data;
  }


$nombre = strtolower($_GET["nombre"]);
$telefono   = strtolower($_GET["telefono"]);
$email  = strtolower($_GET["email"]);
$region = strtolower($_GET["region"]);
$msg    = strtolower($_GET["msg"]);
$ciudad = strtolower($_GET["ciudad"]);
$direccion  = strtolower($_GET["direccion"]);
$idProducto     = strtolower($_GET["idPorducto"]);

$p_venta = precio_pack($idProducto);

// plugin - 



?>