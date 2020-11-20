<?php

if (isset($_POST)) {
include_once('includes/conexion.php');
session_start();



    # code... Recoger los valores de los campos de registro con operador ternario if


    $nombre= isset($_POST['nombre']) ?  mysqli_real_escape_string($conexion,$_POST['nombre'])  : false;
    $apellido= isset($_POST['apellido']) ?  mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
    $email= isset($_POST['email']) ?  mysqli_real_escape_string($conexion,trim( $_POST['email'])) : false;
    $pass= isset($_POST['Contraseña']) ?  mysqli_real_escape_string($conexion,trim($_POST['Contraseña'])): false;
    $errores=array();

        //validar datos antes de guardar
        //nombre
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

         //contraseña
         if (!empty($pass)) {
            $pass_validado=true;
         }else {
             $pass_validado=false;
             $errores['pass']="Contraseña vacia";
         }
         
         $guardar_usuario=false;
         //comprobar que array de errores este vacio
         if (count($errores)==0 ) {
            //si esta vacio registrar el usuario
            $guardar_usuario=true;

            //cifrar la contraseña
            $pass_secure= password_hash($pass,PASSWORD_BCRYPT,['cost'=>4]);
            //sql para guardar el usuario
            $sql="INSERT INTO usuarios VALUES(null,'$nombre','$apellido','$pass_secure','$email', CURDATE());";
            $guardar=mysqli_query($conexion,$sql);
            
            

            //comprobar que se ha guardado en la base de datos
            if ($guardar) {
                # code...
                $_SESSION['completado'] = 'El registro se ha completado con exito';
            }else{
                $_SESSION['errores']['general']= "Fallo al guardar el usuario";
            }



         }else{
            $_SESSION['errores']=$errores;
            



         }

}
header('Location: index.php');
?>