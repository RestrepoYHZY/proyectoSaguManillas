<?php

if (isset($_POST['titulo'])) {
    include("../admin/config/db.php");

    $titulo = $_POST['titulo'];

    if (empty($titulo)) {
        header('location: ../indexTodo.php?mess=error');
    } else {
        $stmt = $conexion->prepare("INSERT INTO todo_list (titulo) VALUE (?)");
        $res = $stmt->execute([$titulo]);

        if ($res) {
            header('location: ../indexTodo.php?mess=success');
        } else {
            header('location: ../indexTodo.php');
        }
        $conexion = null;
        exit();
    }
} else {
    header('location: ../indexTodo.php?mess=error');
}
