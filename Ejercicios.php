<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 1</title>
    </head>
    <body>
        <!---Ejercicio 1--->
        <p> Hola <?php $nombre="Pep"; echo "$nombre"; ?>, encantado de conocerte!</p>
        <!---Ejercicio 2--->
        <p> <?php $nombre="Pep"; echo 'Hola ' . $nombre; ?>, encantado de conocerte!</p>
        <!---Ejercicio 3--->
        <p> <?php $nombre="Pep"; echo 'Hola <strong>' . $nombre . '</strong>'; ?>, encantado de conocerte!</p>
        <p> Gracias por la visita! </p>
        <!---Ejercicio 4--->
        <form method="get">
            <p>Numero 1</p><input type="number" name="num1" min="1"/>
            <p>Numero 2</p><input type="number" name="num2" min="1"/>
            <input type="submit" value="Calcular"/>
        </form>
        <br/>
        <?php
            $num1=$_GET["num1"];
            $num2=$_GET["num2"];
            $suma=$num1 + $num2;
            $resta=$num1 - $num2;
            $multi=$num1 * $num2;
            $div=$num1 / $num2;
            echo '<p>' . $num1 . ' + ' . $num2 . ' = ' . $suma . ' </p>';
            echo '<p>' . $num1 . ' - ' . $num2 . ' = ' . $resta . ' </p>';
            echo '<p>' . $num1 . ' * ' . $num2 . ' = ' . $multi . ' </p>';
            echo '<p>' . $num1 . ' / ' . $num2 . ' = ' . $div . ' </p>';
        ?>

    </body>
</html>