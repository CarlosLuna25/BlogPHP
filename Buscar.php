
  <?php require_once('includes/helpers.php');
  require_once('includes/header.php');
     if (!isset($_POST['busqueda']) or empty($_POST['busqueda'])) {
            # code...
            header('Location:index.php');
        }
    
 
   
    





require_once('includes/BarraLogin.php');


?>
<div id="Principal">
  


    <h1>Busqueda:  <?=$_POST['busqueda']?></h1>
    <?php $busqueda=BuscarEntrada($conexion,$_POST['busqueda']);
    if (!empty($busqueda)&& mysqli_num_rows($busqueda) >=1) :
        while ($entrada = mysqli_fetch_assoc($busqueda)) :
    ?>
             <article class="entrada">
        <a href="entrada.php?id=<?=$entrada['id'];?>">
            <h2><?=  $entrada['titulo']; ?></h2>
            <span class="fecha"> <?=  $entrada['categoria'].' ['.$entrada['fecha'].']'  ; ?> </span>
            <p> <?= substr($entrada['descripcion'],0,210).'...' ; ?> </p>
        </a>

    </article>
    <?php endwhile;
    else: ?>
    <div style="margin-top: 10px; padding: 20px; font-size: 15px;" class="alerta">Sin coincidencias para su busqueda</div>
    <?php endif; ?>

</div>
<!--FOOTER-->

<?php include_once('includes/Footer.php'); ?>