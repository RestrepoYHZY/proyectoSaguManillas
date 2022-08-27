<?php include('template/header.php'); ?>

<?php
if ($_POST) {
    header('Location: inicio.php');
}
?>


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

<?php include('template/footer.php'); ?>