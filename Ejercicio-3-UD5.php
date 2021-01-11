<!DOCTYPE html>
<?php
$cNombre = "mensaje";
$cValue = "Vacio";
$cExpires = time() + (60*60);
$cPath = "/";
?>
<html>
    <head>
        <title>Cookies 3</title>
    </head>
    <body>
        <form>
            <p>Inserta tu nombre: </p>
            <input type="text" name="nombre"/>
            <p>Que mensaje quieres mostrar?</p>
            <input type="radio" name="mensaje" value="bienvenida"/>Bienvenida
            <input type="radio" name="mensaje" value="despedida"/>Despedida
            <input type="submit" value="Generar mensaje"/>
        </form>
        <?php

            $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
            $mensaje = isset($_REQUEST["mensaje"]) ? $_REQUEST["mensaje"] : null;

            if (!is_null($mensaje) && !is_null($nombre)) {
                switch ($mensaje) { 
                    case 'bienvenida':
                        echo "<p>Bienvenid@ a nuestra pagina web ".$nombre."! </p>";
                        break;
                    case 'despedida':
                        echo "<p>Hasta luego ".$nombre.", esperamos que vuelvas pronto! </p>";
                        break;
                }
                $vActual = array($nombre, $mensaje);
            }

            if ($_COOKIE["mensaje"]=="null" || empty($_COOKIE)) {
                echo "<h1> No hay registros anteriores </h1>";
            } else {
                $vAnterior = json_decode($_COOKIE["mensaje"], true);
                echo "<h1> Registro anterior </h1>";
                switch ($vAnterior[1]) {
                    case 'bienvenida':
                        echo "<p>Bienvenid@ a nuestra pagina web ".$vAnterior[0]."! </p>";
                        break;
                    case 'despedida':
                        echo "<p>Hasta luego ".$vAnterior[0].", esperamos que vuelvas pronto! </p>";
                        break;
                }
            }

            setcookie($cNombre, json_encode($vActual), $cExpires, $cPath);
        ?>
    </body>
</html>