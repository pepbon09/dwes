<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Datos registrados</title>
    </head>
    <body>
        <h1>Sus datos han sido enviados correctamente!</h1>
        <?php

            $usuario = $_REQUEST["usuario"];
            $nombre = $_REQUEST["nombre"];
            $email = $_REQUEST["email"];
            $tlfFijo = $_REQUEST["tlfFijo"];
            $tlfMovil = $_REQUEST["tlfMovil"];
            $direccion = $_REQUEST["direccion"];
            $cp = $_REQUEST["cpostal"];
            $sexo = $_REQUEST["sexo"];
            $tipo = $_REQUEST["tipo"];
            $conocido = $_REQUEST["conocido"];
            $temas = $_REQUEST["temas"];

            echo "<p>Usuario: <strong>".strtoupper($usuario)."</strong></p>";
            echo "<p>Nombre: <strong>".strtoupper($nombre)."</strong></p>";
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