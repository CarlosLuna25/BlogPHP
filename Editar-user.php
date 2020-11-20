<?php require_once('includes/redireccion.php');
require_once('includes/header.php');
require_once('includes/BarraLogin.php');
require_once('includes/helpers.php');

?>
<div id="Principal">
    <h1>MIS DATOS</h1>
    <?php if (isset($_SESSION['completado'])) : ?>
        <div class="alerta alerta-exito">
            <?= $_SESSION['completado']; ?>

        </div>


    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general']; ?>

        </div>

    <?php endif; ?>

    <form action="Actualizar-user.php" method="POST">
        <p>
            <label for="nombre">Nombre</label> <br>
            <input type="text" name="nombre" id="nombre" value="<?=$_SESSION['usuario']['nombre']; ?>">
            <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'nombre') : '';   ?>
        </p>
        <p>
            <label for="apellido">Apellido</label> <br>
            <input type="text" name="apellido" id="apellido" value="<?=$_SESSION['usuario']['apellido']; ?>">
            <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'apellido') : '';  ?>
        </p>
        <p>
            <label for="Usuario">Email</label> <br>
            <input type="email" name="email" id="email" value="<?=$_SESSION['usuario']['email']; ?>">
            <?php echo isset($_SESSION['errores']) ? MostrarErrores($_SESSION['errores'], 'email') : '';  ?>
        </p>


        <input type="submit" name="submit" value="Actualizar datos">
    </form>
    <?php BorrarErrores(); ?>
</div>

<?php require_once('includes/Footer.php')  ?>