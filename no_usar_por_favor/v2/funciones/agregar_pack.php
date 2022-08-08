<?php

session_start();

$id             = $_POST["id"];

$carrito_pack   = array();


if(!isset($_SESSION["carrito_pack"])){
    array_push($carrito_pack,array("id" => $id, "cantidad" => 1));
}else{
    $carrito_pack = $_SESSION["carrito_pack"];
    $encontrado = false;
    $numero = 0;
    for ($i=0; $i < count($carrito_pack); $i++) { 
        if($carrito_pack[$i]["id"] == $id ){
           $encontrado = true;
           $numero = $i;
        }
    }
    if($encontrado == true){
        $carrito_pack[$numero]["cantidad"] = $carrito_pack[$numero]["cantidad"] + 1;
    }else{
        array_push($carrito_pack,array("id" => $id, "cantidad" => 1));
    }
}

$_SESSION["carrito_pack"] = $carrito_pack;

echo count($_SESSION["carrito_pack"]);




?>