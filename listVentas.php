<?php include('template/header.php'); ?>


<div class="container col-12 mb-1">
    <h1>Registro de Ventas</h1>
</div>


<section class="containerNav">
    <div class="container col-12 mt-2">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="ventas.php">Nueva Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listVentas.php">Listado de ventas</a>
            </li>
        </ul>
    </div>
</section>

<!--=======================Listar Ventas========================-->

<div class="col-12 mt-3">
    <div class="container col-12 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover  align-center" id="tablaVentas">
                            <thead>

                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Accesorio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Acción</th>
                                </tr>

                            </thead>



                            <!--====================== LISTA ACCESORIOS DINAMICA=========================-->



                            <div class=" col-12">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <form method="post">


                                                <button type="submit" name="accion" value="borrar" class="btn btn-small btn-danger"><i class='bx bx-trash icon'></i></button>



                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        var tabla = document.querySelector('#tablaVentas');
        var dataTable = new DataTable(tablaVentas, {
            perPage: 5,
            perPageSelect: [5, 10, 15, 20],

            labels: {
                placeholder: "Buscar Venta",
                perPage: "{select} ",
                noRows: "Venta no Encontrado",
                info: "Mostrando Registros del {start} al {end} de {rows} Registros",
            }
        });
    </script>

    <?php include('template/footer.php'); ?>