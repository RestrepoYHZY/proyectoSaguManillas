<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "sara" || "sarita") && ($_POST['contraseña'] == "saguManillas" || 1111)) {
        $_SESSION['usuario'] = "ok";
        $_SESSION['nombreUsuario'] = "sara";
        header('location: inicio.php');
    } else {
        $mensaje = "Error: El usuario o contraseña son incorrectos";
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
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <a class="navbar-brand nav-link  " href="login.php">
                    <img src="./image/logoSagu.png" alt="logoSagu" width="35" height="35" class="d-inline-block align-text-center">
                    Sagu Manillas
                </a>
            </ul>
        </div>
    </nav>



    <div class="container mt-3">
        <div class="row">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <br /><br /><br /><br />


                        <div class="card">
                            <div class="card-header bg-secondary text-center">
                                <h3>Inicio de Sesión</h3>
                            </div>
                            <div class="card-body">
                                <?php if (isset($mensaje)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $mensaje; ?>
                                    </div>
                                <?php } ?>
                                <form method="POST">
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1">Usuario </label>
                                        <input type="text" class="form-control" name="usuario" placeholder="Escribe tu usuario">

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="exampleInputPassword1">Contraseña</label>
                                        <input type="password" class="form-control" name="contraseña" placeholder="Escribe tu constraseña">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>