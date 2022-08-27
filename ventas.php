<?php include('template/header.php'); ?>


<div class="container col-12 mb-1">
    <h1>Registro de Ventas</h1>
</div>

<section class="containerNav">
    <div class="container col-12 mt-2">
        <ul class="nav nav-tabs font-weight-bold">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ventas.php">Nueva Venta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listVentas.php">Listado de ventas</a>
            </li>
        </ul>
    </div>
</section>

<div class="contenedorAll col-12 mt-2 ml-5">
    <!--===================Datos Cliente============================-->
    <div class="contenedorDatos mt-4 pl-6">
        <div class="row">
            <div class="col-4">

                <div class="contenedorCliente ">
                    <div class=" card" style="width: 38rem;">
                        <div class="card-body">
                            <h5 class="card-title">CLIENTE <a href='clientes' <i class='bx bx-message-square-add icon' title="Nuevo Cliente"></i>
                                </a></h5>

                            <form>
                                <div class="row mb-3">
                                    <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option selected>Cliente 1</option>
                                            <option value="1">Cliente 2</option>
                                            <option value="2">Cliente 3</option>
                                            <option value="3">Cliente 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputtel" class="col-sm-2 col-form-label ">Telefono</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputtel">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputtext" class="col-sm-2 col-form-label ">Dirección</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputcc">
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>


                </div>
                <!--===================Datos Producto============================-->
                <div class="contenedorProducto mt-4 ">

                    <div class="card" style="width: 38rem;">
                        <div class="card-body">
                            <h5 class="card-title">PRODUCTO</h5>
                            <form>
                                <div class="row mb-3">
                                    <label for="inputCategoria" class="col-sm-2 col-form-label">Categoria</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Hilo</option>
                                            <option>Cadena</option>
                                            <option>Dijes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputtext" class="col-sm-2 col-form-label ">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputcc">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputCantidad" class="col-sm-2 col-form-label ">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input type="Number" class="form-number" id="inputCantidad" min="1" max="100">
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>

                </div>



            </div>



            <!--================Vista previa=================-->
            <div class="contenedorResumen col-5 ml-5 pl-5 ">
                <div class="row ml-6 ">
                    <div class="col-md-4 ml-5 ">
                        <div class=" card" style="width: 40rem;">
                            <div class="card-body">
                                <h5 class="card-title">Datos de la Venta</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Numero de la venta</td>
                                            <td>aaa1</td>
                                        </tr>

                                        <tr>
                                            <td>Fecha</td>
                                            <td>09/07/2022</td>
                                        </tr>

                                        <tr class="espacio">
                                            <td>Nombre cliente</td>
                                            <td>El nombre del cliente</td>
                                        </tr>

                                        <tr>
                                            <td>Telefono</td>
                                            <td>323 .....</td>
                                        </tr>

                                        <tr>
                                            <td>Dirección</td>
                                            <td>carrera...</td>
                                        </tr>

                                        <tr class="espacio">
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="espacio">
                                            <td>Producto</td>
                                            <td>Manilla Lunar</td>
                                        </tr>


                                        <tr class="espacio">
                                            <td>Cantidad</td>
                                            <td>1</td>
                                        </tr>

                                        <tr>
                                            <td>Precio Unidad</td>
                                            <td>$10.000</td>
                                        </tr>

                                        <tr>
                                            <td>Monto Total</td>
                                            <td>$10.000</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <a href="listVentas" class="btn btn-primary">Registrar Venta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('template/footer.php'); ?>