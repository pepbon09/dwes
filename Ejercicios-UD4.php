<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios PHP Josep</title>
    </head>
    <body>
        <!---Ejercicio 4-UD 2--->
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
            #Recogo los datos del formulario con la superglobal GET
            $num1=$_REQUEST["num1"];
            $num2=$_REQUEST["num2"];
            $operaciones=$_REQUEST["operacion"];
            
            #Si el array esta vacio (no se ha escogido ninguna opcion), saltara el siguiente aviso
            if(count($operaciones)==0) {
                echo"<p>No se ha seleccionado ninguna operacion</p>";
            } else {
                #En caso contrario, hago un foreach para sacar todos los valores seleccionados y luego imprimir
                #las operaciones correspondientes mediante el switch
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
            }
        ?>
        <hr/>
        <!---Ejercicio 11-UD 2--->
        <form method="post">
            <p>Escoge un dia</p>
            <input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>"/>
            <input type="submit" value="Comprobar quincena"/>
        </form>
        <?php
            #Obtengo el dia del mes de la fecha introducida en el formulario
            $fecha = date('d', strtotime($_REQUEST['fecha']));

            echo"<h2>".$fecha."</h2>";
            if ($fecha<=15) {
                echo "<p> Primera Quincena </p>";
            } else {
                echo "<p> Segunda Quincena </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 15-UD 2--->
        <form method="post">
            <p>Escoge las palabras que quieras traducir</p>
            <p><input type="checkbox" name="palabras[]" value="house"/>House</p>
            <p><input type="checkbox" name="palabras[]" value="car"/>Car</p>
            <p><input type="checkbox" name="palabras[]" value="tree"/>Tree</p>
            <p><input type="checkbox" name="palabras[]" value="dog"/>Dog</p>
            <p><input type="checkbox" name="palabras[]" value="key"/>Key</p>
            <p><input type="checkbox" name="palabras[]" value="door"/>Door</p>
            <p><input type="checkbox" name="palabras[]" value="window"/>Window</p>
            <p><input type="checkbox" name="palabras[]" value="computer"/>Computer</p>
            <p><input type="checkbox" name="palabras[]" value="phone"/>Phone</p>
            <p><input type="checkbox" name="palabras[]" value="table"/>Table</p>
            <input type="submit" value="Traducir"/>
        </form>
        <?php

            $palabras=$_REQUEST['palabras'];

            if(count($palabras)==0) {
                echo"<p>No has seleccionado ninguna palabra</p>";
            } else {
                foreach ($palabras as  $palabra) {
                    switch ($palabra) {
                        case 'house':
                            echo "<p> House - Casa </p>";
                            break;
                        case 'car':
                            echo "<p> Car - Coche </p>";
                            break;
                        case 'tree':
                            echo "<p> Tree - Arbol </p>";
                            break;
                        case 'dog':
                            echo "<p> Dog - Perro </p>";
                            break;
                        case 'key':
                            echo "<p> Key - Llave </p>";
                            break;
                        case 'door':
                            echo "<p> Door - Puerta </p>";
                            break;
                        case 'window':
                            echo "<p> Window - Ventana </p>";
                            break;
                        case 'computer':
                            echo "<p> Computer - Ordenador </p>";
                            break;
                        case 'phone':
                            echo "<p> Phone - Telefono </p>";
                            break;
                        case 'table':
                            echo "<p> Table - Mesa </p>";
                            break;
                        default:
                            break;
                    }   
                }
            }
        ?>
        <hr/>
    </body>
</html>