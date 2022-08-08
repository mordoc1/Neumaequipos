<?php
const _Iva = 0.19;
// const _Url = 'http://localhost/neumaequipos_v2/';
const _Url = "https://neumaequipos.cl/";


function productos_pack($id){
  include("./include/conx_pdo.php");

  $data = array();

  $sql = "SELECT p.descripcion
          FROM productos AS p 
          INNER JOIN productos_packs AS pp
          ON pp.id_producto = p.id
          INNER JOIN compras AS c
          ON c.id_pack = pp.id_pack
          INNER JOIN transbank AS t
          ON c.id = t.id_compra
          WHERE t.id = '$id' ";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){
    array_push($data, array("descripcion" => $f->descripcion));
  }

  $base = null;
  $result->closeCursor();

  return $data;

}

function get_data_compra_tbk($id){
  include("./include/conx_pdo.php");
  
  $data = array();

  $sql = "SELECT t.status ,t.fecha, t.card_detail, t.payment_type_code, t.installments_amount, 
                t.installments_number, t.total, p.img, p.descripcion, c.enviado, ptc.nombre AS tipo_pago,
                c.nombre AS c_nombre, c.telefono AS telefono, c.email, c.region, c.ciudad, c.direccion
          FROM transbank AS t 
          INNER JOIN compras AS c
          ON t.id_compra = c.id
          INNER JOIN packs AS p
          ON c.id_pack = p.id
          INNER JOIN payment_type_code AS ptc
          ON t.payment_type_code = ptc.tipe
          WHERE t.id = '$id'";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){
    $data = array("status" => $f->status, "fecha" => $f->fecha, "card_detail" => $f->card_detail, "payment_type_code" => $f->payment_type_code, 
                "installments_amount" => $f->installments_amount, "installments_number" => $f->installments_number, "total" => $f->total, 
                "img" => $f->img, "descripcion" => $f->descripcion, "enviado" => $f->enviado, "tipo_pago" => $f->tipo_pago,
                "c_nombre" => $f->c_nombre, "telefono" => $f->telefono, "email" => $f->email, "region" => $f->region, "ciudad" => $f->ciudad, 
                "direccion" =>$f->direccion);
  }

  $base = null;
  $result->closeCursor();

  return $data;
}

function get_data_pack($id){ 
  include("./include/conx_pdo.php");

  $data = array();

  $sql = "SELECT id, codigo, descripcion, p_venta, oferta, p_oferta, img FROM packs WHERE id = '$id'";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){
    $data = array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "p_venta" => $f->p_vemta, "oferta" => $f->oferta,"p_oferta" => $f->p_oferta, "p_venta" => $f->p_venta, "img" => $f->img);
  }

  $base = null;
  $result->closeCursor();

  return $data;
}


function show_optiions(){

  include("include/conx_pdo.php");

  $data = "0";

  $sql = "SELECT dato FROM configuracion WHERE tipo = 'ver_cotizador' LIMIT 1";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){
      $data = $f->dato;
  }
  $base = null;
  $result->closeCursor();

  $data = $data == "0" ? false: true;

  return $data;
}

function get_phone($id){
  // 2 => telefono  de contacto
  // 3 => telefono de postventa
  include("include/conx.php");

  $datos = array();

  $re = $mysqli->query("SELECT correo FROM telefonos WHERE id = '$id' LIMIT 1") or die($mysqli->error());
      while($f = $re->fetch_object()){
        $datos = array("correo" => $f->correo);
  }
  $mysqli->close();

  return $datos;
}

