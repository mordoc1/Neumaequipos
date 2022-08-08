<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    $mysql_hostname = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "ventasneumachile";
}else{
    $mysql_database = "neum68927_neumaequipos";
    $mysql_hostname = "localhost";
    $mysql_user = "neum68927_taoista";
    $mysql_password = "7340458Tao";

}

$base = new PDO('mysql:host='.$mysql_hostname.'; dbname='.$mysql_database, $mysql_user, $mysql_password);
$base->exec("SET CHARACTER SET utf8");

?>