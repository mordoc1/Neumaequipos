<?php
echo "Mostrar Correos diferidos"."<br>";

// include("include/conx.php");
// $email_array = "";
//
// $index = "0";
//
// $re = $mysqli->query("SELECT * FROM configuracion WHERE tipo = 'diferido_mail' ") or die($mysqli->error());
//     while($f = $re->fetch_object()){
//       $email_array = $f->dato;
// }
//
// $re = $mysqli->query("SELECT * FROM configuracion WHERE tipo = 'cant_diferido' ") or die($mysqli->error());
//     while($f = $re->fetch_object()){
//       $index = intval($f->dato);
// }
//
//
//
// $emals = explode(",", $email_array);
//
// $limite = count($emals);



$email_retorno = "";
// 2          0
// if($limite > $index ){
//   $email_retorno = $emals[$index]."<br>";
//   $dato = strval($index+1);
//   $mysqli->query("UPDATE configuracion SET dato = '$dato' WHERE tipo = 'cant_diferido' ");
// }elseif ($limite == $index) {
//   $email_retorno = $emals[0];
//   $dato = strval(1);
//   $mysqli->query("UPDATE configuracion SET dato = '$dato' WHERE tipo = 'cant_diferido' ");
// }

// $mysqli->close();
// echo $email_retorno;





function email_algorit_desicion(){
  include("include/conx.php");
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
    $email_retorno = $emals[$index]."<br>";
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

$email_demo = email_algorit_desicion();

echo $email_demo."<br>";


 ?>
