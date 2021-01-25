<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <title>Sesiones 5</title>
    </head>
    <body>
        <form action="sesionProfesor.php">
        <?php
        echo "<h1 style='color: greenyellow;'>Bienvenid@ ".$_SESSION["nombre"]." ".$_SESSION["apellidos"]."</h1>";
        echo "<h3>Se te ha asignado un perfil de <i style='color: blue'>Profesor</i></h3>";
        echo "<p>Estas en clase de ".$_SESSION["asignatura"]." en el grupo ".$_SESSION["grupo"]."</p>";
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