function generar_url($cadena) {
  $separador = '-';//ejemplo utilizado con guión medio
  $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
  $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
  //Quitamos todos los posibles acentos
  $url = strtr(utf8_decode($cadena), utf8_decode($originales), $modificadas);
  //Convertimos la cadena a minusculas
  $url = utf8_encode(strtolower($url));
  //Quitamos los saltos de linea y cuanquier caracter especial
  $buscar = array(' ', '&amp;', '\r\n', '\n', '+');
  $url = str_replace ($buscar, $separador, $url);
  $buscar = array('/[^a-z0-9\-&lt;&gt;]/', '/[\-]+/', '/&lt;[^&gt;]*&gt;/');
  $reemplazar = array('', $separador, '');
  $url = preg_replace ($buscar, $reemplazar, $url);
  return $url;
}
function mostrar_pack(){
  include("include/conx.php");
  $datos = array();
  $re = $mysqli->query("SELECT id, dato FROM configuracion WHERE tipo = 'mostrar_pack' ") or die($mysqli->error());
      while($f = $re->fetch_object()){
        $datos = array("id" => $f->id, "dato" => $f->dato);
  }
  $mysqli->close();
  return $datos;
}

function email_algorit_desicion(){
  include("../include/conx.php");
  $email_array  = "";
  $index = "0";
  $re = $mysqli->query("SELECT * FROM configuracion WHERE tipo = 'diferido_mail' ") or die($mysqli->error());
    while($f = $re->fetch_object()){
      $email_array = $f->dato;
  }
  $re = $mysqli->query("SELECT * FROM configuracion WHERE tipo = 'cant_diferido' ") or die($mysqli->error());
    while($f = $re->fetch_object()){
      $index = intval($f->dato);
  }
  $emals = explode(",", $email_array);
  $limite = count($emals);
  $email_retorno = "";
  if($limite > $index ){
    $email_retorno = $emals[$index];
    $dato = strval($index+1);
    $mysqli->query("UPDATE configuracion SET dato = '$dato' WHERE tipo = 'cant_diferido' ");
  }elseif ($limite == $index) {
    $email_retorno = $emals[0];
    $dato = strval(1);
    $mysqli->query("UPDATE configuracion SET dato = '$dato' WHERE tipo = 'cant_diferido' ");
  }
  $mysqli->close();
  return $email_retorno;
}

