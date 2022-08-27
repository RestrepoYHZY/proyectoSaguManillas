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

<div class="col-12 mt-1">
    <section class=" containerList">
        <div class="container">
            <!--====================== Buscador========================-->
            <nav class="navbar">
                <div class="container-fluid">
                    <form class="d-flex" method="POST" role="Buscar">
                        <input class="form-control me-2" type="search" placeholder="Busca un Venta" aria-label="buscar">
                        <button type="submit" class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
            <!--======================Fin Buscador========================-->
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-1 stat ">
                            <h4>Cod</h4>
                        </div>
                        <div class="col-lg-2 stat">
                            <h4>Cliente</h4>
                        </div>
                        <div class="col-lg-2 stat ">
                            <h4>Producto</h4>
                        </div>
                        <div class="col-lg-2 stat ">
                            <h4>Cantidad</h4>
                        </div>
                        <div class="col-lg-2 stat ">
                            <h4>Fecha</h4>
                        </div>
                        <div class="col-lg-1 stat ">
                            <h4>Total</h4>
                        </div>
                        <div class="col-lg-2">
                            <h4>Acción</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="containerPeople mt-2">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-1  ">
                            <h5></h5>
                        </div>
                        <div class="col-lg-2  ">
                            <h5></h5>
                        </div>
                        <div class="col-lg-2 ">
                            <h5></h5>
                        </div>
                        <div class="col-lg-2 ">
                            <h5></h5>
                        </div>
                        <div class="col-lg-2 ">
                            <h5></h5>
                        </div>
                        <div class="col-lg-1 ">
                            <h5>"canti*pre"</h5>
                        </div>
                        <div class="col-lg-2">
                            <a href="#" class=" btn btn-small btn-danger" onclick="return eliminarVenta()"><i class='bx bx-trash icon'></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>

<?php include('template/footer.php'); ?>