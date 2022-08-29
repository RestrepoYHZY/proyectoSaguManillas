<?php include('template/header.php'); ?>



<?php
// print_r($_POST);

$idAccesorio = (isset($_POST["idAccesorio"])) ? $_POST["idAccesorio"] : "";
$nombreAccesorio = (isset($_POST["nombreAccesorio"])) ? $_POST["nombreAccesorio"] : "";
$cantidadStockA = (isset($_POST["cantidadStockA"])) ? $_POST["cantidadStockA"] : "";
$fechaA = (isset($_POST["fechaA"])) ? $_POST["fechaA"] : "";
$precioUnidadA = (isset($_POST["precioUnidadA"])) ? $_POST["precioUnidadA"] : "";
$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";

include("./admin/config/db.php");





switch ($accion) {

    case "agregarAccesorio":
        $sentenciaSQL = $conexion->prepare("INSERT INTO accesorio ( nombreAccesorio, cantidadStockA,precioUnidadA, fechaA) VALUES (:nombreAccesorio,:cantidadStockA, :precioUnidadA, :fechaA);");
        $sentenciaSQL->bindParam(':nombreAccesorio', $nombreAccesorio);
        $sentenciaSQL->bindParam(':cantidadStockA', $cantidadStockA);
        $sentenciaSQL->bindParam(':precioUnidadA', $precioUnidadA);
        $sentenciaSQL->bindParam(':fechaA', $fechaA);

        $sentenciaSQL->execute();

        header("Location:accesorio.php");
        // echo "Presiono agregarAccesorio";
        break;

    case "editarAccesorio":
        $sentenciaSQL = $conexion->prepare("UPDATE  accesorio  SET nombreAccesorio=:nombreAccesorio, cantidadStockA=:cantidadStockA,  precioUnidadA=:precioUnidadA, fechaA=:fechaA WHERE idAccesorio=:idAccesorio");
        $sentenciaSQL->bindParam(':idAccesorio', $idAccesorio);
        $sentenciaSQL->bindParam(':nombreAccesorio', $nombreAccesorio);
        $sentenciaSQL->bindParam(':cantidadStockA', $cantidadStockA);
        $sentenciaSQL->bindParam(':precioUnidadA', $precioUnidadA);
        $sentenciaSQL->bindParam(':fechaA', $fechaA);
        $sentenciaSQL->execute();

        header("Location:accesorio.php");

        // echo "presionado editarAccesorio";


        break;

    case "editar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM accesorio WHERE idAccesorio=:idAccesorio");
        $sentenciaSQL->bindParam(':idAccesorio', $idAccesorio);
        $sentenciaSQL->execute();
        $accesorio = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $idAccesorio = $accesorio['idAccesorio'];
        $nombreAccesorio = $accesorio['nombreAccesorio'];
        $cantidadStockA = $accesorio['cantidadStockA'];
        $precioUnidadA = $accesorio['precioUnidadA'];
        $fechaA = $accesorio['fechaA'];


        // echo "presionado editar";
        break;

    case "borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM accesorio WHERE idAccesorio=:idAccesorio");
        $sentenciaSQL->bindParam(':idAccesorio', $idAccesorio);
        $sentenciaSQL->execute();

        header("Location:accesorio.php");
        // echo "presionado borrar";
        break;


    case "cancelar":
        header("Location:accesorio.php");
        // echo "presionado cancelar";
        break;
}
//listar los accesorios
$sentenciaSQL = $conexion->prepare("SELECT * FROM accesorio");
$sentenciaSQL->execute();
$listAccesorio = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

//Buscar concidencias

?>

<!--====================== TITULO Y NAV =======================-->
<div class="container col-12 mb-1">
    <h1>Inventarios</h1>
</div>

<section class="containerNav mb-2">
    <div class="container ">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="accesorio.php">Accesorios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="material.php">Materia Prima</a>
            </li>
        </ul>
    </div>
