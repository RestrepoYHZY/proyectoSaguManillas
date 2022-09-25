<?php

if (isset($_POST['idTodo'])) {
    include("../admin/config/db.php");

    $idTodo = $_POST['idTodo'];

    if (empty($idTodo)) {
        echo 0;
    } else {
        $stmt = $conexion->prepare("DELETE FROM todo_list WHERE idTodo = ?");
        $res = $stmt->execute([$idTodo]);

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
        $conexion = null;
        exit();
    }
} else {
    header('location: ../indexTodo.php?mess=error');
}
