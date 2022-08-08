<?php
session_start();
include("../funciones/funciones.php");
include("../funciones/funciones_pdo.php");

$dato_admin = get_correo_admin(); 
$correo_admin = explode(",", $dato_admin);
// $email_diferido = email_algorit_desicion();

$return_data= get_email_usaurrio();

$correo_vendedor = $return_data[0];
$id_correo_vendeor = $return_data[1];

$uno = !isset($_SESSION["carrito_pack"]) ? 0: count($_SESSION["carrito_pack"]);

$dos = !isset($_SESSION["carrito_item"]) ? 0: count($_SESSION["carrito_item"]);

$resultado = $uno + $dos;
 
$retorno = false;

$nombre                   = strtolower($_POST["nombre"]);
$apellido                 = strtolower($_POST["apellido"]);
$empresa                  = strtolower($_POST["empresa"]);
$rut                      = $_POST["rut"];
$region                   = $_POST["region"];
$ciudad                   = $_POST["ciudad"];
$direccion                = strtolower($_POST["direccion"]); 
$telefono                 = $_POST["telefono"];
$email                    = strtolower($_POST["email"]);
$nota                     = strtolower($_POST["nota"]);
$fecha                    = date("d/m/Y");

if($resultado > 0){

  $nombre_region          = selection_regiones($region); 

  agregar_cotizacion($empresa,$nombre,$apellido,$email,$telefono,$region,$ciudad,$direccion,$nota,$id_correo_vendeor);
 
  $n_cotizacion           = ultima_ctoizacion();
  // $n_cotizacion           = 69;

  agregar_productos_cotizados($n_cotizacion);

  $cliente_asunto         = "neumaequipos.cl Cotización Nº ".$n_cotizacion;
   ob_start();
   include_once("email-cliente.php");
   $n_cotizacion          =   $n_cotizacion;
   $nombre                =   $nombre;
   $apellido              =   $apellido;
   $empresa               =   $empresa;
   $rut                   =   $rut;
   $nombre_region         =   $nombre_region;
   $ciudad                =   $ciudad;
   $direccion             =   $direccion;
   $telefono              =   $telefono;
   $email                 =   $email;
   $nota                  =   $nota;
   $fecha                 =   $fecha;

   $correo_php             = ob_get_contents();
   ob_end_clean();

   $desde                 = 'MIME-Version: 1.0' . "\r\n";
   $desde                 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
   $desde                 .= "From:"."	neumaequipos.cl <no-reply@neumaequipos.cl>";
   // mail cliente
   mail($email,$cliente_asunto,$correo_php,$desde);
   // mail admin
   for ($i=0; $i < count($correo_admin) ; $i++) {
    mail($correo_admin[$i],$cliente_asunto,$correo_php,$desde);
  }
  mail($correo_vendedor,$cliente_asunto,$correo_php,$desde);
 

  $retorno = $n_cotizacion;
}else{
  $retorno = False;
}

eliminar_sesion();

echo $retorno;


 ?>
