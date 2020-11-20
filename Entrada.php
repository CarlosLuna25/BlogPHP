<?php 
require_once('includes/header.php');
require_once('includes/BarraLogin.php');
require_once('includes/helpers.php');
$entrada_actual= conseguirEntrada($conexion,$_GET['id']);

if (!isset($entrada_actual['id'])) {
    header('Location:index.php');
   
}

?>
<div id="Principal">
  <h1><?=$entrada_actual['titulo']?></h1>
  <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
  <h2 style="margin-top: 5px !important; font-size: 16px;" ><?=$entrada_actual['categoria']?></h2>
  </a>
  <h4 style="font-size: 10px;"> publicacion: <?=$entrada_actual['fecha']?> ! Usuario: <?=$entrada_actual['Usuario']?> </h4>

  <p><?=$entrada_actual['descripcion']?></p>

  <?php if($_SESSION['usuario'] && $_SESSION['usuario']['id']==$entrada_actual['usuario_id']): ?>
    <p>
          <a href="Editar-entrada.php?id=<?=$entrada_actual['id']?>" style="color: white;" class="boton boton-verde">Editar entrada</a> 
    <a href="Borrar-entrada.php?id=<?=$entrada_actual['id']?>" style="color: white;" class="boton boton-rojo">Borrar Entrada</a>

    </p>
  
  <?php endif; ?>

</div>
<!--FOOTER-->

<?php include_once('includes/Footer.php'); ?>