<!DOCTYPE html>
<?php
$cNombre = "publicidad";
$cValue = "Vacio";
$cExpires = time() + (60*60);
$cPath = "/";
?>
<html>
    <head>
        <title>Cookies 4</title>
    </head>
    <body>
        <form method="post">
            <p>Introduce un correo electronico</p>
            <input type="text" name="correo"/>
            <p>Confirma el correo electronico</p>
            <input type="text" name="correoconf"/>
            <p><input type="checkbox" name="publicidad[]" value="acepta"/> Marca la casilla si aceptas recibir publicidad</p>
            <input type="submit" value="Enviar"/>
            <input type="reset" value="Borrar"/>
        </form>
        <?php
            
            $correo = isset($_REQUEST["correo"]) ? $_REQUEST["correo"] : null;
            $confirmacion = isset($_REQUEST["correoconf"]) ? $_REQUEST["correoconf"] : null;
            $publicidad = isset($_REQUEST["publicidad"]) ? $_REQUEST["publicidad"] : null;

            if (!is_null($correo) && !is_null($confirmacion)) {
                $vActual = "SI";
                if (empty($publicidad)) {
                    echo "<p> No deseas recibir publicidad </p>";
                    $vActual = "NO";
                } else {
                    echo "<p> Deseas recibir publicidad </p>";
                }
            }

            if ($_COOKIE["publicidad"]=="null" || empty($_COOKIE)) {
                echo "<h1> No hay registros anteriores </h1>";
            } else {
                $vAnterior = $_COOKIE["publicidad"];
                if ($vAnterior == "SI") {
                    echo "<h1> El anterior usuario acepto recibir publicidad </h1>";
                } else {
                    echo "<h1> El anterior usuario no acepto recibir publicidad </h1>";
                }
            }

            setcookie($cNombre, $vActual, $cExpires, $cPath);
        ?>
    </body>
</html>