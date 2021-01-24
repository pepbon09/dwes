<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Datos registrados</title>
    </head>
    <body>
        <?php

            $usuario = $_SESSION["usuario"];
            $nombre = $_SESSION["nombre"];
            $email = $_SESSION["correo"];
            $tlfFijo = $_SESSION["fijo"];
            $tlfMovil = $_SESSION["movil"];
            $direccion = $_SESSION["direccion"];
            $cp = $_SESSION["cpostal"];
            $sexo = $_SESSION["sexo"];
            $tipo = $_SESSION["tipo"];
            $conocido = $_SESSION["conocido"];
            $temas = $_SESSION["temas"];

            echo "<h1 style='color: greenyellow'>Hola ".$nombre.", estos son tus datos:</h1>";
            echo "<p>Usuario: <strong>".strtoupper($usuario)."</strong></p>";
            echo "<p>Correo electronico: <strong>".strtoupper($email)."</strong></p>";
            echo "<p>Tlf. Fijo: <strong>".strtoupper($tlfFijo)."</strong></p>";
            echo "<p>Tlf. Movil: <strong>".strtoupper($tlfMovil)."</strong></p>";
            echo "<p>Direccion: <strong>".strtoupper($direccion)."</strong></p>";
            echo "<p>C.P.: <strong>".strtoupper($cp)."</strong></p>";
            echo "<p>Sexo: <strong>".strtoupper($sexo)."</strong></p>";
            echo "<p>Tipo de cuenta: <strong>".strtoupper($tipo)."</strong></p>";
            echo "<p>Nos has conocido mediante: <strong><br>";
            foreach($conocido as $conoce) {
                echo "- ".strtoupper($conoce)."<br>";
            }
            echo "</strong></p>";
            echo "<p>Los temas que te interesan son: <strong><br>";
            foreach($temas as $tema) {
                echo "- ".strtoupper($tema)."<br>";
            }
            echo "</strong></p>";

        ?>
    </body>
</html>