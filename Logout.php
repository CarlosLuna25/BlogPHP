<?php session_start();


if (isset($_SESSION['usuario'])) {
    # code...
session_destroy(); //para destruir la sesion (Cerrar)
}


header('location:index.php');