</section>


<!--====================== TABLA LISTA ACCESORIOS========================-->

<div class="container col-12 mt-2">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover  align-center" id="tablaAccesorios">
                        <thead>

                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Accesorio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acción</th>
                            </tr>

                        </thead>



                        <!--====================== LISTA ACCESORIOS DINAMICA=========================-->



                        <div class=" col-12">
                            <tbody>
                                <?php foreach ($listAccesorio as $accesorio) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $accesorio['idAccesorio']; ?></td>
                                        <td><?php echo $accesorio['nombreAccesorio']; ?></td>
                                        <td><?php echo $accesorio['cantidadStockA']; ?></td>
                                        <td><?php echo $accesorio['precioUnidadA']; ?></td>
                                        <td><?php echo $accesorio['fechaA']; ?></td>
                                        <td>
                                            <form method="post">

                                                <input type="hidden" name="idAccesorio" id="idAccesorio" value="<?php echo $accesorio['idAccesorio']; ?>">
                                                <button type="submit" name="accion" value="editar" class="btn btn-small btn-primary "><i class=' bx bx-edit-alt'></i></button>
                                                <button type="submit" name="accion" value="borrar" class="btn btn-small btn-danger"><i class='bx bx-trash icon'></i></button>

                                                <!-- <input type="submit" name="accion" value="borrar" class="btn btn-small btn-danger" <i class='bx bx-trash icon'></i></button> -->


                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>

        <!--====================== NUEVO ACCESORIO=========================-->

        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class=" col-12 text-center">
                            <h3>Datos del Accesorio</h3>
                        </div>

                        <div class="col-12">
                            <form method="POST" class="justify-content-right">
                                <div class=" form-group mb-3">
                                    <label for="idAccesorio">ID Accesorio</label>
                                    <input type="text" value="<?php echo $idAccesorio; ?>" name="idAccesorio" id="idAccesorio" class="form-control " disabled>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="nombreAccesorio">Nombre Accesorio</label>
                                    <input type="text" value="<?php echo $nombreAccesorio; ?>" name="nombreAccesorio" id="nombreAccesorio" class="form-control">
                                </div>

                                <div class="form-group  mb-3">
                                    <label class="form-label" for="cantidadStockA">cantidadStockA</label>
                                    <input type="number" value="<?php echo $cantidadStockA; ?>" name="cantidadStockA" id="cantidadStockA" class="form-control" min="0">
                                </div>

                                <div class=" form-group mb-3">
                                    <label class="form-label" for="precioUnidadA">precioUnidadA</label>
                                    <input type="number" <input type="number" value="<?php echo $precioUnidadA; ?>" name="precioUnidadA" id="precioUnidadA" class="form-control" min="1">
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="fechaA">Fecha</label>
                                    <input type="date" class="form-control" <input type="number" value="<?php echo $fechaA; ?>" id="fechaA" name="fechaA" for='fechaA' value="2022-07-22" min="2000-01-01" max="2100-12-31"></input>
                                </div>


                                <div class="form-group text-center mt-3">
                                    <button type="submit" name="accion" <?php echo ($accion == "editar") ? 'disabled' : ''; ?> value="agregarAccesorio" class="btn btn-primary">Añadir Accesorio </button>
                                    <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="editarAccesorio" class="btn btn-danger">Editar Accesorio </button>
                                    <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="cancelar" class="btn btn-warning">Cancelar </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <script>
                var tabla = document.querySelector('#tablaAccesorios');
                var dataTable = new DataTable(tablaAccesorios, {
                    perPage: 5,
                    perPageSelect: [5, 10, 15, 20],

                    labels: {
                        placeholder: "Buscar Accesorio",
                        perPage: "{select} ",
                        noRows: "Accesorio no Encontrado",
                        info: "Mostrando Registros del {start} al {end} de {rows} Registros",
                    }
                });
            </script>
            <?php include('template/footer.php'); ?>