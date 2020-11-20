<?php 

function MostrarErrores($errores,$campo){
    $alerta='';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta='<div class="alerta alerta-error">'.$errores[$campo].'</div>';
    }
    return $alerta;
}

function BorrarErrores(){
    $_SESSION['errores']=null;
    unset($_SESSION['errores']);
    if (isset($_SESSION['completado'])) {
        $_SESSION['completado']=null;
        unset($_SESSION['completado']);
    }
    if (isset($_SESSION['error_login'])) {
        # code...
        $_SESSION['error_login']=null;
        unset($_SESSION['error_login']);
    }
    if (isset($_SESSION['errores_entrada'])) {
        # code...
        unset($_SESSION['errores_entrada']);
    }
}
function ConseguirCategorias($conexion){
    $sql="SELECT * FROM categorias ORDER BY nombre;";
   $categorias= mysqli_query($conexion,$sql);
   $resultado=array();
   if($categorias && mysqli_num_rows($categorias)>=1){
    $resultado= $categorias;
   }
   return $resultado;
}
function UltimasEntradas($conexion,$limit=0,$categoria=null){
    
    if (!is_null($categoria) AND $limit==0) {
        $sql="SELECT c.nombre AS 'categoria', e.* FROM entradas e INNER JOIN categorias c ON c.id=e.categoria_id AND e.categoria_id=$categoria".
        " ORDER BY e.fecha DESC";
        
        
    }
    
    if ($limit==0 AND is_null($categoria) ) {
        # code...
        $sql="SELECT c.nombre AS 'categoria', e.* FROM entradas e INNER JOIN categorias c ON c.id=e.categoria_id".
    " ORDER BY e.fecha DESC";
    }elseif($limit>=1 && empty($categoria)){
    $sql="SELECT c.nombre AS 'categoria', e.* FROM entradas e INNER JOIN categorias c ON c.id=e.categoria_id".
    " ORDER BY e.id DESC LIMIT $limit";}


    $ultimas=mysqli_query($conexion,$sql);
    $resultado=array();
    if($ultimas && mysqli_num_rows($ultimas)>=1){
        $resultado=$ultimas;
    }

    return $resultado;
}
function ConseguirCategoria($conexion,$id){
    $sql="SELECT * FROM categorias WHERE id=$id";
   $categoria= mysqli_query($conexion,$sql);
   $resultado=array();
   if($categoria && mysqli_num_rows($categoria)>=1){
    $resultado=  mysqli_fetch_assoc($categoria);
   }
   return $resultado;
}
function conseguirEntrada($conexion,$id){
    $sql="SELECT e.*, c.nombre as 'categoria', CONCAT(u.nombre,' ',u.apellido) as 'Usuario' FROM entradas e ".
        " INNER JOIN categorias c ON c.id=e.categoria_id ".
        " INNER JOIN usuarios u ON u.id=e.usuario_id ".
        "WHERE e.id=$id;";
    $entrada= mysqli_query($conexion,$sql);
    $resultado=array();
    if($entrada && mysqli_num_rows($entrada)>=1){
     $resultado=  mysqli_fetch_assoc($entrada);
 
    }
    return $resultado;

}
function BuscarEntrada($conexion,$titulo){
    $sql="SELECT c.nombre AS 'categoria', e.* FROM entradas e INNER JOIN categorias c ON c.id=e.categoria_id AND e.titulo LIKE '%$titulo%'".
        " ORDER BY e.fecha DESC";

        $entradas=mysqli_query($conexion,$sql);
        $resultado=array();
        if($entradas && mysqli_num_rows($entradas)>=1){
            $resultado=$entradas;
        }
    
        return $resultado;
};




?>