<?php include('template/header.php'); ?>

<?php


// print_r($_POST);

$idRegistro_venta = (isset($_POST["idRegistro_venta"])) ? $_POST["idRegistro_venta"] : "";
$fechaVenta = (isset($_POST["fechaVenta"])) ? $_POST["fechaVenta"] : "";
$idCliente = (isset($_POST["idCliente"])) ? $_POST["idCliente"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";

include("./admin/config/db.php");



switch ($accion) {

    case "agregarVenta":
        $sentenciaSQL = $conexion->prepare(" INSERT INTO registro_venta (fechaVenta, idCliente) values
        (:fechaVenta,:idCliente);");
        $sentenciaSQL->bindParam(':fechaVenta', $fechaVenta);
        $sentenciaSQL->bindParam(':idCliente', $idCliente);
        $sentenciaSQL->execute();

        header("Location:ventas.php");
        //echo "Presiono agregarAccesorio";
        break;

    case "editarVenta":
        $sentenciaSQL = $conexion->prepare("UPDATE  registro_venta  SET idCliente=:idCliente, fechaVenta=:fechaVenta WHERE idRegistro_venta=:idRegistro_venta");
        $sentenciaSQL->bindParam(':idCliente', $idCliente);
        $sentenciaSQL->bindParam(':fechaVenta', $fechaVenta);
        $sentenciaSQL->bindParam(':idRegistro_venta', $idRegistro_venta);
        $sentenciaSQL->execute();

        header("Location:ventas.php");
        //echo "presionado editarAccesorio";

        break;

    case "editar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM registro_venta WHERE idRegistro_venta=:idRegistro_venta");
        $sentenciaSQL->bindParam(':idRegistro_venta', $idRegistro_venta);
        $sentenciaSQL->execute();
        $venta = $sentenciaSQL->fetch(PDO::FETCH_LAZY);


        $idCliente = $venta['idCliente'];
        $fechaVenta = $venta['fechaVenta'];

        // echo "presionado editar";
        break;

    case "borrar":

        $sentenciaSQL = $conexion->prepare("DELETE FROM registro_venta WHERE idRegistro_venta=:idRegistro_venta");
        $sentenciaSQL->bindParam(':idRegistro_venta', $idRegistro_venta);
        $sentenciaSQL->execute();



        header("Location:ventas.php");

        // echo "presionado borrar";

        break;


    case "cancelar":
        header("Location:ventas.php");
        // echo "presionado cancelar";
        break;
}
//listar los ventas
$sentenciaSQL = $conexion->prepare("SELECT * FROM registro_venta");
$sentenciaSQL->execute();
$listVentas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

//Buscar concidencias



?>
<!--====================== Alerta de eliminar =======================-->
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("??Est??s seguro que deseas eliminar la venta?");

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
                <a class="nav-link active" href="ventas.php">Ventas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="detalleVenta.php">Detalle de Venta</a>
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
                                <th scope="col">ID Cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acci??n</th>
                            </tr>

                        </thead>



                        <!--====================== LISTA ACCESORIOS DINAMICA=========================-->



                        <div class=" col-12">
                            <tbody>
                                <?php foreach ($listVentas as $ventas) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $ventas['idRegistro_venta']; ?></td>
                                        <td><?php echo $ventas['idCliente']; ?></td>
                                        <td><?php echo $ventas['fechaVenta']; ?></td>
                                        <td>
                                            <form method="post">

                                                <input type="hidden" name="idRegistro_venta" id="idRegistro_venta" value="<?php echo $ventas['idRegistro_venta']; ?>">
                                                <button type="submit" name="accion" value="editar" class="btn btn-small btn-primary mb-1"><i class=' bx bx-edit-alt'></i></button>
                                                <button type="submit" onclick="return ConfirmDelete()" name="accion" value="borrar" class="btn btn-small btn-danger"><i class='bx bx-trash icon'></i></button>



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
                            <h3>Datos de la Venta</h3>
                        </div>

                        <div class="col-12">
                            <form method="POST" enctype="multipart/form-data" class="justify-content-right">
                                <div class=" form-group mb-3">
                                    <label for="idRegistro_venta">ID Ventas</label>
                                    <input type="text" value="<?php echo $idRegistro_venta; ?>" name="idRegistro_venta" id="idRegistro_venta" class="form-control " disabled>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="idCliente">ID Cliente</label>
                                    <input type="text" value="<?php echo $idCliente; ?>" name="idCliente" id="idCliente" class="form-control" required>
                                </div>

                                <div class=" form-group mb-3">
                                    <label class="form-label" for="fechaVenta">Fecha</label>
                                    <input type="date" class="form-control" type="number" value="<?php echo $fechaVenta; ?>" id="fechaVenta" name="fechaVenta" for='fechaVenta' required></input>
                                </div>


                                <div class="form-group text-center mt-3">
                                    <button type="submit" name="accion" <?php echo ($accion == "editar") ? 'disabled' : ''; ?> value="agregarVenta" class="btn btn-primary">A??adir Venta </button>

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