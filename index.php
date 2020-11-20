<?php require_once('includes/header.php'); ?>



<?php include_once('includes/BarraLogin.php'); ?>

<!--Parte central de las entradas-->

<div id="Principal">

    <h1>Ultimas entradas</h1>

    <?php $entradas = UltimasEntradas($conexion,4);
    if (!empty($entradas)) :
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
    endif; ?>

   
   

    </article>
    <div id="todas-entradas">
        <a href="Entradas.php">Ver todas las entradas</a>
    </div>

</div>





<!--FOOTER-->

<?php include_once('includes/Footer.php'); ?>