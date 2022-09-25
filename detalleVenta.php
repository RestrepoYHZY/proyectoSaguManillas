<?php include('template/header.php'); ?>

<?php


// print_r($_POST);

$idDetalle_venta = (isset($_POST["idDetalle_venta"])) ? $_POST["idDetalle_venta"] : "";
$cantidadVenta = (isset($_POST["cantidadVenta"])) ? $_POST["cantidadVenta"] : "";
$idAccesorio = (isset($_POST["idAccesorio"])) ? $_POST["idAccesorio"] : "";
$idRegistro_venta = (isset($_POST["idRegistro_venta"])) ? $_POST["idRegistro_venta"] : "";
$precioTotal = (isset($_POST["precioTotal"])) ? $_POST["precioTotal"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";

include("./admin/config/db.php");



switch ($accion) {

    case "agregarVenta":
        $sentenciaSQL = $conexion->prepare("INSERT INTO detalle_venta (cantidadVenta, idRegistro_venta, idAccesorio, precioTotal)
        values (:cantidadVenta,:idAccesorio,:idRegistro_venta,:precioTotal);");
        $sentenciaSQL->bindParam(':cantidadVenta', $cantidadVenta);
        $sentenciaSQL->bindParam(':idAccesorio', $idAccesorio);
        $sentenciaSQL->bindParam(':idRegistro_venta', $idRegistro_venta);
        $sentenciaSQL->bindParam(':precioTotal', $precioTotal);
        $sentenciaSQL->execute();

        header("Location:detalleVenta.php");
        //echo "Presiono agregarAccesorio";
        break;

    case "editarVenta":
        $sentenciaSQL = $conexion->prepare("UPDATE  detalle_venta  SET cantidadVenta=:cantidadVenta, idAccesorio=:idAccesorio, idRegistro_venta=:idRegistro_venta, precioTotal=:precioTotal WHERE idDetalle_venta=:idDetalle_venta");
        $sentenciaSQL->bindParam(':idDetallea_venta', $idDetallea_venta);
        $sentenciaSQL->bindParam(':cantidadVenta', $cantidadVenta);
        $sentenciaSQL->bindParam(':idRegistro_venta', $idRegistro_venta);
        $sentenciaSQL->bindParam(':idAccesorio', $idAccesorio);
        $sentenciaSQL->bindParam(':precioTotal', $precioTotal);
        $sentenciaSQL->execute();

        header("Location:detalleVenta.php");
        //echo "presionado editarAccesorio";

        break;

    case "editar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM detalle_venta WHERE idDetalle_venta=:idDetalle_venta");
        $sentenciaSQL->bindParam(':idDetalle_venta', $idDetalle_venta);
        $sentenciaSQL->execute();
        $Detalleventa = $sentenciaSQL->fetch(PDO::FETCH_LAZY);


        $idDetallea_venta = $venta['idDetalle_venta'];
        $idAccesorio = $venta['idAccesorio'];
        $cantidadVenta = $venta['cantidadVenta'];
        $precioTotal = $venta['precioTotal'];
        $idRegistro_venta = $venta['idRegistro_venta'];

        // echo "presionado editar";
        break;

    case "borrar":

        $sentenciaSQL = $conexion->prepare("DELETE FROM registro_venta WHERE idRegistro_venta=:idRegistro_venta");
        $sentenciaSQL->bindParam(':idRegistro_venta', $idRegistro_venta);
        $sentenciaSQL->execute();



        header("Location:detalleVenta.php");

        // echo "presionado borrar";

        break;


    case "cancelar":
        header("Location:detalleVenta.php");
        // echo "presionado cancelar";
        break;
}
//listar los ventas
$sentenciaSQL = $conexion->prepare("SELECT * FROM detalle_venta");
$sentenciaSQL->execute();
$listDetalleVenta = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

//Buscar concidencias



?>
<!--====================== Alerta de eliminar =======================-->
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estás seguro que deseas eliminar detalle de venta?");

        if (respuesta === true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<!--====================== TITULO Y NAV =======================-->
<div class="container col-12 mb-1">
    <h1>Registro de Ventas</h1>
</div>

<section class="containerNav mb-2">
    <div class="container ">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="ventas.php">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="detalleVenta.php">Detalle de Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="listVentas.php">Lista de Ventas</a>
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
                    <table class="table table-hover  align-center" id="tablaVenta">
                        <thead>

                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">ID Registro Venta</th>
                                <th scope="col">ID Accesorio</th>
                                <th scope="col">Cantidad Venta</th>
                                <th scope="col">Precio Total</th>
                                <th scope="col">Acción</th>
                            </tr>

                        </thead>



                        <!--====================== LISTA ACCESORIOS DINAMICA=========================-->



                        <div class=" col-12">
                            <tbody>
                                <?php foreach ($listDetalleVenta as $detalleVenta) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $detalleVenta['idDetalle_venta']; ?></td>
                                        <td><?php echo $detalleVenta['idRegistro_venta']; ?></td>
                                        <td><?php echo $detalleVenta['idAccesorio']; ?></td>
                                        <td><?php echo $detalleVenta['cantidadVenta']; ?></td>
                                        <td><?php echo $detalleVenta['precioTotal']; ?></td>

                                        <td>
                                            <form method="post">

                                                <input type="hidden" name="idDetalle_venta" id="idDetalle_venta" value="<?php echo $detalleVenta['idDetalle_venta']; ?>">
                                                <button type="submit" name="accion" value="editar" class="btn btn-small btn-primary mb-1"><i class=' bx bx-edit-alt'></i></button>
                                                <button type="submit" onclick="return ConfirmDelete()" name="accion" value="borrar" class="btn btn-small btn-danger"><i class='bx bx-trash icon'></i></button>

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
                            <h3>Datos del Detalle de Venta</h3>
                        </div>

                        <div class="col-12">
                            <form method="POST" enctype="multipart/form-data" class="justify-content-right">
                                <div class=" form-group mb-3">
                                    <label for="idDetalle_venta">ID Detalle Venta</label>
                                    <input type="text" value="<?php echo $idDetalle_venta; ?>" name="idDetalle_venta" id="idDetalle_venta" class="form-control " disabled>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="idRegistro_venta">ID Registro Venta</label>
                                    <input type="text" value="<?php echo $idRegistro_venta; ?>" name="idRegistro_venta" id="idRegistro_venta" class="form-control" required>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="idAccesorio">ID Accesorio</label>
                                    <input type="text" value="<?php echo $idAccesorio; ?>" name="idAccesorio" id="idAccesorio" class="form-control" required>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="cantidadVenta">Cantidad Venta</label>
                                    <input type="text" value="<?php echo $cantidadVenta; ?>" name="cantidadVenta" id="cantidadVenta" class="form-control" required>
                                </div>
                                <div class=" form-group mb-3">
                                    <label for="precioTotal">Precio Total</label>
                                    <input type="text" value="<?php echo $precioTotal; ?>" name="precioTotal" id="precioTotal" class="form-control" required>
                                </div>




                                <div class="form-group text-center mt-3">
                                    <button type="submit" name="accion" <?php echo ($accion == "editar") ? 'disabled' : ''; ?> value="agregarVenta" class="btn btn-primary">Añadir Venta </button>

                                    <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="editarVenta" class="btn btn-danger">Editar Venta </button>

                                    <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="cancelar" class="btn btn-warning">Cancelar </button>


                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <script>
                var tabla = document.querySelector('#tablaVenta');
                var dataTable = new DataTable(tablaVenta, {
                    perPage: 5,
                    perPageSelect: [5, 10, 15, 20],

                    labels: {
                        placeholder: "Buscar Venta",
                        perPage: "{select} ",
                        noRows: "Venta NO encontrada",
                        info: "Mostrando Registros del {start} al {end} de {rows} Registros",
                    }
                });
            </script>


            <?php include('template/footer.php'); ?>