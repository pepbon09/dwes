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
        <!---Ejercicio 16 & 17-UD 2--->
        <form>
            <p>Inserta la cantidad en euros/pesetas:</p>
            <input type="number" name="cantidad"/>
            <p>A que moneda quieres convertir?</p>
            <input type="radio" name="moneda" value="EUR"/>Euros
            <input type="radio" name="moneda" value="PES"/>Pesetas
            <input type="submit" value="Convertir"/>
        </form>
        <?php
            $cantidad = $_REQUEST['cantidad'];
            $moneda = $_REQUEST['moneda'];

            #Dependiendo de la opcion seleccionada, se realizara el calculo correspondiente
            if ($moneda=="EUR") {
                #Divido la cantidad recibida, y luego guardo el resultado formateado (con solo 2 decimales)
                $euros = sprintf("%.2f" , $cantidad / 166.386);
                echo "<p> ".$cantidad." pesetas son ".$euros." € </p>";
            } elseif ($moneda=="PES") {
                #Divido la cantidad recibida, y luego guardo el resultado formateado (con solo 2 decimales)
                $pesetas = sprintf("%.2f" , $cantidad * 166.386);
                echo "<p> ".$cantidad." € son ".$pesetas." pesetas </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 1-UD 3--->
        <form>
            <p>Inserta un caracter : </p>
            <input type="text" name="char" maxlength="1" />
            <input type="submit" value="Comprobar"/>
        </form>
        <?php
            $char = $_GET["char"];
            #1. Comprobar si esta vacio (en blanco)
            if($char=="" || ctype_space($char)) {
                echo "<p> Esta vacio </p>";
            } #2. Comprobar si es numerico
            elseif (ctype_digit($char)) {
                echo "<p> Es un numero </p>";
            } #3. Comprobar si es una letra minuscula
            elseif (ctype_lower($char)) {
                echo "<p> Es una minuscula </p>";
            } #4. Comprobar si es una letra mayuscula
            elseif (ctype_upper($char)) {
                echo "<p> Es una mayuscula </p>";
            } #5. Comprobar si es un caracter de puntuacion
            elseif (ctype_punct($char)) {
                echo "<p> Es un caracter de puntuación </p>";
            } #6. Si no es ninguna de los casos anteriores, sera un caracter especial
            else {
                echo "<p> Es un caracter especial </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 4-UD 3--->
        <form>
            <p>Inserta una hora (HH:MM:SS)</p>
            <input type="text" name="hora"/>
            <input type="submit" value="Validar"/>
        </form>
        <?php
            $hora = $_REQUEST["hora"];
            $time = DateTime::createFromFormat('H:i:s', $hora);

            if($time && $time->format('H:i:s') == $hora) {
                echo "<p>La hora es valida</p>";
            } else { #En caso contrario, no sera valida
                echo "<p>La hora no es valida</p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 5-UD 3--->
        <form>
            <p> Inserta los minutos que ha durado cada llamada: </p>
            <p><input type="number" name="duracion1"/>Llamada 1</p>
            <p><input type="number" name="duracion2"/>Llamada 2</p>
            <p><input type="number" name="duracion3"/>Llamada 3</p>
            <p><input type="number" name="duracion4"/>Llamada 4</p>
            <p><input type="number" name="duracion5"/>Llamada 5</p>
            <input type="submit" value="Calcular precio total"/>
        </form>
        <?php
            $duracion1 = $_REQUEST["duracion1"];
            $duracion2 = $_REQUEST["duracion2"];
            $duracion3 = $_REQUEST["duracion3"];
            $duracion4 = $_REQUEST["duracion4"];
            $duracion5 = $_REQUEST["duracion5"];
            
            $llamadas = array($duracion1, $duracion2, $duracion3, $duracion4, $duracion5);
            $total = 0;

            for ($i=0; $i < 5; $i++) {
                #Si la llamada dura mas de 3 minutos...
                if ($llamadas[$i] > 3) {
                    #Con los minutos que sobran se multiplicaran por 5, añadiendo los 10 centimos que cuesta si o si la llamada
                    $llamadas[$i] -= 3;
                    $total += ($llamadas[$i]*5)+10;
                } else { #En caso contrario, solo se sumaran 10 centimos
                    $total += 10;
                }
            }
            echo "<p>Todas las llamadas han costado ".$total." céntimos en total</p>";
        ?>
        <hr/>
        <!---Ejercicio 7-UD 3--->
        <form>
            <p>Inserta una fecha (YYYY-MM-DD HH:mm:ss)</p>
            <input type="text" name="fechaInicial"/>
            <p>Inserta otra fecha (YYYY-MM-DD HH:mm:ss)</p>
            <input type="text" name="fechaFinal"/>
            <input type="submit" value="Calcular diferencia"/>
        </form>
        <?php
            #Creo una fecha con date_create, le paso la cadena introducida en el formulario
            $fechaInicial=date_create($_REQUEST["fechaInicial"]);
            #Creo otra fecha a partir de la cadena introducida en el formulario
            $fechaFinal=date_create($_REQUEST["fechaFinal"]);
            #Obtengo la diferencia entre ambas fechas con la funcion date_diff()
            $interval=date_diff($fechaInicial,$fechaFinal);

            #$interval es un array asociativo donde se guardan todos los datos de la diferencia entre las fechas,
            #'y' son los años, 'm' son los meses, 'd' son los dias, 'h' las horas y 'i' los minutos
            $diferenciaDias = $interval->d + ($interval->m*30) + ($interval->y*365);
            
            echo "<p> Hay una diferencia de ".$diferenciaDias." dias ,".$interval->h." horas y ".$interval->i." minutos entre ambas fechas";
        ?>
        <hr/>
        <!---Ejercicio 8-UD 3--->
        <form>
            <p><label>Numero: </label><input type="number" min="1" max="10" name="tabla"/></p>
            <input type="submit" value="Sacar Tabla de multiplicar"/>
        </form>
        <?php
            $ntabla=$_GET["tabla"];

            for ($i=1; $i<11 ; $i++) { 
                echo "<p> " . $ntabla . " * " . $i . " = " . ($ntabla*$i) . " </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 17-UD 3--->
        <?php
            #Creo un array asociativo con los trabajadores y sus salarios
            $trabajadores = array(
                "Trabajador 1" => rand(550,1200),
                "Trabajador 2" => rand(550,1200),
                "Trabajador 3" => rand(550,1200),
                "Trabajador 4" => rand(550,1200),
                "Trabajador 5" => rand(550,1200)
            );
            foreach ($trabajadores as $nombre => $salario) {
                echo"<p> ".$nombre.": ".$salario."€ </p>";
            }
        ?>
        <form>
            <p>Indica que valor/es quieres comprobar</p>
            <p><input type="checkbox" name="salarios[]" value="MIN" checked/>Salario minimo</p>
            <p><input type="checkbox" name="salarios[]" value="MAX"/>Salario maximo</p>
            <p><input type="checkbox" name="salarios[]" value="Media"/>Salario medio</p>
            <input type="submit" value="Comprobar"/>
        </form>
        <?php
            $salarios = $_REQUEST['salarios'];

            foreach ($salarios as $tipoSalario) {
                switch ($tipoSalario) {
                    case 'MIN':
                        echo "<p> El salario minimo es de ".salarioMinimo($trabajadores)."€ </p>";
                        break;
                    case 'MAX':
                        echo "<p> El salario maximo es de ".salarioMaximo($trabajadores)."€ </p>";
                        break;
                    case 'Media':
                        echo "<p> El salario medio es de ".salarioMedio($trabajadores)."€ </p>";
                        break;
                    default:
                        echo "<p> No has selecionado ninguna opcion </p>";
                        break;
                }
            }

            function salarioMaximo($vector) {
                #Inicializo la variable del maximo con la menor cantidad posible
                $max=500;
                foreach ($vector as $nombre => $salario) {
                    #Si el salario es mayor que la cantidad en max, se guardara este como el nuevo maximo
                    if($salario>$max) {
                        $max = $salario;
                    }
                }
                #Devuelvo el valor del salario maximo
                return $max;
            }

            function salarioMinimo($vector) {
                #Inicializo la variable del minimo con la mayor cantidad posible
                $min=1250;
                foreach ($vector as $nombre => $salario) {
                    #Si el salario es menor que la cantidad en min, se guardara este como el nuevo minimo
                    if($salario<$min) {
                        $min = $salario;
                    }
                }
                #Devuelvo el valor del salario minimo
                return $min;
            }

            function salarioMedio($vector) {
                $salarioMedio=0;
                #Voy sumando todos los salarios
                foreach ($vector as $nombre => $salario) {
                    $salarioMedio+=$salario;
                }
                #Y luego los divido entre 5
                $salarioMedio/=5;
                return $salarioMedio;
            }
        ?>
        <hr/>
        <!---Ejercicio 18--->
        <p><strong>Salarios Actuales</strong></p>
        <?php
            foreach ($trabajadores as $nombre => $salario) {
                echo"<p> ".$nombre.": ".$salario."€ </p>";
            }
        ?>
        <p>Introduce un porcentaje: </p>
        <form>
            <input type="number" min="1" name="porcentaje"/>%
            <input type="submit" value="Calcular"/>
        </form>
        <?php

            $porcentaje = $_REQUEST['porcentaje'];
            echo "<p><strong>Salarios aumentados en un ".$porcentaje."% </strong></p>";

            foreach ($trabajadores as $nombre => $salario) {
                #Guardo el resultado del porcentaje formateado con un solo decimal
                $adicional=number_format($salario*$porcentaje/100 ,1);
                
                echo"<p> ".$nombre.": ".($salario+$adicional)."€ </p>";
            }
        ?>
    </body>
</html>