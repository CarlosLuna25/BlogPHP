<?php include_once('conexion.php');  
    include_once('helpers.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-sports Locura</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!--CABECERA-->

    <header id="header">
        <div id="logotipo">
            <a href="index.php">E-spots Locura</a>
        </div>
        <!--MENU-->
        <?php $categorias=ConseguirCategorias($conexion); ?>


        <nav id="menu">
            <ul>
                <li><a href="index">Inicio</a></li>
                <?php 
                if(!empty($categorias)):
                    while($categoria=mysqli_fetch_assoc($categorias)): ?>
                        <li><a href="categoria.php?id=<?=$categoria['id'];  ?>"><?= $categoria['nombre']; ?></a></li>

                <?php endwhile;
                endif;
                ?>



                <li><a href="index.html">Sobre Mi</a></li>
                <li><a href="index.html">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div id="container">
