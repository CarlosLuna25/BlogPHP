<?php 
if (isset($_POST)) {
    # code...
    require_once('includes/conexion.php');
   $titulo= isset($_POST['titulo']) ? mysqli_real_escape_string($conexion,$_POST['titulo']) : false;
   $descripcion= isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion,$_POST['descripcion']) : false;
   $categoria= isset($_POST['categoria']) ? (int)$_POST['categoria']:false;
   $id=$_SESSION['usuario']['id'];
   $errores=array();
   if (!empty($titulo)) {
    $nombre_validado=true;

 }else{
     $nombre_validado=false;
     $errores['titulo']="titulo invalido";
 }
 if (!empty($descripcion)) {
    $descripcion_validado=true;

 }else{
     $nombre_validado=false;
     $errores['descripcion']="descripcion invalida";
 }
 if (empty($categoria)  && !is_numeric($categoria) ) {
     # code...
     $categoria_validado=false;
     $errores['categoria']="categoria invalida";
 }


 //comprobar que no llegan errore
    if (count($errores)==0) {
        # code...

        if (isset($_GET['editar'])) {
            # code...
            $usuario_id=$_SESSION['usuario']['id'];
            $entrada_id=$_GET['editar'];
            $sql="UPDATE entradas SET titulo='$titulo', descripcion='$descripcion',categoria_id=$categoria ".
            "WHERE id=$entrada_id AND usuario_id=$usuario_id;";
        }else{
        $sql="INSERT INTO entradas VALUES (null, '$titulo','$descripcion',CURDATE(),$id,$categoria);";

        }
        $guardar=mysqli_query($conexion,$sql);
         header('Location:index.php'); 
    }else {
        $_SESSION['errores_entrada']=$errores;
        if (isset($_GET['editar'])) {
            # code...
            header('Location:Editar-entrada.php?id='.$_GET['editar']);
        }else{
        header('Location:Crear-entrada.php');}
    }
}



?>