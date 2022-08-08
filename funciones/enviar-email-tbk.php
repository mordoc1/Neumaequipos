<?php

function email_algorit_desicion2(){
    $mysql_database = "neum68927_neumaequipos";
        $mysql_hostname = "localhost";
        $mysql_user = "neum68927_taoista";
        $mysql_password = "7340458Tao";
        $mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Error: No es posible establecer la conexión");
        $mysqli->set_charset("utf8");
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

$nombre             =   strtolower($data["c_nombre"]);
$email              =   strtolower($data["email"]);
$telefono           =   strtolower($data["telefono"]);
$fecha              =   date("d-m-Y", strtotime($data["fecha"]));
$hora               =   date("H:i", strtotime($data["fecha"]));
$forma_pago         =   $data["tipo_pago"];
$pack               =   $data["descripcion"];
$codig_pago         =   $data["payment_type_code"];
$cant_ctas          =   $data["installments_number"];
$val_ctas           =   $data["installments_amount"];
$region = strtoupper($data["region"]);
$ciudad = strtoupper($data["ciudad"]);
$direccion = strtoupper($data["direccion"]);
$total              =   fomato_moneda(ceil($data["total"]));
$productos          =   productos_pack($token);

$contacto_admin     =   email_algorit_desicion2();

$cliente_asunto     = "neumaequipos.cl Compra Nº ".$token;

ob_start();
include_once("funciones/email-tbk/email.php");

$nombre = $nombre;
$email = $email;
$telefono = $telefono;
$fecha = $fecha;
$hora = $hora;
$pack = $pack;
$forma_pago = $forma_pago;
$codig_pago = $codig_pago;
$cant_ctas = $cant_ctas;
$val_ctas = $val_ctas;
$productos = $productos;
$region = $region;
$ciudad = $ciudad;
$direccion = $direccion;
$total = $total;

$correo_php             = ob_get_contents();
ob_end_clean();

$desde                 = 'MIME-Version: 1.0' . "\r\n";
$desde                 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$desde                 .= "From:"."	neumaequipos.cl <no-reply@neumaequipos.cl>";
// // mail cliente
mail($contacto_admin,$cliente_asunto,$correo_php,$desde);
mail($email,$cliente_asunto,$correo_php,$desde);
mail("mhernandez@neumachile.cl",$cliente_asunto,$correo_php,$desde);
mail("aolave@neumachile.cl",$cliente_asunto,$correo_php,$desde);


?>