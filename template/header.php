<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:login.php');
} else {
    if ($_SESSION['usuario'] == 'ok') {
        $nombreUsuario = $_SESSION['nombreUsuario'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Sagu Manillas</title>
    <link rel="icon" type="image/x-icon" href="./image/logoSagu.png">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>

    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <a class="navbar-brand nav-link  " href="#">
                    <img src="./image/logoSagu.png" alt="logoSagu" width="38" height="38" class="d-inline-block align-text-center">
                    Sagu Manillas
                </a>
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 " aria-current="page" href="ventas.php">Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="accesorio.php">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="cerrar.php">Cerrar</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container mt-3">
        <div class="row">