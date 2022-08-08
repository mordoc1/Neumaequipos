<?php

    if($_SERVER['HTTP_HOST'] == "localhost"){
        $mysql_hostname = "localhost";
        $mysql_user = "root";
        $mysql_password = "";
        $mysql_database = "neumaequipos";
        // $link = mysqli_connect("localhost", "root", "");
        // mysql_select_db("rotem",$link) OR DIE ("Error: No es posible establecer la conexión");
        // mysql_set_charset('utf8');
        $mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Error: No es posible establecer la conexión");
        $mysqli->set_charset("utf8");
    }else{
        // $link = mysqli_connect("localhost", "rote62813_taoista", "7340458Tao");
        // mysql_select_db("rote62813_roten",$link) OR DIE ("Error: No es posible establecer la conexión");
        // $mysql_hostname = "localhost";
        // $mysql_user = "rote62813_taoista";
        // $mysql_password = "7340458Tao";
        // $mysql_database = "rote62813_roten";
        $mysql_hostname = "localhost";
        $mysql_user = "cin19180_taoista";
        $mysql_password = "7340458Tao";
        $mysql_database = "cin19180_neumaequipos";
        $mysqli = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Error: No es posible establecer la conexión");
    }

?>