function datos_contacto($tipo){
  include("include/conx.php");
  $datos = array();
  $re = $mysqli->query("SELECT * FROM telefonos WHERE tipo = '$tipo' AND estado = 1") or die($mysqli->error());
      while($f = $re->fetch_object()){
        array_push($datos,array("id" => $f->id, "responsable" => $f->responsable, "telefono" => $f->telefono, "correo" => $f->correo));
  }
  $mysqli->close();
  return $datos;
}
function get_lbl_seo($id){
  include("include/conx.php");
  $lbl = array();
  $re = $mysqli->query("SELECT lbl FROM seo WHERE id_categoria = '$id' ") or die(mysql_error());
      while($f = $re->fetch_object()){
        array_push($lbl,$f->lbl);
  }
  $mysqli->close();
  return $lbl;
}
function get_correo_contacto(){
  include("../include/conx.php");
  $correo_contacto = array();
  $re = $mysqli->query("SELECT dato FROM configuracion WHERE tipo = 'correo_contacto' ") or die(mysql_error());
      while($f = $re->fetch_object()){
         $correo_contacto = $f->dato;
         array_push($correo_contacto, $f->dato);
  }
  $mysqli->close;
  return $correo_contacto;
}
function eliminar_sesion(){
  session_start();
  unset($_SESSION["carrito_item"]);
  unset($_SESSION["carrito_pack"]);
  unset($_SESSION["producto_pack"]);
  unset($_SESSION["producto_item"]);
  unset($_SESSION["total_neto"]);
  unset($_SESSION["total_iva"]);
  unset($_SESSION["total_total"]);
}
function selection_regiones($id){
  include('../include/conx.php');
  $region = "";
  $re = $mysqli->query("SELECT region FROM regiones where id_reg = '$id' limit 1;") or die(mysql_error());
      while($f = $re->fetch_object()){
        $region = $f->region;
  }
  $mysqli->close;
  return $region;
}
function agregar_productos_cotizados($n_cotizacion){
  $n_cotizacion = intval($n_cotizacion);
  // session_start();
  include("../include/conx.php");
  $c_item = "";
  $c_pack = "";
  if(!isset($_SESSION["carrito_item"])){
  }else{
    $c_item = $_SESSION["carrito_item"];
    for ($i=0; $i < count($c_item) ; $i++) {
        $id = $c_item[$i]["id"];
        $cnt = $c_item[$i]["cantidad"];
        $mysqli->query("INSERT INTO productos_cotizaciones (id_cotizacion, tipo, id_producto, cantidad) VALUES('$n_cotizacion',0,'$id','$cnt')");
    }
  }
  if(isset($_SESSION["carrito_pack"])){
      $c_pack = $_SESSION["carrito_pack"];
      for ($i=0; $i < count($c_pack) ; $i++) {
        $id = $c_pack[$i]["id"];
        $cnt = $c_pack[$i]["cantidad"];
        $mysqli->query("INSERT INTO productos_cotizaciones (id_cotizacion, tipo, id_producto, cantidad)
                          VALUES('$n_cotizacion',1,'$id','$cnt')");
      }
  }
  $mysqli->close;
}
function agregar_cotizacion($empresa,$nombre,$apellido,$email,$telefono,$region,$ciudad,$direccion,$nota, $id_email_diferido){
  include("../include/conx.php");
  $mysqli->query("INSERT INTO cotizaciones (empresa,nombre,apellido,email,telefono,region,ciudad,direccion,nota,id_email_diferido)
                  VALUES('$empresa','$nombre','$apellido','$email','$telefono','$region','$ciudad','$direccion','$nota', '$id_email_diferido')");
  $mysqli->close;
}
function ultima_ctoizacion(){
  include("../include/conx.php");
  $numero = 0;
  $re = $mysqli->query("SELECT max(id) FROM cotizaciones") or die(mysql_error());
  $row = $re->fetch_row();
  $numero = $row[0];
  $mysqli->close;
  return $numero;
}
function seleccionar_regiones(){
  include("include/conx.php");
  $regiones = array();
  $re = $mysqli->query("SELECT DISTINCT id_reg, region FROM regiones") or die(mysql_error());
      while($f = $re->fetch_object()){
          array_push($regiones, array("id" => $f->id_reg, "region" => $f->region ));
  }
  $mysqli->close();
  return $regiones;
}

function get_correo_admin(){
  // cantidad de cotizacion emial reponsable
  include("../include/conx.php");
  $correo_admin = "";
  $re = $mysqli->query("SELECT dato FROM configuracion WHERE tipo = 'correo_admin' ") or die(mysql_error());
      while($f = $re->fetch_object()){
          $correo_admin = $f->dato;
  }
  $mysqli->close();
  return $correo_admin;
}
//
// function get_email_usaurrio(){
//     include("../include/conx.php");
//
//     $cantidad = array();
//
//     $re = $mysqli->query("SELECT email FROM email_diferido") or die(mysql_error());
//         while($f = $re->fetch_object()){
//             array_push($cantidad,$f->email);
//     }
//
//     $data = "";
//     $cont = 1;
//
//     $re = $mysqli->query("SELECT cont, email FROM email_diferido WHERE estado = 1 LIMIT 1") or die(mysql_error());
//         while($f = $re->fetch_object()){
//           $data = $f->email;
//           $cont = $f->cont;
//     }
//
//     $mysqli->query("UPDATE email_diferido SET estado = 0");
//     // 2                  1
//     if(count($cantidad)  >= $cant){
//       // resetear a 1
//       $mysqli->query("UPDATE email_diferido SET estado = 1 WHERE cont = 1");
//     }else{
//       // se suma 1
//       $update = $cont + 1
//       $mysqli->query("UPDATE email_diferido SET estado = 1 WHERE cont = '$update'");
//     }
//     // 3 -> 0, 1, 2
//     $mysqli->close();
//
//     return "taoista.games@gmail.com";
// }


function productos_categoria($categoria){
  include("include/conx.php");
  $datos = array();
  $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre, m.nombre AS marca,  id_marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img
  FROM productos AS p
  INNER JOIN tipos AS t
  ON p.id_tipo = t.id
  INNER JOIN marcas AS m
  ON p.id_marca = m.id
  INNER JOIN origen AS o
  ON p.id_origen = o.id
  INNER JOIN tipo_compresor AS tp
  ON tp.id_producto = p.id
  WHERE titulo = '$categoria' AND p.estado = 1
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
  array_push($datos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
              "tipo" => $f->nombre, "marca" => $f->marca, "id_marca" => $f->id_marca,"origen" => $f->nombre, "of" => $f->oferta,
              "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img ));
  }
  mysqli_close($mysqli);
  return $datos;
}
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
  WHERE p.descripcion LIKE '%$palabra%' OR p.codigo LIKE '%$palabra%' $busqueda $busqueda2 AND p.estado = 1
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
  $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre, p.id_marca ,m.nombre AS marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.stock,p.img
  FROM productos AS p
  INNER JOIN tipos AS t
  ON p.id_tipo = t.id
  INNER JOIN marcas AS m
  ON p.id_marca = m.id
  INNER JOIN origen AS o
  ON p.id_origen = o.id
  WHERE p.estado = 1 AND p.descripcion LIKE '%$palabra%' OR p.codigo LIKE '%$palabra%'  $busqueda  $busqueda2
  $order
  LIMIT $desde, $hasta
  ") or die($mysqli->error);
  while($f = $re->fetch_object()){
  array_push($datos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
              "tipo" => $f->nombre, "id_marca" => $f->id_marca, "marca" => $f->marca, "origen" => $f->nombre, "of" => $f->oferta,
              "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "stock" => $f->stock,"img" => $f->img ));
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
    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, p.ficha,t.nombre AS tipo, m.nombre, p.id_marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img, d.detalle, p.id_tipo, p.stock
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
       $datos = array("id" => $f->id, "codigo" => $f->codigo, "nombre" => $f->descripcion, "star" => $f->star, "ficha" => $f->ficha,
                      "tipo" => $f->tipo, "marca" => $f->nombre, "origen" => $f->nombre, "of" => $f->oferta,
                      "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img, "detalle" => $f->detalle,
                      "relacion" => $f->id_tipo, "stock" => $f->stock, "id_marca" => $f->id_marca );
    }
    mysqli_close($mysqli);
    return $datos;
}

function detalle_pack(){
  include("includes/conx.php");
  $datos = array();






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
        array_push($packs, array("tipe" => 1,"id" => $f->id, "descripcion" => $f->descripcion, "p_venta" => $f->p_venta, "p_oferta" => $f->p_oferta,"img" => $f->img));
    }
    // * se agregao ya que se necesitaba agrear productos con oferta

    $re = $mysqli->query("SELECT * FROM productos WHERE estado = 1 AND oferta = 1") or die($mysqli->error);
    while($f = $re->fetch_object()){
        array_push($packs, array("tipe" => 2,"id" => $f->id, "descripcion" => $f->descripcion, "p_venta" => $f->p_venta, "p_oferta" => $f->v_oferta,"img" => $f->codigo));
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
    $re = $mysqli->query("SELECT p.id, p.codigo, p.descripcion, p.star, t.nombre AS tipo, m.nombre AS marca, id_marca, o.nombre, p.oferta, p.v_oferta, p.p_venta, p.img, p.stock
                        FROM productos AS p
                        INNER JOIN tipos AS t
                        ON p.id_tipo = t.id
                        INNER JOIN marcas AS m
                        ON p.id_marca = m.id
                        INNER JOIN origen AS o
                        ON p.id_origen = o.id
                        WHERE p.id_tipo='$id' AND p.estado = 1") or die($mysqli->error);
    while($f = $re->fetch_object()){
       array_push($productos,array("id" => $f->id, "codigo" => $f->codigo, "descripcion" => $f->descripcion, "star" => $f->star,
                                "tipo" => $f->tipo, "marca" => $f->marca, "id_marca" => $f->id_marca,"origen" => $f->nombre, "of" => $f->oferta,
                                "p_oferta" => $f->v_oferta, "p_venta" => $f->p_venta, "img" => $f->img, "stock" => $f->stock ));
    }
    $mysqli->close();
    return $productos;
}
?>
