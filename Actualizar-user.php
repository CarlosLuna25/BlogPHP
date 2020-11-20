<?php 

if ($_POST) {
    require_once('includes/conexion.php');

    $nombre= isset($_POST['nombre']) ?  mysqli_real_escape_string($conexion,$_POST['nombre'])  : false;
    $apellido= isset($_POST['apellido']) ?  mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
    $email= isset($_POST['email']) ?  mysqli_real_escape_string($conexion,trim( $_POST['email'])) : false;
    $errores=array();

    if (!empty($nombre) && !is_numeric($nombre)  && !preg_match(" /[0-9]/ ",$nombre) ) {
        $nombre_validado=true;

     }else{
         $nombre_validado=false;
         $errores['nombre']="nombre invalido";
     }

     //apellido
     if (!empty($apellido) && !is_numeric($apellido)  && !preg_match(" /[0-9]/ ",$apellido) ) {
         $apellido_validado=true;

      }else{
          $apellido_validado=false;
          $errores['apellido']="apellido invalido";
      }

      //email
      if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL) ) {
         $email_validado=true;

      }else{
          $email_validado=false;
          $errores['email']="email invalido";
      }
      $guardar_usuario=false;
      //comprobar que array de errores este vacio
      if (count($errores)==0 ) {
         //si esta vacio registrar el usuario
         $guardar_usuario=true;
         $usuario=$_SESSION['usuario'];

         //comprobar que el email no exista en la bd
         $consulta="SELECT id,email FROM usuarios WHERE email='$email'";
         $existe=mysqli_query($conexion,$consulta);
         $isset_email=mysqli_fetch_assoc($existe);

        if($isset_email['id']== $usuario['id'] OR empty($isset_email)){
        
         //sql para actualizar el usuario
         $sql="UPDATE usuarios SET".
         " nombre='$nombre',apellido='$apellido',email='$email' WHERE id=".$usuario['id'].";";
   
         $guardar=mysqli_query($conexion,$sql);
         if (!$guardar) {
             var_dump($guardar);
             die();
         }
         
         

         //comprobar que se ha guardado en la base de datos
         if ($guardar) {
             # ACTUALIZAR SESSION...
             $_SESSION['usuario']['nombre']=$nombre;
             $_SESSION['usuario']['apellido']=$apellido;
             $_SESSION['usuario']['email']=$email;

             $_SESSION['completado'] = 'Datos actualizados con exito';
         }else{
             $_SESSION['errores']['general']= "Fallo al actualizar el usuario";
         }
        }else{

            $_SESSION['errores']['general']= "email ya registrado en base de datos"; 
        }



      }else{
         $_SESSION['errores']=$errores;
         



      }
}
header('location: Editar-user.php')


?>