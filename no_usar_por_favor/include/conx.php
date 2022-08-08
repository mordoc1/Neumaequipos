<?php
// conexxion php

        $mysql_database = "neumaequipos_antiguo";
        $mysql_hostname = "localhost";
        $mysql_user = "root";
        $mysql_password = "";
        $mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Error: No es posible establecer la conexión");
        $mysqli->set_charset("utf8");




?> 