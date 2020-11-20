
  <?php require_once('includes/helpers.php');
  require_once('includes/header.php');

        $categoria_actual=ConseguirCategoria($conexion,$_GET['id']);
        if (!isset($categoria_actual['id'])) {
            # code...
            header('Location:index.php');
        }
    





require_once('includes/BarraLogin.php');


?>
<div id="Principal">
  


    <h1>Todas las entradas de <?=$categoria_actual['nombre']?></h1>
    <?php $entradas = UltimasEntradas($conexion,null,$_GET['id']);
    if (!empty($entradas)&& mysqli_num_rows($entradas) >=1) :
        while ($entrada = mysqli_fetch_assoc($entradas)) :
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
    <div class="alerta">Sin entradas en esta categoria</div>
    <?php endif; ?>

</div>
<!--FOOTER-->

<?php include_once('includes/Footer.php'); ?>