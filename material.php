<?php include('template/header.php'); ?>


<!--====================== TITULO Y NAV =======================-->
<div class="container col-12 mb-1">
    <h1>Inventarios</h1>
</div>

<section class="containerNav mb-2">
    <div class="container ">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="accesorio.php">Accesorios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="material.php">Materia Prima</a>
            </li>
        </ul>
    </div>
</section>


<!--====================== TABLA LISTA ACCESORIOS========================-->

<div class="container col-12 mt-2">
    <div class="row">
        <!--====================== Buscador========================-->
        <nav class="navbar">
            <div class="container-fluid">
                <form class="d-flex" method="POST" role="Buscar">
                    <input class="form-control me-2" type="search" id="campo" name="campo" placeholder="Busca un Accesorio" aria-label="buscar">
                    <button type="submit" id="enviar" name="enviar" class="btn btn-outline-secondary" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
        <!--======================Fin Buscador========================-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover  align-center" id="tblAccesorio">
                        <thead>

                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Material</th>
                                <th scope="col">Color</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acción</th>
                            </tr>

                        </thead>



                        <!--====================== LISTA ACCESORIOS DINAMICA=========================-->



                        <div class=" col-12">
                            <tbody>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form method="post">

                                            <input type="hidden" name="idAccesorio" id="idAccesorio">
                                            <button type="submit" name="accion" value="editar" class="btn btn-small btn-primary "><i class=' bx bx-edit-alt'></i></button>
                                            <button type="submit" name="accion" value="borrar" class="btn btn-small btn-danger"><i class='bx bx-trash icon'></i></button>

                                            <!-- <input type="submit" name="accion" value="borrar" class="btn btn-small btn-danger" <i class='bx bx-trash icon'></i></button> -->

                                        </form>
                                    </td>
                                </tr>
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
                            <h3>Datos del Material</h3>
                        </div>

                        <div class="col-12">
                            <form method="POST" class="justify-content-right">
                                <div class=" form-group mb-3">
                                    <label for="idAccesorio">ID Material</label>
                                    <input type="text" name="idAccesorio" id="idAccesorio" class="form-control " disabled>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="nombreAccesorio">Nombre Material</label>
                                    <input type="text" name="nombreAccesorio" id="nombreAccesorio" class="form-control">
                                </div>

                                <div class="form-group  mb-3">
                                    <label class="form-label" for="cantidadStockA">Color</label>
                                    <input type="number" name="cantidadStockA" id="cantidadStockA" class="form-control" min="0">
                                </div>

                                <div class=" form-group mb-3">
                                    <label class="form-label" for="precioUnidadA">Cantidad</label>
                                    <input type="number" name="precioUnidadA" id="precioUnidadA" class="form-control" min="1">
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="precioUnidadA">Precio</label>
                                    <input type="number" name="precioUnidadA" id="precioUnidadA" class="form-control" min="1">
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="fechaA">Fecha</label>
                                    <input type="date" class="form-control" <input type="number" id="fechaA" name="fechaA" for='fechaA' value="2022-07-22" min="2000-01-01" max="2100-12-31"></input>
                                </div>


                                <div class="form-group text-center mt-3">
                                    <button type="submit" name="accion" value="agregarAccesorio" class="btn btn-primary">Añadir Accesorio </button>
                                    <button type="submit" name="accion" value="editarAccesorio" class="btn btn-danger">Editar Accesorio </button>
                                    <button type="submit" name="accion" value="cancelar" class="btn btn-warning">Cancelar </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>


            <?php include('template/footer.php'); ?>