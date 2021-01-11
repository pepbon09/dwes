<!DOCTYPE html>
<?php
$cNombre = "operaciones";
$cValue = "Vacio";
$cExpires = time() + (60*60);
$cPath = "/";
?>
<html>
    <head>
        <title>Cookies 2</title>
    </head>
    <body>
        <form method="post">
            <p><label>Numero 1 </label><input type="number" name="num1" value="1" min="1"/></p>
            <p><label>Numero 2 </label><input type="number" name="num2" value="1" min="1"/></p>
            <input type="checkbox" name="operacion[]" value="suma" checked/>Sumar
            <input type="checkbox" name="operacion[]" value="resta"/>Restar
            <input type="checkbox" name="operacion[]" value="multiplicacion"/>Multiplicar
            <input type="checkbox" name="operacion[]" value="division"/>Dividir
            <br/>
            <input type="submit" value="Calcular"/>
        </form>
        <?php

            $num1 = $_REQUEST["num1"];
            $num2 = $_REQUEST["num2"];
            $operaciones = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : null;

            if (!empty($operaciones)) {
                foreach ($operaciones as $op) {
                    switch ($op) {
                        case 'suma':
                            echo'<p>' . $num1 . ' + ' . $num2 . ' = ' . ($num1+$num2) . ' </p>';
                            break;
                        case 'resta':
                            echo'<p>' . $num1 . ' - ' . $num2 . ' = ' . ($num1-$num2) . ' </p>';
                            break;
                        case 'multiplicacion':
                            echo'<p>' . $num1 . ' * ' . $num2 . ' = ' . ($num1*$num2) . ' </p>';
                            break;
                        case 'division':
                            echo'<p>' . $num1 . ' / ' . $num2 . ' = ' . ($num1/$num2) . ' </p>';
                            break;
                        default:
                            break;
                    }
                }
                $vActual = array($num1, $num2, $operaciones);
            }

            if ($_COOKIE["operaciones"]=="null" || empty($_COOKIE)) {
                echo "<h1> No hay calculos anteriores </h1>";
            } else {
                $vAnterior = json_decode($_COOKIE["operaciones"], true);
                echo "<h1> Calculos anteriores </h1>";
                foreach ($vAnterior[2] as $op) {
                    switch ($op) {
                        case 'suma':
                            echo'<p>' . $vAnterior[0] . ' + ' . $vAnterior[1] . ' = ' . ($vAnterior[0]+$vAnterior[1]) . ' </p>';
                            break;
                        case 'resta':
                            echo'<p>' . $vAnterior[0] . ' - ' . $vAnterior[1] . ' = ' . ($vAnterior[0]-$vAnterior[1]) . ' </p>';
                            break;
                        case 'multiplicacion':
                            echo'<p>' . $vAnterior[0] . ' * ' . $vAnterior[1] . ' = ' . ($vAnterior[0]*$vAnterior[1]) . ' </p>';
                            break;
                        case 'division':
                            echo'<p>' . $vAnterior[0] . ' / ' . $vAnterior[1] . ' = ' . ($vAnterior[0]/$vAnterior[1]) . ' </p>';
                            break;
                        default:
                            break;
                    }
                }
            }

            setcookie($cNombre, json_encode($vActual), $cExpires, $cPath);
        ?>
    </body>
</html>