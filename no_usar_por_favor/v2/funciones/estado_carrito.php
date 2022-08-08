<?php
session_start();

$resultado = 0;

// isset($_SESSION["carrito_pack"]) OR isset($_SESSION["carrito"]) ? $resultado = 0 : $resultado = 1;

$uno = !isset($_SESSION["carrito_pack"]) ? 0: count($_SESSION["carrito_pack"]);

$dos = !isset($_SESSION["carrito_item"]) ? 0: count($_SESSION["carrito_item"]);

$resultado = $uno + $dos;

echo $resultado;


?>