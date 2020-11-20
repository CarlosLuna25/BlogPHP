<?php 
require_once('includes/header.php');
require_once('includes/BarraLogin.php');
require_once('includes/helpers.php');

?>
<div id="Principal">
    <h1>Todas las entradas</h1>

    <?php  
     $entradas = UltimasEntradas($conexion);
    
    
    if (!empty($entradas) && mysqli_num_rows($entradas) >=1) :
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
       


</div>
<!--FOOTER-->

<?php include_once('includes/Footer.php'); ?>