<?php
// NO USAR SE DEBE BORRAR

// session_start();

// include_once("../funciones/funciones.php");

// $neto_pass = array();
// $neto_pass2 = array();

// if(isset($_SESSION["carrito_item"])){
//     $c_item = $_SESSION["carrito_item"];
//     $prod_items = buscar_datos_productos($c_item);
//     $neto_conteo = array();
//     for ($i=0; $i < count($prod_items) ; $i++) { 
//         if($prod_items[$i]["oferta"] == 1){
//             array_push($neto_conteo,($prod_items[$i]["p_oferta"] * $prod_items[$i]["cantidad"] ));
//         }else{
//             array_push($neto_conteo,($prod_items[$i]["p_venta"] * $prod_items[$i]["cantidad"] ));
//         }
//     }
//     $neto_pass = array_sum($neto_conteo);
// }



// if(isset($_SESSION["carrito_pack"])){
//     $c_pack = $_SESSION["carrito_pack"];
//     $prod_packs = buscar_datos_packs($c_pack);
//     $neto_conteo = array();
//     for ($i=0; $i < count($prod_packs) ; $i++) { 
//         if($prod_packs[$i]["oferta"] == 1){
//             array_push($neto_conteo,($prod_packs[$i]["p_oferta"] *  $prod_packs[$i]["cantidad"] ));
//         }else{
//             array_push($neto_conteo,($prod_packs[$i]["p_venta"] * $prod_packs[$i]["cantidad"]) );
//         }
//     }
//     $neto_pass2 = array_sum($neto_conteo);
// }

// $neto = $neto_pass + $neto_pass2;



?>