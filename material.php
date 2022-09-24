<?php include('template/header.php'); ?>

<?php
$idMateria_prima = (isset($_POST['idMateria_prima'])) ? $_POST['idMateria_prima'] : "";
$nombreMaterial = (isset($_POST['nombreMaterial'])) ? $_POST['nombreMaterial'] : "";
$color = (isset($_POST['color'])) ? $_POST['color'] : "";
$cantidadStockM = (isset($_POST['cantidadStockM'])) ? $_POST['cantidadStockM'] : "";
$precioUnidadM = (isset($_POST['precioUnidadM'])) ? $_POST['precioUnidadM'] : "";
$fechaM = (isset($_POST['fechaM'])) ? $_POST['fechaM'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


include("./admin/config/db.php");

switch ($accion) {

    case "AgregarMaterial":

        $sentenciaSQL = $conexion->prepare("INSERT INTO materia_prima ( nombreMaterial, color,cantidadStockM, precioUnidadM, fechaM) VALUES (:nombreMaterial,:color,:cantidadStockM, :precioUnidadM, :fechaM);");
        $sentenciaSQL->bindParam(':nombreMaterial', $nombreMaterial);
        $sentenciaSQL->bindParam(':color', $color);
        $sentenciaSQL->bindParam(':cantidadStockM', $cantidadStockM);
        $sentenciaSQL->bindParam(':precioUnidadM', $precioUnidadM);
        $sentenciaSQL->bindParam(':fechaM', $fechaM);
        $sentenciaSQL->execute();

        // echo "Boton agregar Presionado";
        header("Location:material.php");
        break;

    case "ModificarMaterial":

        $sentenciaSQL = $conexion->prepare("UPDATE  materia_prima  SET nombreMaterial=:nombreMaterial, color=:color, cantidadStockM=:cantidadStockM,  precioUnidadM=:precioUnidadM, fechaM=:fechaM WHERE idMateria_prima=:idMateria_prima");
        $sentenciaSQL->bindParam(':nombreMaterial', $nombreMaterial);
        $sentenciaSQL->bindParam(':color', $color);
        $sentenciaSQL->bindParam(':cantidadStockM', $cantidadStockM);
        $sentenciaSQL->bindParam(':precioUnidadM', $precioUnidadM);
        $sentenciaSQL->bindParam(':fechaM', $fechaM);
        $sentenciaSQL->bindParam(':idMateria_prima', $idMateria_prima);
        $query_execute = $sentenciaSQL->execute();

        if ($query_execute) {
            echo "success";
        } else {
            echo "error";
        }



        echo "Boton Modificar Presionado";
        // header("Location:material.php");
        break;


    case "editar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM materia_prima WHERE idMateria_prima=:idMateria_prima ");
        $sentenciaSQL->bindParam(':idMateria_prima', $idMateria_prima);
        $sentenciaSQL->execute();
        $materia = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $nombreMaterial = $materia['nombreMaterial'];
        $color = $materia['color'];
        $precioUnidadM = $materia['precioUnidadM'];
        $cantidadStockM = $materia['cantidadStockM'];
        $fechaM = $materia['fechaM'];


        //echo "Boton editar Presionado";
        break;



    case "borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM materia_prima WHERE idMateria_prima=:idMateria_prima");
        $sentenciaSQL->bindParam(':idMateria_prima', $idMateria_prima);
        $sentenciaSQL->execute();
        // echo "Boton borrar Presionado";
        header("Location:material.php");
        break;

    case "CancelarMaterial":
        header("Location:material.php");
        //echo "Boton Cancelar Presionado";
        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM materia_prima");
$sentenciaSQL->execute();
$listaMaterial = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>

<!--====================== Alerta de eliminar =======================-->
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estás seguro que deseas eliminar el accesorio?");

        if (respuesta === true) {
            return true;
        } else {
            return false;
        }
    }
</script>


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

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover  align-center" id="tablaMaterial">
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
                                <?php foreach ($listaMaterial as $material) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $material['idMateria_prima']; ?></td>
                                        <td><?php echo $material['nombreMaterial']; ?></td>
                                        <td><?php echo $material['color']; ?></td>
                                        <td><?php echo $material['cantidadStockM']; ?></td>
                                        <td>$<?php echo $material['precioUnidadM']; ?></td>
                                        <td><?php echo $material['fechaM']; ?></td>
                                        <td>
                                            <form method="post">

                                                <input type="hidden" name="idMateria_prima" id="idMateria_prima" value="<?php echo $material['idMateria_prima']; ?>">

                                                <button type="submit" name="accion" value="editar" class="btn btn-small btn-primary "><i class=' bx bx-edit-alt'></i></button>

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
                            <h3>Datos del Material</h3>
                        </div>

                        <div class="col-12">
                            <form method="POST" class="justify-content-right">
                                <div class=" form-group mb-3">
                                    <label for="idMateria_prima">ID Material</label>
                                    <input type="text" value="<?php echo $idMateria_prima ?>" name="idMateria_prima" id="idMateria_prima" class="form-control " disabled>
                                </div>

                                <div class=" form-group mb-3">
                                    <label for="nombreMaterial">Nombre Material</label>
                                    <input type="text" value="<?php echo $nombreMaterial ?>" name="nombreMaterial" id="nombreMaterial" class="form-control" required>
                                </div>

                                <div class="form-group  mb-3">
                                    <label class="form-label" for="color">Color</label>
                                    <input type="text" value="<?php echo $color ?>" name="color" id="color" class="form-control" min="0" required>
                                </div>

                                <div class=" form-group mb-3">
                                    <label class="form-label" for="cantidadStockM">Cantidad</label>
                                    <input type="number" value="<?php echo $cantidadStockM ?>" name="cantidadStockM" id="cantidadStockM" class="form-control" min="1" required>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="precioUnidadM">Precio</label>
                                    <input type="number" value="<?php echo $precioUnidadM; ?>" name="precioUnidadM" id="precioUnidadM" class="form-control" min="1" required>
                                </div>
                                <div class=" form-group mb-3">
                                    <label class="form-label" for="fechaM">Fecha</label>
                                    <input type="date" class="form-control" type="number" value="<?php echo $fechaM; ?>" id="fechaM" name="fechaM" for='fechaM' required></input>
                                </div>



                                <div class="form-group text-center mt-3">
                                    <button type="submit" name="accion" <?php echo ($accion == "editar") ? 'disabled' : ''; ?> value="AgregarMaterial" class="btn btn-primary">Añadir Material </button>

                                    <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="ModificarMaterial" class="btn btn-danger">Editar Material </button>

                                    <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="CancelarMaterial" class="btn btn-warning">Cancelar </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <script>
                var tabla = document.querySelector('#tablaMaterial');
                var dataTable = new DataTable(tablaMaterial, {
                    perPage: 7,
                    perPageSelect: [7, 14, 21, 28],

                    labels: {
                        placeholder: "Buscar Material",
                        perPage: "{select} ",
                        noRows: "Material no Encontrado",
                        info: "Mostrando registros del {start} al {end} de {rows} Registros",
                    }
                });
            </script>

            <?php include('template/footer.php'); ?>