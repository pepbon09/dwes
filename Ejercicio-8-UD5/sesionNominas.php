<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <title>Sesiones 4</title>
    </head>
    <body>
        <form action="sesionNominas.php">
        <?php
        include 'Calculos.php';
        $trabajadores = $_SESSION["salarios"];

        echo "<h1 style='color: blue;'>Bienvenid@ ".$_SESSION["nombre"]."</h1>";
        echo "<p> El salario maximo es de ".salarioMaximo($trabajadores)."€ </p>";
        echo "<p> El salario minimo es de ".salarioMinimo($trabajadores)."€ </p>";
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