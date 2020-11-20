<?php 
require_once('includes/redireccion.php');
require_once('includes/header.php');
 require_once('includes/BarraLogin.php'); ?>

<div id="Principal">
     <h1>Crear Categoria</h1>
     <p>Añade nuevas categorias al blog para que los demas usuarios puedan utilizarlas</p>
        <br> 
    <form action="Guardar-categoria.php" method="post">

        <p>
             <label for="nombre">Nombre de categoria</label>
        <input type="text" name="nombre">
        <input type="submit" name="submit" value="Crear">

        </p>
       
    </form>

 </div>

 <?php  require_once('includes/Footer.php')  ?>