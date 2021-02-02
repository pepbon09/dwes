<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <title>Sesiones 5</title>
    </head>
    <body>
        <form action="sesionEstudiante.php">
        <?php
        if(!isset($_REQUEST["token"])) {
            echo "<h1 style='color: red;'>No se ha encontrado el token!</h1>";
        } elseif (hash_equals($_REQUEST["token"], $_SESSION["token"])===false) {
            echo "<h1 style='color: red;'>El token no coincide!</h1>";
        } else {
            echo "<h1 style='color: greenyellow;'>Bienvenid@ ".$_SESSION["nombre"]." ".$_SESSION["apellidos"]."</h1>";
            echo "<h3>Se te ha asignado un perfil de <i style='color: blue'>Estudiante</i></h3>";
            echo "<p>Estas en clase de ".$_SESSION["asignatura"]." en el grupo ".$_SESSION["grupo"]."</p>";
        }
        ?>
        <input type="submit" name="cerrar" value="Cerrar Sesión"/>
        </form>
        <?php
            $cerrar = $_REQUEST["cerrar"];
            if(isset($cerrar)==1) {
                unset($_SESSION);
                session_destroy();
                header("Location: Registro.php");
                exit;
            }
        ?>
    </body>
</html>