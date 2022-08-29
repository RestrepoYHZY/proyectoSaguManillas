<?php include('template/header.php'); ?>


<div class="container col-12 ">
    <h1>Clientes</h1>
</div>


<!--====================== TABLA DE CLIENTES=========================-->

<div class="container col-12 mt-1">
    <div class="row">
        <nav class="navbar">
            <div class="container-fluid">
                <form class="d-flex" method="POST" role="Buscar">
                    <input class="form-control me-2" type="search" placeholder="Busca un Cliente" aria-label="buscar">
                    <button type="submit" class="btn btn-outline-secondary" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
        <!--======================Fin Buscador========================-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover  align-center">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>



                        <!--====================== Añadir lista Dinamica=========================-->


                        <div class=" col-12">
                            <tbody>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href='#' class="btn btn-small btn-primary"><i class=' bx bx-edit-alt'></i> </a>
                                    <a href="#" class="btn btn-small btn-danger "><i class='bx bx-trash icon'></i></a>

                                </td>
                                </tr>
                            </tbody>
                        </div>

                    </table>
                </div>
            </div>
        </div>

        <!--====================== Insertar=========================-->

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class=" col-12 text-center">
                            <h3>Datos del Cliente</h3>
                        </div>

                        <div class="col-12">
                            <form method="post" action="" class="justify-content-right">
                                <div class="form-group mb-2">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                                </div>

                                <div class="form-group mb-2 text-center mt-3">
                                    <button type="submit" name="accion" value="agregarAccesorio" class="btn btn-primary">Añadir Cliente </button>
                                    <button type="submit" name="accion" value="editarAccesorio" class="btn btn-danger">Editar Cliente </button>
                                    <button type="submit" name="accion" value="cancelar" class="btn btn-warning">Cancelar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('template/footer.php'); ?>