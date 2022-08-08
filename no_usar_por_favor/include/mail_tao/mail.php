<?php
$corre_nes = $_GET["email"];
$correo1 = "imorales@neumachile.cl";
$correo = "luis.olave@ingeniopc.cl";
// Ivana Morales (imorales@neumachile.cl)
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h3">Nuevo correo newsletter</h3>';
$message .= '<p style="color:#080;font-size:18px;">'.$corre_nes.'</p>';
$message .= '</body></html>';

// coneccion para el correo
$asunto = "registro newsletter neumaequipos.cl";

$desde  = 'MIME-Version: 1.0' . "\r\n";
$desde .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$desde .= "From:"."registro newsletter no-reply@neumaequipos.cl";

// envio correo al CLIENTE
mail($correo1,$asunto,$message,$desde);
mail($correo,$asunto,$message,$desde);
echo "funciono";
 ?>
