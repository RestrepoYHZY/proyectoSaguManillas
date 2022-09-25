<?php include('template/header.php'); ?>

<?php



include("./admin/config/db.php");



//listar los ventas
$sentenciaSQL = $conexion->prepare("SELECT rv.idRegistro_venta, concat(c.nombre, ' '  ,c.apellido) AS nombreCliente, a.nombreAccesorio, dv.cantidadVenta, dv.precioTotal, rv.fechaVenta
from registro_venta as rv inner join cliente as c on rv.idCliente=c.idCliente
inner join accesorio as a
inner join detalle_venta as dv on a.idAccesorio= dv.idAccesorio");
$sentenciaSQL->execute();
$listVentas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);





?>


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
                <a class="nav-link " aria-current="page" href="detalleVenta.php">Detalle de Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listVentas.php">Lista de Ventas</a>
            </li>
        </ul>
    </div>
</section>


<!--====================== TABLA LISTA ACCESORIOS========================-->

<div class="container col-12 mt-2">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover  align-center" id="tablaVenta">
                    <thead>

                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre Cliente</th>
                            <th scope="col">Nombre Accesorio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acción</th>
                        </tr>

                    </thead>



                    <!--====================== LISTA ACCESORIOS DINAMICA=========================-->



                    <div class=" col-12">
                        <tbody>
                            <?php foreach ($listVentas as $ventas) { ?>
                                <tr>
                                    <td scope="row"><?php echo $ventas['idRegistro_venta']; ?></td>
                                    <td><?php echo $ventas['nombreCliente']; ?></td>
                                    <td><?php echo $ventas['nombreAccesorio']; ?></td>
                                    <td><?php echo $ventas['cantidadVenta']; ?></td>
                                    <td>$<?php echo $ventas['precioTotal']; ?></td>
                                    <td><?php echo $ventas['fechaVenta']; ?></td>
                                    <td>
                                        <form method="post">

                                            <input type="hidden" name="idventas" id="idventas" value="<?php echo $ventas['idRegistro_venta']; ?>">
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