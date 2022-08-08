<?php
// echo "llegue";

// print_r($_GET);
 // error_reporting("ALL");
$nombre      = $_GET['nombreContacto'];
$mailCliente = $_GET['emailContacto'];
$telefono    = $_GET['fonoContacto'];
$asunto      = $_GET['asuntoContacto'];
$mensaje     = $_GET['mensajeContacto'];
require 'phpmailer/PHPMailerAutoload.php';

			$email 		= "imorales@neumachile.cl";
			$system_email 	= "imorales@neumaequipos.cl";
			$system_name    = "EquipoNeumaequipos";
				/*
			$message 		= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><!doctype html><html><head><meta charset='utf-8'><style type='text/css'>.body {font-family: Helvetica, sans-serif;color: #333333;text-align: center;}p {font-size: 14px;}h1 {font-size: 18pt;color: #07118a;}h2 {font-size: 8pt;font-weight: normal;}.imagen {margin: auto 0 auto 0;}#fondo {width: 600px;}</style></head>
										                    <table class='header' cellpadding='0' cellspacing='0' style='border-collapse: collapse;width: 100%; padding:20px 0;'>
										    <tr>
										        <td class='logo'><img src='https://www.ventasneumachile.cl/img/logo.png' alt='logo_neumachile2016'></td>
										    </tr>
										</table>
                    <body>
                    <div id='fondo'>
                                       <h1>Neumaequipos</h1>
                    <p>Hola $nombre</p>
                    <p style=' margin:0 0 30px; padding:0; font:14px/22px helvetica, arial, sans-serif; color:#000;'>Has recibido un mensaje de $nombre <br>
                    telefono : $telefono<br>
                    email : $mailCliente
                    con el mensaje
                    <br>
                    $mensaje
                    </p>
                    <div><img src='https://www.ventasneumachile.cl/media/banners/banner_7b6bd07707remate-diciembre.jpg' style='width:600px'></div>

                    </div>
                    </body>
                    </html> ";

									$mail = new PHPMailer;
									$mail->CharSet = "UTF-8";

									// $mail->isSMTP();
									$mail->SMTPDebug 	= 4;
									$mail->SMTPSecure 	= "ssl";

									$mail->Debugoutput 	= 'html';
									$mail->Host 		= "judas.uswebhost.com";
									//$mail->Host 		= "mail.ventasneumachile.cl";
									$mail->Port 		= 465; //Set the SMTP port number - likely to be 25, 465 or 587
									$mail->SMTPAuth 	= true;
									$mail->Username 	= "contacto@neumaequipos.cl";
									$mail->Password 	= "DkAvgj!irJv6";
									$mail->AddReplyTo   = 'imorales@neumachile.cl';
									$mailDemo = 'aolave@neumachile.cl';
									$mail->setFrom($system_email, $system_name); //quien envia
									//$mail->addAddress($email, $nombre);//original
									$mail->addAddress($mailDemo, $nombre);
									$mail->Subject 		= $asunto;
									$mail->MsgHTML($message);
									$mail->IsHTML(true);

									$mail->send();
									*/
									// envio correo al cliente
									/*
									$email = new PHPMailer;
									$email->CharSet = "UTF-8";

									// $email->isSMTP();
									$email->SMTPDebug 	= 4;
									$email->SMTPSecure 	= "ssl";

									$email->Debugoutput 	= 'html';
									$email->Host 		= "judas.uswebhost.com";
									//$email->Host 		= "mail.ventasneumachile.cl";
									$email->Port 		= 465; //Set the SMTP port number - likely to be 25, 465 or 587
									$email->SMTPAuth 	= true;
									$email->Username 	= "contacto@neumaequipos.cl";
									$email->Password 	= "DkAvgj!irJv6";
									// $email->AddReplyTo   = 'imorales@neumachile.cl';
									$email->setFrom($system_email, $system_name); //quien envia
									$email->addAddress($mailCliente, $nombre);
									$email->Subject 		= $asunto;
									$email->MsgHTML("Estimado ".$nombre ." Su Mensaje fue enviado Exitosamente, pronto nos contactaremos con usted");
									$email->IsHTML(true);

									$email->send();
									*/
									// envio correo admin
									/*
									$email = new PHPMailer;
									$email->CharSet = "UTF-8";
									// $email->isSMTP();

									$email->SMTPDebug 	= 4;
									$email->SMTPSecure 	= "ssl";
									$email->Debugoutput 	= 'html';
									$email->Host 		= "judas.uswebhost.com";

									//$email->Host 		= "mail.ventasneumachile.cl";

									$email->Port 		= 465; //Set the SMTP port number - likely to be 25, 465 or 587
									$email->SMTPAuth 	= true;
									$email->Username 	= "contacto@neumaequipos.cl";
									$email->Password 	= "DkAvgj!irJv6";

									// $email->AddReplyTo   = 'imorales@neumachile.cl';
									$mailAdmin = "aolave@neumachile.cl";
									$email->setFrom($system_email, $system_name); //quien envia
									$email->addAddress($mailAdmin, $nombre);
									$email->Subject 		= $asunto;
									$email->MsgHTML("Estimado ".$nombre ." Su Mensaje fue enviado Exitosamente, pronto nos contactaremos con usted");
									$email->IsHTML(true);
									$email->send();
									*/

									/*demo*/
									$message 		= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><!doctype html><html><head><meta charset='utf-8'><style type='text/css'>.body {font-family: Helvetica, sans-serif;color: #333333;text-align: center;}p {font-size: 14px;}h1 {font-size: 18pt;color: #07118a;}h2 {font-size: 8pt;font-weight: normal;}.imagen {margin: auto 0 auto 0;}#fondo {width: 600px;}</style></head>
																                    <table class='header' cellpadding='0' cellspacing='0' style='border-collapse: collapse;width: 100%; padding:20px 0;'>
																    <tr>
																        <td class='logo'><img src='https://www.ventasneumachile.cl/img/logo.png' alt='logo_neumachile2016'></td>
																    </tr>
																</table>
						                    <body>
						                    <div id='fondo'>
						                                       <h1>Neumaequipos</h1>
						                    <p>Nombre $nombre</p>
						                    <p style=' margin:0 0 30px; padding:0; font:14px/22px helvetica, arial, sans-serif; color:#000;'>Has recibido un mensaje de $nombre <br>
						                    telefono : $telefono<br>
						                    email : $mailCliente
						                    con el mensaje
						                    <br>
						                    $mensaje
						                    </p>
						                    <div><img src='https://www.ventasneumachile.cl/media/banners/banner_7b6bd07707remate-diciembre.jpg' style='width:600px'></div>
						                    </div>
						                    </body>
						                    </html> ";



									$msgCliente = "Estimado ".$nombre ." Su Mensaje fue enviado Exitosamente, pronto nos contactaremos con usted";

									$asunto =  utf8_encode("Nuevo correo de contacto ");
									$espacio = '';
									$cliente_asunto = "Correo de Confirmacion neumaequipos.cl";

									$desde  = 'MIME-Version: 1.0' . "\r\n";
									$desde .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
									$desde .= "From:"."	contacto@neumaequipos.cl";
									//$mailAdmin = "luis.olave.carvajal@gmail.com";
									mail($mailCliente,$cliente_asunto,$msgCliente,$desde);/*cliente*/

									$asunto =  utf8_encode("Nuevo correo de contacto ");
									$espacio = '';
									$cliente_asunto = "Correo de Confirmacion neumaequipos.cl";

									$desde2  = 'MIME-Version: 1.0' . "\r\n";
									$desde2 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
									$desde2.= "From:"."	contacto@neumachile.cl";
									$mailAdmi2 = "contacto@neumaequipos.cl";
									mail($mailAdmi2,$cliente_asunto,$message,$desde2);/*adin 1*/

									$asunto =  utf8_encode("Nuevo correo de contacto ");
									$espacio = '';
									$cliente_asunto = "Correo de Confirmacion neumaequipos.cl";

									$desde3  = 'MIME-Version: 1.0' . "\r\n";
									$desde3 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
									$desde3.= "From:"."	contacto@neumachile.cl";
									$mailAdmi3 = "imorales@neumachile.cl";
									mail($mailAdmi3,$cliente_asunto,$message,$desde3);/*adin 1*/
									// MOSTRAR PAGINA QUE ENVIO EL CORREO



//-------------------------

header("Location: ../../contacto.php?ok=ok");

 ?>
