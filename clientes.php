<?php include('template/header.php'); ?>

<?php
// print_r($_POST);

$idCliente = (isset($_POST["idCliente"])) ? $_POST["idCliente"] : "";
$nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
$apellido = (isset($_POST["apellido"])) ? $_POST["apellido"] : "";
$telefono = (isset($_POST["telefono"])) ? $_POST["telefono"] : "";
$direccion = (isset($_POST["direccion"])) ? $_POST["direccion"] : "";
$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";

include("./admin/config/db.php");



switch ($accion) {

    case "agregarCliente":
        $sentenciaSQL = $conexion->prepare("INSERT INTO cliente ( nombre, apellido ,telefono,direccion) VALUES (:nombre,:apellido,:telefono,:direccion);");
        $sentenciaSQL->bindParam(':nombre', $nombre);
        $sentenciaSQL->bindParam(':apellido', $apellido);
        $sentenciaSQL->bindParam(':telefono', $telefono);
        $sentenciaSQL->bindParam(':direccion', $direccion);
        $sentenciaSQL->execute();

        header("Location:clientes.php");
        // echo "Presiono agregarcliente";
        break;

    case "editarCliente":
        $sentenciaSQL = $conexion->prepare("UPDATE  cliente  SET nombre=:nombre, apellido=:apellido,  telefono=:telefono, direccion=:direccion WHERE idCliente=:idCliente");
        $sentenciaSQL->bindParam(':idCliente', $idCliente);
        $sentenciaSQL->bindParam(':nombre', $nombre);
        $sentenciaSQL->bindParam(':apellido', $apellido);
        $sentenciaSQL->bindParam(':telefono', $telefono);
        $sentenciaSQL->bindParam(':direccion', $direccion);
        $sentenciaSQL->execute();

        header("Location:clientes.php");

        // echo "presionado editarcliente";


    case "editar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM cliente WHERE idCliente=:idCliente");
        $sentenciaSQL->bindParam(':idCliente', $idCliente);
        $sentenciaSQL->execute();
        $cliente = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $nombre = $cliente['nombre'];
        $apellido = $cliente['apellido'];
        $telefono = $cliente['telefono'];
        $direccion = $cliente['direccion'];


        // echo "presionado editar";
        break;





    case "borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM cliente WHERE idCliente=:idCliente");
        $sentenciaSQL->bindParam(':idCliente', $idCliente);
        $sentenciaSQL->execute();

        header("Location:clientes.php");
        // echo "presionado borrar";
        break;


    case "cancelar":
        header("Location:clientes.php");
        // echo "presionado cancelar";
        break;
}
//listar los Clientes
$sentenciaSQL = $conexion->prepare("SELECT * FROM cliente");
$sentenciaSQL->execute();
$listclientes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

//Buscar concidencias

?>
<!--====================== Alerta de eliminar =======================-->
<script type="text/javascript">
    function ConfirmDelete() {
        var respuesta = confirm("¿Estás seguro que deseas eliminar el cliente?");

        if (respuesta === true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<!--=================   TABLA DE LISTA DE CLIENTE===================-->

<div class="container col-12 mt-2">
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover  align-center" id="tablaClientes">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">nombre</th>
                                <th scope="col">apellido</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>



                        <!--====================== Añadir lista Dinamica=========================-->


                        <div class=" col-12">
                            <tbody>
                                <?php foreach ($listclientes as $cliente) { ?>
                                    <td scope="row"><?php echo $cliente['idCliente']; ?></td>
                                    <td><?php echo $cliente['nombre']; ?></td>
                                    <td><?php echo $cliente['apellido']; ?></td>
                                    <td><?php echo $cliente['telefono']; ?></td>
                                    <td><?php echo $cliente['direccion']; ?></td>
                                    <td>
                                        <form method="post">

                                            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $cliente['idCliente']; ?>">
                                            <button type="submit" name="accion" value="editar" class="btn btn-small btn-primary "><i class=' bx bx-edit-alt'></i></button>
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

        <!--====================== Insertar=========================-->

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class=" col-12 text-center">
                            <h3>Datos del Cliente</h3>
                        </div>

                        <div class="col-12">
                            <form method="POST" class="justify-content-right">
                                <div class=" form-group mb-3">
                                    <label for="idCliente">ID Cliente</label>
                                    <input type="text" value="<?php echo $idCliente; ?>" name="idCliente" id="idCliente" class="form-control " disabled>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="<?php echo $nombre; ?>" name="nombre" id="nombre" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" value="<?php echo $apellido; ?>" name="apellido" id="apellido" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" value="<?php echo $telefono; ?>" name="telefono" id="telefono" class="form-control" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" value="<?php echo $direccion; ?>" name="direccion" id="direccion" class="form-control" required>
                                </div>

                                <div class="form-group mb-2 text-center mt-3">
                                    <div class="form-group text-center mt-3">
                                        <button type="submit" name="accion" <?php echo ($accion == "editar") ? 'disabled' : ''; ?> value="agregarCliente" class="btn btn-primary">Añadir Cliente </button>

                                        <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="editarCliente" class="btn btn-danger">Editar Cliente </button>

                                        <button type="submit" name="accion" <?php echo ($accion != "editar") ? 'disabled' : ''; ?> value="cancelar" class="btn btn-warning">Cancelar </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var tabla = document.querySelector('#tablaClientes');
        var dataTable = new DataTable(tablaClientes, {
            perPage: 5,
            perPageSelect: [5, 10, 15, 20],

            labels: {
                placeholder: "Buscar Cliente",
                perPage: "{select} ",
                noRows: "Cliente no Encontrado",
                info: "Mostrando Registros del {start} al {end} de {rows} Registros",
            }
        });
    </script>

    <?php include('template/footer.php'); ?>