<?php

const _Iva = 0.19;

const _Url = "http://localhost/neumaequipos2/";
// const _Url = "https://neumaequipos.cl/";
// const _Url = "http://ingeniopc.cl/neumaequiposv2/";


function buscar_datos_packs($c_pack){
  include("include/conx.php");
  $productos = array();
  for ($i=0; $i < count($c_pack) ; $i++) {
    $id = $c_pack[$i]["id"];
    $cantidad = $c_pack[$i]["cantidad"];
    $re = $mysqli->query("SELECT p.id, p.codigo,p.descripcion, p.p_venta, p.oferta, p.p_oferta, p.lbl, p.img
                          FROM packs AS p
                          WHERE p.id = '$id' 
                          AND p.estado = 1 ") or die($mysqli->error);
    while($f = $re->fetch_object()){
      array_push($productos,array("id" => $f->id, "codigo" => $f->codigo,"descripcion" => $f->descripcion, "p_venta" => $f->p_venta,"oferta" => $f->oferta, "p_oferta" => $f->p_oferta,
                                  "lbl" => $f->lbl, "img" => $f->img, "cantidad" => $cantidad));
    }
  }
  mysqli_close($mysqli);
  return $productos;

}

function buscar_datos_productos($c_item){
  include("include/conx.php");
  $productos = array();
  for ($i=0; $i < count($c_item) ; $i++) {
    $id = $c_item[$i]["id"];
    $cantidad = $c_item[$i]["cantidad"];
    $re = $mysqli->query("SELECT p.id, p.codigo,p.descripcion, p.p_venta, p.oferta, p.v_oferta, p.img
                          FROM productos AS p
                          WHERE p.id = '$id' 
                          AND p.estado = 1 ") or die($mysqli->error);
    while($f = $re->fetch_object()){
      array_push($productos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "p_venta" => $f->p_venta,"oferta" => $f->oferta, "p_oferta" => $f->v_oferta,
                                  "img" => $f->img, "cantidad" => $cantidad));
    }
  }
  mysqli_close($mysqli);
  return $productos;
}


function total_item_carrito(){
  // session_start();
  $total = 0;
  $uno = 0;
  $dos = 0;
  if(isset($_SESSION["carrito_pack"])){
    $uno = count($_SESSION["carrito_pack"]);
  }
  if(isset($_SESSION["carrito_item"])){
    $dos = count($_SESSION["carrito_item"]);
  }
  $total = $uno + $dos;
  return $total;

}

function get_condiciones($id){
  include("include/conx.php");

  $datos = array();

  $re = $mysqli->query("SELECT * FROM condiciones WHERE id_producto = '$id' ") or die($mysqli->error);
  while($f = $re->fetch_object()){
    array_push($datos,array("texto" => $f->texto));
  }

  mysqli_close($mysqli);
  return $datos;


}

function get_ficha($id){
  include("include/conx.php");
  $datos = array();

  $re = $mysqli->query("SELECT * FROM ficha WHERE id_producto = '$id' ") or die($mysqli->error);
  while($f = $re->fetch_object()){
    array_push($datos,array("texto_1" => $f->texto_1, "texto_2" => $f->texto_2));
  }


  mysqli_close($mysqli);
  return $datos;

}

function filstro_marcas($palabra){
  include("include/conx.php");
  $datos = array();

  $re = $mysqli->query("SELECT DISTINCT p.id_tipo, m.nombre
  FROM productos AS p
  INNER JOIN marcas AS m
  ON p.id_tipo = m.id
  WHERE p.descripcion LIKE '%$palabra%'
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
    array_push($datos,array("id" => $f->id_tipo ,"marca" => ucfirst(strtolower($f->nombre))));
  }

  mysqli_close($mysqli);
  return $datos;
}

function filtro_tipo($palabra){
  include("include/conx.php");
  $datos = array();

  $re = $mysqli->query("SELECT DISTINCT p.id_tipo, t.nombre
  FROM productos AS p
  INNER JOIN tipos AS t
  ON p.id_tipo = t.id
  WHERE p.descripcion LIKE '%$palabra%'
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
    array_push($datos,array("id" => $f->id_tipo,"tipo" => ucfirst(strtolower($f->nombre))));
  }

  mysqli_close($mysqli);
  return $datos;
}

function prod_pagina($palabra){
  include("include/conx.php");
  $datos = array();

  $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre, m.nombre AS marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
  FROM productos AS p
  INNER JOIN tipos AS t
  ON p.id_tipo = t.id
  INNER JOIN marcas AS m
  ON p.id_marca = m.id
  INNER JOIN origen AS o
  ON p.id_origen = o.id
  WHERE p.descripcion LIKE '%$palabra%' AND p.estado = 1
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
  array_push($datos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
              "tipo" => $f->nombre, "marca" => $f->marca, "origen" => $f->nombre, "of" => $f->oferta,
              "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
  }

  mysqli_close($mysqli);
  return $datos;
}

function buscar_productos_todos($palabra,$tipos,$marcas){
  include("include/conx.php");
  $datos = array();

  $busqueda = " AND";
  $busqueda2 = " AND";
  if($tipos[0] != "todas"){
    for ($i=0; $i < count($tipos) ; $i++) {
      $dato = $tipos[$i];
      $busqueda .= " t.nombre = '$dato' OR";
    }
    $busqueda = substr($busqueda, 0, -2);
    // $busqueda = substr($busqueda, 0, -1);
  }else{
    $busqueda = "";
  }

  if($marcas[0] != "todas"){
    for ($i=0; $i < count($marcas) ; $i++) {
      $busqueda2 .= " m.nombre = '$marcas[$i]' OR";
    }
    $busqueda2 = substr($busqueda2, 0, -2);
  }else{
    $busqueda2 = "";
  }

  $re = $mysqli->query("SELECT p.id
  FROM productos AS p
  INNER JOIN tipos AS t
  ON p.id_tipo = t.id
  INNER JOIN marcas AS m
  ON p.id_marca = m.id
  INNER JOIN origen AS o
  ON p.id_origen = o.id
  WHERE p.descripcion LIKE '%$palabra%' $busqueda $busqueda2 AND p.estado = 1 
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
  array_push($datos,array("id" => $f->id));
  }

  mysqli_close($mysqli);
  return $datos;
}

function buscar_productos($palabra,$tipos,$marcas,$orden,$desde,$hasta){
  include("include/conx.php");

  // 1 => precio mneo a mayor
  // 2 => precio mayor a menor
  // 3 => alf desc
  // 4 => alf asc
  $order = " ORDER BY";
  if($orden == "1"){
    $order  .= " p.p_venta ASC";
  }elseif ($orden == "2") {
    $order  .= " p.p_venta DESC";
  }elseif ($orden == "3") {
    $order  .= " p.descripcion ASC";
  }elseif ($orden == "4") {
    $order  .= " p.descripcion DESC";
  }

  $datos = array();
  $busqueda = " AND";
  $busqueda2 = " AND";
  if($tipos[0] != "todas"){
    for ($i=0; $i < count($tipos) ; $i++) {
      $dato = $tipos[$i];
      $busqueda .= " t.nombre = '$dato' OR";
    }
    $busqueda = substr($busqueda, 0, -2);
    // $busqueda = substr($busqueda, 0, -1);
  }else{
    $busqueda = "";
  }
  if($marcas[0] != "todas"){
    for ($i=0; $i < count($marcas) ; $i++) {
      $dato = $marcas[$i];
      $busqueda2 .= " m.nombre = '$dato' OR";
    }
    $busqueda2 = substr($busqueda2, 0, -2);
  }else{
    $busqueda2 = "";
  }

  $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre, m.nombre AS marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
  FROM productos AS p
  INNER JOIN tipos AS t
  ON p.id_tipo = t.id
  INNER JOIN marcas AS m
  ON p.id_marca = m.id
  INNER JOIN origen AS o
  ON p.id_origen = o.id
  WHERE p.descripcion LIKE '%$palabra%'  $busqueda  $busqueda2
  $order
  LIMIT $desde, $hasta
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
  array_push($datos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
              "tipo" => $f->nombre, "marca" => $f->marca, "origen" => $f->nombre, "of" => $f->oferta,
              "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
  }

  mysqli_close($mysqli);
  return $datos;

}



function productos_realcionados($relacion, $limit){
    include("include/conx.php");
    $datos = array();

    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre, m.nombre AS marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
    FROM productos AS p
    INNER JOIN tipos AS t
    ON p.id_tipo = t.id
    INNER JOIN marcas AS m
    ON p.id_marca = m.id
    INNER JOIN origen AS o
    ON p.id_origen = o.id
    WHERE p.id_tipo = '$relacion'
    ORDER BY RAND()
    LIMIT $limit") or die($mysqli->error);
    while($f = $re->fetch_object()){
    array_push($datos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
                "tipo" => $f->nombre, "marca" => $f->marca, "origen" => $f->nombre, "of" => $f->oferta,
                "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
    }

    mysqli_close($mysqli);
    return $datos;
}


function imagenes_productos($id){
    include("include/conx.php");
    $datos = array();
    $re = $mysqli->query("SELECT * FROM images WHERE id_productos = '$id' ") or die($mysqli->error);
    while($f = $re->fetch_object()){
       array_push($datos,array("imgs" => $f->imgs));
    }
    mysqli_close($mysqli);
    return $datos;
}

function detalle_producto($id){
    include("include/conx.php");
    $datos = array();
    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre AS tipo, m.nombre, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img, d.detalle, p.id_tipo
                        FROM productos AS p
                        INNER JOIN tipos AS t
                        ON p.id_tipo = t.id
                        INNER JOIN marcas AS m
                        ON p.id_marca = m.id
                        INNER JOIN origen AS o
                        ON p.id_origen = o.id
                        INNER JOIN detalle AS d
                        ON p.id = d.id_producto
                        WHERE p.id = '$id' ") or die($mysqli->error);
    while($f = $re->fetch_object()){
       $datos = array("id" => $f->id, "codigo" => $f->codigo, "nombre" => $f->descripcion, "star" => $f->star,
                                "tipo" => $f->tipo, "marca" => $f->nombre, "origen" => $f->nombre, "of" => $f->oferta,
                                "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img, "detalle" => $f->detalle,
                                "relacion" => $f->id_tipo);
    }
    mysqli_close($mysqli);
    return $datos;
}

function top_productos($cantidad){
    include("include/conx.php");
    $datos = array();
    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre, m.nombre, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
                        FROM productos AS p
                        INNER JOIN tipos AS t
                        ON p.id_tipo = t.id
                        INNER JOIN marcas AS m
                        ON p.id_marca = m.id
                        INNER JOIN origen AS o
                        ON p.id_origen = o.id
                        LIMIT $cantidad ") or die($mysqli->error);
    while($f = $re->fetch_object()){
       array_push($datos,array("id" => $f->id, "codigo" => $f->codigo, "nombre" => $f->descripcion, "star" => $f->star,
                                "tipo" => $f->nombre, "marca" => $f->nombre, "origen" => $f->nombre, "of" => $f->oferta,
                                "v_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
    }
    mysqli_close($mysqli);
    return $datos;
}

function fomato_moneda($dato){
    // $numero = strval(number_format(intval($dato),",",".",0));
    // return $dato;
    return "$ ".number_format(intval($dato),0,",",".");
}


function productos_packs($id){
    include("include/conx.php");

    $datos = array();

    $re = $mysqli->query("SELECT pk.id_producto, p.descripcion, p.estado, p.img
                            FROM productos_packs AS pk
                            INNER JOIN productos AS p
                            ON pk.id_producto = p.id
                            WHERE pk.id_pack = '$id' ") or die($mysqli->error);
    while($f = $re->fetch_object()){
       array_push($datos,array("id" => $f->id_producto, "estadoo" => $f->estado, "nombre" => $f->descripcion, "img" =>$f->img));
    }
    mysqli_close($mysqli);
    return $datos;
}

function datos_pack($id){
    include("include/conx.php");

    $datos = array();

    $re = $mysqli->query("SELECT * FROM packs WHERE id = '$id'") or die($mysqli->error);

    while($f = $re->fetch_object()){
        $datos = array("id" => $f->id, "estado" => $f->estado, "descripcion" => $f->descripcion, "p_venta" => $f->p_venta, "of" =>$f->oferta, "p_oferta" => $f->p_oferta ,
                       "lbl" => $f->lbl, "img" => $f->img);
    }

    return $datos;
}


function productos_destacados(){
    include("include/conx.php");

    $prod = array();

    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.oferta, p.p_venta, p.img, p.star
                        FROM productos_destacados AS dest
                        INNER JOIN productos AS p
                        ON dest.id_producto = p.id
                        WHERE dest.estado = 1 AND p.estado = 1 ORDER BY p.id DESC") or die($mysqli->error);
    while($f = $re->fetch_object()){
        array_push($prod, array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "of" => $f->oferta, "p_venta" => $f->p_venta,
                                "img" => $f->img, "star" => $f->star));
    }

    $mysqli->close();
    return $prod;

 
}


function obtener_packs(){
    include("include/conx.php");

    $packs = array();

    $re = $mysqli->query("SELECT * FROM packs WHERE estado = 1") or die($mysqli->error);

    while($f = $re->fetch_object()){
        array_push($packs, array("id" => $f->id, "descripcion" => $f->descripcion, "p_venta" => $f->p_venta, "p_oferta" => $f->p_oferta,"img" => $f->img));
    }

    $mysqli->close();
    return $packs;

}

function state_popup(){
    include("include/conx.php");
    $sts_pop = "";

    $re = $mysqli->query("SELECT dato FROM configuracion WHERE tipo = 'pop-up' ") or die($mysqli->error);
    while($f = $re->fetch_object()){
       $sts_pop = $f->dato;
    }

    $mysqli->close();
    return $sts_pop;
}

function selecionar_tipo($nav){
    include("include/conx.php");
    $selecion = array();

    $re = $mysqli->query("SELECT * FROM tipos WHERE estado = 1 AND nav = '$nav'") or die($mysqli->error);
    while($f = $re->fetch_object()){
        array_push($selecion, array("id" => $f->id, "nav" => $f->nav, "nombre" => ucwords($f->nombre)));
    }

    $mysqli->close();
    return $selecion;

}

function obtener_titulo($id){
    include("include/conx.php");
    $selecion = array();

    $re = $mysqli->query("SELECT * FROM tipos WHERE id='$id'") or die($mysqli->error);
    while($f = $re->fetch_object()){
        $selecion = array("id" => $f->id, "nav" => $f->nav, "nombre" => ucwords($f->nombre));
    }

    $mysqli->close();
    return $selecion;
}

function productos_oferta(){
  include('include/conx.php');

  $productos = array();

  $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre AS tipo, m.nombre AS marca, id_marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
                        FROM productos AS p
                        INNER JOIN tipos AS t
                        ON p.id_tipo = t.id
                        INNER JOIN marcas AS m
                        ON p.id_marca = m.id
                        INNER JOIN origen AS o
                        ON p.id_origen = o.id
                        WHERE p.oferta = 1") or die($mysqli->error);
  while($f = $re->fetch_object()){
      array_push($productos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
                              "tipo" => $f->tipo, "marca" => $f->marca, "id_marca" => $f->id_marca,"origen" => $f->nombre, "of" => $f->oferta,
                              "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
  }

  $mysqli->close();
  return $productos;
  
}

function seleccionar_productos($id){
    include("include/conx.php");
    $productos = array();

    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre AS tipo, m.nombre AS marca, id_marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
                        FROM productos AS p
                        INNER JOIN tipos AS t
                        ON p.id_tipo = t.id
                        INNER JOIN marcas AS m
                        ON p.id_marca = m.id
                        INNER JOIN origen AS o
                        ON p.id_origen = o.id
                        WHERE p.id_tipo='$id'") or die($mysqli->error);
    while($f = $re->fetch_object()){
       array_push($productos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
                                "tipo" => $f->tipo, "marca" => $f->marca, "id_marca" => $f->id_marca,"origen" => $f->nombre, "of" => $f->oferta,
                                "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
    }

    $mysqli->close();
    return $productos;
}

?>
