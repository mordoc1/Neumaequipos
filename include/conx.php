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
        $mysql_database = "neum68927_neumaequipos";
        $mysql_hostname = "localhost";
        $mysql_user = "neum68927_taoista";
        $mysql_password = "7340458Tao";
        $mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Error: No es posible establecer la conexión");
        $mysqli->set_charset("utf8");
    }
?>
