<?php

session_start();
include("../funciones/funciones.php");
include("../funciones/funciones_pdo.php");
include("../include/conx.php");
$dato_admin = get_correo_admin();// envio email configuracion
$correo_admin = explode(",", $dato_admin);

$return_data= get_email_usaurrio();

$correo_vendedor = $return_data[0];
$id_correo_vendeor = $return_data[1];

 
$nombre                   = strtolower($_POST["nombre"]);
$asunto                   = strtolower($_POST["asunto"]);
$email                    = strtolower($_POST["email"]);
$telefono                 = $_POST["telefono"];
$msg                      = strtolower($_POST["msg"]);
$cantidad                 = $_POST["cantidad"];
$fecha                    = date("d/m/Y");
$codigo                   = $_POST["codigo"];
$titulo                   = $_POST["titulo"]; 
$id                       = $_POST["id"];

agregar_cotizacion($nombre,$nombre,$nombre,$email,$telefono,"none","none","none",$msg, $id_correo_vendeor);

$n_cotizacion           = ultima_ctoizacion();

$email_filtrado         = email_algorit_desicion(); 

array_push($correo_admin,$email_filtrado);
$mysqli->query("INSERT INTO productos_cotizaciones (id_cotizacion, tipo, id_producto, cantidad) VALUES('$n_cotizacion',0,'$id','$cantidad')");
$mysqli->close();

$cliente_asunto         = "neumaequipos.cl Cotización Nº ".$n_cotizacion;
ob_start();
include_once("email-cotizacion-unica.php");
$codigo                 =   $codigo;
$titulo_producto        =   $titulo;
$img                    =   $codigo;
$n_cotizacion           =   $n_cotizacion;
$nombre                 =   $nombre;
$asunto                 =   $asunto;
$email                  =   $email;
$telefono               =   $telefono;
$msg                    =   $msg;
$cantidad               =   $cantidad;
$fecha                  =   $fecha;

$correo_php             = ob_get_contents();
ob_end_clean();

$desde                 = 'MIME-Version: 1.0' . "\r\n";
$desde                 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$desde                 .= "From:"."	neumaequipos.cl <no-reply@neumaequipos.cl>";
// mail cliente
mail($email,$cliente_asunto,$correo_php,$desde);
// mail vendedor detalle
mail($correo_vendedor,$cliente_asunto,$correo_php,$desde);
//mail admin
for ($i=0; $i < count($correo_admin) ; $i++) {
 mail($correo_admin[$i],$cliente_asunto,$correo_php,$desde);
}

echo "terminar";

?>
