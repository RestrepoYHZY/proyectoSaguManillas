<?php

if (isset($_POST['idTodo'])) {
    include("../admin/config/db.php");

    $idTodo = $_POST['idTodo'];

    if (empty($idTodo)) {
        echo 'error';
    } else {
        $todos = $conexion->prepare("SELECT idTodo, checked FROM todo_list WHERE idTodo = ?");
        $todos->execute([$idTodo]);

        $todo = $todos->fetch();
        $uId = $todo['idTodo'];
        $checked = $todo['checked'];

        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE todo_list SET checked=$uChecked WHERE idTodo=$uId");

        if ($res) {
            echo $checked;
        } else {
            echo "error";
        }

        $conexion = null;
        exit();
    }
} else {
    header('location: ../indexTodo.php?mess=error');
}
