<?php
$host = "localhost";
$dbname = "sagu_manillas";
$usuario = "root";
$password = "root";

try {
    $conexion = new PDO("mysql:host=$host; dbname=$dbname", $usuario, $password);
    if ($conexion) {
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
