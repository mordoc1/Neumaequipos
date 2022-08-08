<?php

session_start();

$id             = $_POST["id"];
$cantidad = 1;

if(!isset($_POST["cantidad"])){
    $cantidad = 1;
}else{
    $cantidad = $_POST["cantidad"];
}


$carrito_item   = array();


if(!isset($_SESSION["carrito_item"])){
    array_push($carrito_item,array("id" => $id, "cantidad" => $cantidad));
}else{
    $carrito_item = $_SESSION["carrito_item"];
    $encontrado = false;
    $numero = 0;
    for ($i=0; $i < count($carrito_item); $i++) { 
        if($carrito_item[$i]["id"] == $id ){
           $encontrado = true;
           $numero = $i;
        }
    }
    if($encontrado == true){
        $carrito_item[$numero]["cantidad"] = $carrito_item[$numero]["cantidad"] + $cantidad;
    }else{
        array_push($carrito_item,array("id" => $id, "cantidad" => $cantidad));
    }
}

$_SESSION["carrito_item"] = $carrito_item;

echo count($_SESSION["carrito_item"]);

// echo "opipo";


?>