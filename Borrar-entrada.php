<?php
require_once('includes/conexion.php');
if (isset($_SESSION['usuario']) && isset($_GET['id']) ) {
   $usuario_id=$_SESSION['usuario']['id'];
   $entrada_id=$_GET['id'];
   $sql="DELETE FROM entradas WHERE id=$entrada_id AND usuario_id=$usuario_id;";
   $borrar=mysqli_query($conexion,$sql);
   if ($borrar) {
       header('location:index.php');
   }else{
       echo mysqli_error($conexion);
   }
}