<?php
session_start();
$tipo           =   $_POST["tipo"];
$id             =   $_POST["id"];
$cantidad       =   $_POST["cantidad"];
$retorno = "";
$neto_pass = 0;
$neto_pass2 = 0;
if($tipo == "item"){
    $items          =   $_SESSION["carrito_item"];
    for ($i=0; $i < count($items) ; $i++) { 
        if($items[$i]["id"] == $id){
            $items[$i]["cantidad"] = $cantidad;
        }
    }
    $retorno = "modiuficado";
    $_SESSION["carrito_item"] = $items;
}else{
    $packs        =   $_SESSION["carrito_pack"];
    for ($i=0; $i < count($packs) ; $i++) { 
        if($packs[$i]["id"] == $id){
            $packs[$i]["cantidad"] = $cantidad;
        }
    }
    $retorno = "modiuficado";
    $_SESSION["carrito_pack"] = $packs;
}
$neto = $neto_pass + $neto_pass2;
echo $retorno;
?>