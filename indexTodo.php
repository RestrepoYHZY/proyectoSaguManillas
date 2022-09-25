<?php include('template/headerTodos.php'); ?>

<?php
include("./admin/config/db.php");
?>

<div class="main-section">
    <div class="add-section">
        <div class="text-center fs-3 mb-3 font">
            <h1>Lista de Pedidos</h1>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <form action="todolist/addTodo.php" method="POST" autocomplete="off">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                        <input type="text" name="titulo" style="border-color: #ff6666" placeholder="No olvides escribir tu pedido!" maxlength="500" />
                        <button type="submit" class="btn btn-primary">Añadir <i class='bx bx-message-square-add'></i> </button>
                    <?php } else { ?>
                        <input type="text" name="titulo" placeholder="Anota un pedido :)" maxlength="500" />
                        <button type="submit" class="btn btn-primary">Añadir <i class='bx bx-message-square-add'></i> </button>
                    <?php } ?>
                </form>
            </div>
        </div>

    </div>
    <?php
    $todos = $conexion->query("SELECT * FROM todo_list ORDER BY idTodo DESC");
    ?>
    <div class="card">
        <div class="card-body">
            <div class="show-todo-section">
                <?php if ($todos->rowCount() <= 0) { ?>
                    <div class="todo-item">
                        <div class="empty">
                            <img src="./image/img1.png" width="100%">
                            <img src="./image/Ellipsis.gif" width="80px">
                        </div>
                    </div>
                <?php } ?>

                <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="todo-item">
                        <span idTodo="<?php echo $todo['idTodo']; ?>" class="remove-to-do"><i class='bx bx-message-square-x'></i></span>
                        <?php if ($todo['checked']) { ?>
                            <input type="checkbox" data-todo-id=" <?php echo $todo['idTodo']; ?>" class="check-box" checked />
                            <h2 class="checked"><?php echo $todo['titulo'] ?></h2>

                        <?php } else { ?>
                            <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['idTodo']; ?>" />
                            <h2><?php echo $todo['titulo'] ?></h2>
                        <?php } ?>
                        <br />
                        <small>Creado: <?php echo $todo['fecha'] ?> </small>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div>

<script src="js/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.remove-to-do').click(function() {
            const idTodo = $(this).attr('idTodo');

            $.post("todolist/removeTodo.php", {
                idTodo: idTodo
            }, (data) => {
                if (data) {
                    $(this).parent().hide(600);
                }
            });
        });

        $(".check-box").click(function(e) {
            const idTodo = $(this).attr('data-todo-id');

            $.post("todolist/checkTodo.php", {
                idTodo: idTodo
            }, (data) => {
                if (data != 'error') {
                    const h2 = $(this).next();
                    if (data === '1') {
                        h2.removeClass('checked');
                    } else {
                        h2.addClass('checked');
                    }
                }
            });
        });

    });
</script>

<?php include('template/footer.php'); ?>