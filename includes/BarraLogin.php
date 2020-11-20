
 <!--SideBar-->

<aside id="sidebar">

<div id="buscador" class="block-aside"> <!--DIV LOGIN-->
        <h3>Buscar</h3>
          <form action="Buscar.php" method="POST"> 
                                      
                    <input type="text" name="busqueda" id="busqueda">
                    <input type="submit" value="Buscar">
        </form>
    </div>

    
    <?php include_once('conexion.php');   if(isset($_SESSION['usuario'])): ?>
    <div id="usuario_log" class="block-aside">
        <h4>
         <p>Bienvenido, <?= $_SESSION['usuario']['nombre']. ' ' . $_SESSION['usuario']['apellido']; ?></p>
            
        </h4>
        <a href="Crear-entrada.php" class="boton boton-verde">Crear entrada</a> 
        <a href="Crear-categoria.php" class="boton boton-amarillo">Crear categoria</a>
        <a href="Editar-user.php" class="boton">Editar perfil</a>
        <a href="Logout.php" class="boton boton-rojo">Cerrar sesion</a>
    </div>
    <?php endif;?>



    <!-- comprobar si no esta seteada la sesion y mostrar los cuadros de registro y login-->
    <?php  if(!isset($_SESSION['usuario'])): ?>
    <div id="login" class="block-aside"> <!--DIV LOGIN-->
        <h3>Identificate</h3>
        <?php if(isset($_SESSION['error_login']))://en caso de error al loguear ?>
    <div class="alerta alerta-error">
        <?= $_SESSION['error_login'];?>
        
    </div>
    <?php endif;?>

        <form action="Login.php" method="POST"> 
                    <p>
                        <label for="Usuario">Email</label> <br>
                        <input type="email" name="email" id="email">
                    </p>

                    <p>
                        <label for="Contraseña">Contraseña</label> <br>
                        <input type="password" name="Contraseña" id="pass">
                    </p>
                    <input type="submit" value="Entrar">
        </form>
    </div>


    <div id="Register" class="block-aside"> <!--DIV REGISTRO-->

        <h3>Registrate</h3>

        <?php if (isset($_SESSION['completado'])):?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado']; ?>

            </div>
           
      
        <?php elseif (isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general']; ?>

            </div>

        <?php endif; ?>

        <form action="registro.php" method="POST">
                    <p>
                        <label for="nombre">Nombre</label> <br>
                        <input type="text" name="nombre" id="nombre">
                        <?php echo isset($_SESSION['errores'])? MostrarErrores($_SESSION['errores'],'nombre') : '';   ?>
                    </p>
                    <p>
                        <label for="apellido">Apellido</label> <br>
                        <input type="text" name="apellido" id="apellido">
                        <?php echo isset($_SESSION['errores'])? MostrarErrores($_SESSION['errores'],'apellido') : '';  ?>
                    </p>
                    <p>
                        <label for="Usuario">Email</label> <br>
                        <input type="email" name="email" id="email">
                        <?php echo isset($_SESSION['errores'])? MostrarErrores($_SESSION['errores'],'email') : '';  ?>
                    </p>

                    <p>
                        <label for="Contraseña">Contraseña</label> <br>
                        <input type="password" name="Contraseña" id="pass">
                        <?php echo isset($_SESSION['errores'])? MostrarErrores($_SESSION['errores'],'pass') : '';   ?>
                    </p>
                    <input type="submit" name="submit" value="Registrar">
        </form>
        <?php BorrarErrores();?>
    </div>
        <?php endif;?>
</aside>
