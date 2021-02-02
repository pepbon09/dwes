<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <title>Sesiones 4</title>
    </head>
    <body>
        <form action="sesionSindicalista.php">
        <?php
        include 'Calculos.php';
        $trabajadores = $_SESSION["salarios"];
        if(!isset($_REQUEST["token"])) {
            echo "<h1 style='color: red;'>No se ha encontrado el token!</h1>";
        } elseif (hash_equals($_REQUEST["token"], $_SESSION["token"])===false) {
            echo "<h1 style='color: red;'>El token no coincide!</h1>";
        } else {
            echo "<h1 style='color: blue;'>Bienvenid@ ".$_SESSION["nombre"]."</h1>";
            echo "<p> El salario medio es de ".salarioMedio($trabajadores)."€ </p>";
        }
        ?>
        <input type="submit" name="cerrar" value="Cerrar Sesión"/>
        </form>
        <?php
            $cerrar = $_REQUEST["cerrar"];
            if(isset($cerrar)==1) {
                unset($_SESSION);
                session_destroy();
                header("Location: Formulario.php");
                exit;
            }
        ?>
    </body>
</html>