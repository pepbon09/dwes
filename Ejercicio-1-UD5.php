<!DOCTYPE html>
<?php
$cNombre = "user";
$cValue = "Vacio";
$cExpires = time() + (60*60);
$cPath = "/";
setcookie($cNombre, $cValue, $cExpires, $cPath);
?>
<html>
    <head>
        <title>Cookies 1</title>
    </head>
    <body>
        <form method="POST">
            <p>Inserta tu nombre:</p>
            <input type="text" name="nombre"/>
            <p>Elige tu idioma preferido:</p>
            <input type="radio" name="idioma" value="Castellano"/>Castellano
            <input type="radio" name="idioma" value="Valenciano"/>Valenciano
            <input type="radio" name="idioma" value="Ingles"/>Inglés
            <p>Color favorito:</p>
            <input type="text" name="color"/>
            <p>Ciudad preferida:</p>
            <input type="text" name="ciudad"/>
            <p><input type="submit" value="Enviar"/></p>
        </form>
        <?php
            $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
            $idioma = isset($_REQUEST["idioma"]) ? $_REQUEST["idioma"] : null;
            $color = isset($_REQUEST["color"]) ? $_REQUEST["color"] : null;
            $ciudad = isset($_REQUEST["ciudad"]) ? $_REQUEST["ciudad"] : null;

            if ($nombre != "" && $idioma != "" && $color != "" && $ciudad != "") {
                echo "<p>Hola ".$nombre."</p>";
                echo "<p>Has escogido ".$idioma." como idioma principal</p>";
                echo "<p>Tu color favorito es el ".$color."</p>";
                echo "<p>Tu ciudad favorita es ".$ciudad."</p>";
                $vActual = array($nombre, $idioma, $color, $ciudad);
            }

            if($_COOKIE["user"]=="null" || empty($_COOKIE)) {
                echo "<h1>No hay registros anteriores</h1>";
            } else {
                $vAnterior = json_decode($_COOKIE["user"], true);
                echo "<h1>Registro Anterior</h1>";
                echo "<p>Nombre: ".$vAnterior[0]."</p>";
                echo "<p>Idioma: ".$vAnterior[1]."</p>";
                echo "<p>Color favorito: ".$vAnterior[2]."</p>";
                echo "<p>Ciudad favorita: ".$vAnterior[3]."</p>";
            }

            setcookie($cNombre, json_encode($vActual), $cExpires, $cPath);
        ?>
    </body>
</html>