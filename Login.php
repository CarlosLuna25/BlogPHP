<?php
//incluir la conexion a la bd
include_once('includes/conexion.php');

//Recoger y validar datos del form
if (isset($_POST)) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['Contraseña']);
    //verificar que si hay seteado un error se borre de la variable sesion en caso de login correcto
    if (isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
        echo "ERROR ELIMINADO";
    }

    if (empty($email) or empty($pass)) {
        $_SESSION['error_login'] = "Rellene email y contraseña";
    } else {
        $sql = "SELECT * FROM usuarios WHERE email= '$email' LIMIT 1";
        $login = mysqli_query($conexion, $sql);

        if ($login &&  mysqli_num_rows($login) == 1) { //comprobar que se realizo la consulta y el numero de resultados
            $usuario = mysqli_fetch_assoc($login);







            //COMPARAR
            $verify = password_verify($pass, $usuario['pass']);
            if ($verify) {
                # code...
                //si coinciden las contraseñas guardar en variable de session
                $_SESSION['usuario'] = $usuario;


                //Redirigir al index


            } else { //sino coinciden
                $_SESSION['error_login'] = "Falla al iniciar sesion";
                var_dump($_SESSION);
            }
        } else { //si no arroja resultados el num rows o login falla la consulta
            $_SESSION['error_login'] = "Falla al iniciar sesion";
        }
    }
}



//Redirigir al index
header('Location:index.php');
