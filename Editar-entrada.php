<?php require_once('includes/redireccion.php');
require_once('includes/header.php');
require_once('includes/BarraLogin.php');
require_once('includes/helpers.php');
$entrada_actual= conseguirEntrada($conexion,$_GET['id']);

if (!isset($entrada_actual['id'])) {
    header('Location:index.php');
   
}
//<?php if($entrada_actual['categoria_id']==$categoria['id']): echo "selected"; endif; ?>
?>
<div id="Principal">
     <h1>Editar Entrada</h1>
    
        <br> 
    <form action="Guardar-entrada.php?editar=<?=$entrada_actual['id'];?>" method="post">
        <p>
            Edita tu entrada <?= $entrada_actual['titulo'];?>
        </p>
        
        <p>
        <?php echo isset($_SESSION['errores_entrada'])? MostrarErrores($_SESSION['errores_entrada'],'titulo') : '' ;   ?>
             <label for="nombre">Titulo de la entrada</label>
            <input type="text" name="titulo" value="<?= $entrada_actual['titulo'];?>">
        

        </p>
        <p>
        <?php echo isset($_SESSION['errores_entrada'])? MostrarErrores($_SESSION['errores_entrada'],'descripcion') : '' ;   ?>
             <label for="descripcion">Descripcion</label></p>
        <textarea style="width: 530px; height: 150px;" type="text" name="descripcion" ><?= $entrada_actual['descripcion'];?></textarea>
        

        <br> <br>

        <label for="categoria">Selecciona una categoria para la entrada</label>
        <select name="categoria" id="">

        <?php $categorias= ConseguirCategorias($conexion); 
             if(!empty($categorias)):
                while($categoria=mysqli_fetch_assoc($categorias)): ?>
        ?>
                   
                        <option  
                        <?= ($categoria['id']==$entrada_actual['categoria_id']) ? 'selected' : '' ?>
                        value="<?= $categoria['id']; ?>"> <?= $categoria['nombre']; ?> </option>
                    

        <?php endwhile;
                endif;
                ?>
        </select>
       <input type="submit" name="submit" value="Editar">
    </form>
        <?php BorrarErrores() ?>
 </div>

 <?php  require_once('includes/Footer.php')  ?>