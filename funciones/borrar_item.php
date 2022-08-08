<?php
session_start();
$tipo           = $_POST["tipos"];
$id             = $_POST["id"];

$resultado      = "";

if($tipo === "packs"){
    $packs          =   $_SESSION["carrito_pack"];
    for ($i=0; $i < count($packs) ; $i++) { 
        if($packs[$i]["id"] == $id){
            array_splice($packs,$i,1);
        }
    }
    $_SESSION["carrito_pack"] = $packs;
 
}else{
    $items          =   $_SESSION["carrito_item"];
    for ($i=0; $i < count($items) ; $i++) { 
        if($items[$i]["id"] == $id){
            array_splice($items,$i,1);
        }
    }
    $_SESSION["carrito_item"] = $items;
}

$t_carrito = 0;
$t_items = 0;

if(!isset($_SESSION["carrito_pack"])){
}else{
    $t_carrito = count($_SESSION["carrito_pack"]);
}

if(!isset($_SESSION["carrito_item"])){
}else{
    $t_items = count($_SESSION["carrito_item"]);
}

$total = $t_carrito + $t_items;

echo $total;

?>