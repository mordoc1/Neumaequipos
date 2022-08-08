<?php

include_once("../include/conx.php");
include_once("../funciones/funciones.php");

$correo = strtolower(str_replace(' ','',base64_decode($_POST["email"])));

$correo_contacto = get_correo_contacto();

$resultado = "";

$dato = "";


$re = $mysqli->query("SELECT email FROM newslatter WHERE email = '$correo' ") or die(mysql_error());
    while($f = $re->fetch_object()){
        $dato = $f->email;
}

if($dato == ""){
    $resultado = "no existe";
    $mysqli->query("INSERT INTO newslatter (email) VALUES('$correo')");

    //
    $cliente_asunto         = "neumaequipos.cl newslatter";
    

    $correo_php             = $correo_contacto;

    $desde                 = 'MIME-Version: 1.0' . "\r\n";
    $desde                 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $desde                 .= "From:"."	neumaequipos.cl <no-reply@neumaequipos.cl>";
    // mail cliente
    mail($correo_contacto,$cliente_asunto,$correo_php,$desde);
    

    //
}else{
    $resultado = "si encontrado";
}

$mysqli->close;
echo $resultado;

?>