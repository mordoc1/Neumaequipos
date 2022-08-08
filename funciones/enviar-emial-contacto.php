<?php

include_once("../funciones/funciones.php");

$nombre             =   base64_decode($_POST["nombre"]); 
$email              =   base64_decode($_POST["email"]);
$asunto             =   base64_decode($_POST["asunto"]);
$msg                =   base64_decode($_POST["msg"]);

$contacto_admin     =   get_correo_contacto();

$cliente_asunto         = "neumaequipos.cl Cotización Nº ".$n_cotizacion;
ob_start();
include_once("email-contaco.php");

$nombre                  =   $nombre;
$email                   =   $email;
$asunto                  =   $asunto;
$msg                     =   $msg;

$correo_php             = ob_get_contents();
ob_end_clean();

$desde                 = 'MIME-Version: 1.0' . "\r\n";
$desde                 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$desde                 .= "From:"."	neumaequipos.cl <no-reply@neumaequipos.cl>";
// mail cliente
mail($contacto_admin,$cliente_asunto,$correo_php,$desde);

echo "temrino";




?>