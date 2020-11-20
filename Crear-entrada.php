<?php require_once('includes/redireccion.php');
require_once('includes/header.php');
require_once('includes/BarraLogin.php');
require_once('includes/helpers.php');

?>
<div id="Principal">
     <h1>Crear Entrada</h1>
     <p>Añade nuevas entradas al blog para que los demas usuarios puedan leerlas</p>
        <br> 
    <form action="Guardar-entrada.php" method="post">
        
        <p>
        <?php echo isset($_SESSION['errores_entrada'])? MostrarErrores($_SESSION['errores_entrada'],'titulo') : '' ;   ?>
             <label for="nombre">Titulo de la entrada</label>
            <input type="text" name="titulo">
        

        </p>
        <p>
        <?php echo isset($_SESSION['errores_entrada'])? MostrarErrores($_SESSION['errores_entrada'],'descripcion') : '' ;   ?>
             <label for="descripcion">Descripcion</label></p>
        <textarea style="width: 530px; height: 150px;" type="text" name="descripcion"></textarea>
        

        <br> <br>

        <label for="categoria">Selecciona una categoria para la entrada</label>
        <select name="categoria" id="">

        <?php $categorias= ConseguirCategorias($conexion); 
             if(!empty($categorias)):
                while($categoria=mysqli_fetch_assoc($categorias)): ?>
        ?>
                   
                        <option value="<?= $categoria['id']; ?>"> <?= $categoria['nombre']; ?> </option>
                    

        <?php endwhile;
                endif;
                ?>
        </select>
       <input type="submit" name="submit" value="Crear">
    </form>
        <?php BorrarErrores() ?>
 </div>

 <?php  require_once('includes/Footer.php')  ?>