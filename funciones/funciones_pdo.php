<?php

// function get_data_pack(){
//   include("../../../include/conx_pdo.php");

//   $data = array();

//   $sql = "SELECT id, codigo, desciprion, p_venta, oferta ,p_oferta, img FROM packs WHERE estado = 1";

//   $result = $base->prepare($sql);
//   $result->execute();

//   while($f = $result->fetch(PDO::FETCH_OBJ)){
//     array_push($data, array("id" => $f->id, "codigo" => $f->codigo, "desciprion" => $f->desciprion, "p_venta" => $f->p_vemta, "oferta" => $f->p_venta, "p_venta" => $f->p_venta, "img" => $f->img));
//   }

//   $base = null;
//   $result->closeCursor(); 
// }

function get_email_usaurrio(){
    include("../include/conx_pdo.php");

    $cantidad = array();

    $sql = "SELECT email FROM email_diferido";

    $result = $base->prepare($sql);
    $result->execute();

    while($f = $result->fetch(PDO::FETCH_OBJ)){
      array_push($cantidad,$f->email);
    }

    $data = "";
    $cont = 1;

    $sql = "SELECT cont, email FROM email_diferido WHERE estado = 1 LIMIT 1";

    $result = $base->prepare($sql);
    $result->execute();

    while($f = $result->fetch(PDO::FETCH_OBJ)){
        $cont = $f->cont;
        $data = $f->email;
    }

    $cont_select = $cont;

    $sql = "UPDATE email_diferido SET estado = 0";
    $stmt= $base->prepare($sql);
    $stmt->execute();
                // 2          1
    if(count($cantidad)  > $cont){
      // resetear a 1
      $update = $cont + 1;
      $sql = "UPDATE email_diferido SET estado = 1 WHERE cont = '$update'";
      $stmt= $base->prepare($sql);
      $stmt->execute();
    }else{
      // se suma 1
      $sql = "UPDATE email_diferido SET estado = 1 WHERE cont = 1";
      $stmt= $base->prepare($sql);
      $stmt->execute();
    }
    // 3 -> 0, 1, 2
    $base = null;
    $result->closeCursor();

    return array($data,$cont_select);
}

 ?>
