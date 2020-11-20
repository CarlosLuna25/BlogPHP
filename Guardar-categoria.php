<?php
if (isset($_POST)) {
    # code...
    require_once('includes/conexion.php');
   $nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : false;
   if (!empty($nombre) && !is_numeric($nombre)  && !preg_match(" /[0-9]/ ",$nombre) ) {
    $nombre_validado=true;

 }else{
     $nombre_validado=false;
     $errores['nombre']="nombre invalido";
 }

 //comprobar que no llegan errore
    if (count($errores)==0) {
        # code...
        $sql="INSERT INTO categorias VALUES (null, '$nombre');";
        $guardar=mysqli_query($conexion,$sql);
          
    }
}
header('Location:index.php');