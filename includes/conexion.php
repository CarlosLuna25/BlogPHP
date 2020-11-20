<?php
//conexion
$server='localhost';
$user='root';
$pass='';
$db='blog_master';
$conexion=mysqli_connect($server,$user,$pass,$db);
if(mysqli_connect_errno()){

    echo "La conexion ha fallado ". mysqli_connect_error();
    }
    else{

mysqli_query($conexion,"SET NAMES 'utf8';");

if (!isset($_SESSION)) {
    # code...
    session_start();
}


//echo '<script>alert("Conexion exitosa")</script>'; 

}