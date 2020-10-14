<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios-PHP-Josep</title>
        <style>
            th, td {
                border: 1px solid black;
                text-align: center;
            }
            .hora {
                width: 35px;
            }
        </style>
    </head>
    <body>
        <!---Ejercicio 1--->
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
        <!---Ejercicio 2--->
        <?php
            #Recojo el dia de la semana del sistema con date("w")
            $fecha = date("w");

            #Creo un array con los dias de la semana
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
            
            #Obtengo la fecha y hora del sistema con getdate(), que pasa un array con todos los datos
            $hora = getdate();
            $formato = "%02d";

            #Guardo las horas, minutos y segundos formateados del array
            $h = sprintf($formato, $hora["hours"]);
            $m = sprintf($formato, $hora["minutes"]);
            $s = sprintf($formato, $hora["seconds"]);

            echo "<p> Son las " . $h . ":" . $m . ":" . $s . " del " . $dias[$fecha] . "</p>";
        ?>
        <hr/>
        <!---Ejercicio 3--->
        <form>
            <p> Inserta un numero de segundos </p>
            <input type="number" max="86400" name="s" />
            <input type="submit" value="Crear Hora" />
        </form>
        <?php
            $s = $_GET["s"];

            #Divido los segundos en horas, lo formateo y lo guardo
            $H = sprintf($formato, $s/3600);
            #Calculo los segundos restantes restandoles las horas en segundos
            $s -= $H * 3600;
            #Divido los segundos en minutos, lo formateo y lo guardo
            $M = sprintf($formato, $s/60);
            #Calculo los segundos restantes restandoles los minutos en segundos
            $s -= $M * 60;
            #Los segundos restantes se formatean y se guardan
            $S = sprintf($formato, $s);

            echo "<p> " . $H . ":" . $M . ":" . $S . "</p>";
        ?>
        <hr/>
        <!---Ejercicio 4--->
        <form>
            <p>Inserta una hora valida</p>
            <input type="number" name="horas" class="hora"/>
            <label>:</label>
            <input type="number" name="minutos" class="hora"/>
            <label>:</label>
            <input type="number" name="segundos" class="hora"/>
            <input type="submit" value="Validar"/>
        </form>
        <?php
            $horas=$_GET["horas"];
            $minutos=$_GET["minutos"];
            $segundos=$_GET["segundos"];
            
            #Si la hora es entre 0 y 23 y los minutos y segundos son entre 0 y 60, sera valida la fecha
            if (($horas>0 && $horas<24)&&($minutos>0 && $minutos<60)&&($segundos>0 && $segundos<60)) {
                echo "La hora es valida";
            } else { #En caso contrario, no sera valida
                echo "La hora no es valida";
            }
        ?>
        <hr/>
        <!---Ejercicio 5--->
        <form>
            <p> Inserta los minutos que ha durado la llamada: </p>
            <input type="number" name="duracion" />
            <input type="submit" value="Calcular precio" />
        </form>
        <?php
            $duracion = $_GET["duracion"];
            $precio = 10;

            #Si la duracion es mayor que 3
            if ($duracion > 3) {
                #Restare 3 minutos de la duracion total
                $duracion -= 3;
                #Y sumare al precio los minutos restantes multiplicados por 5
                $precio += $duracion*5;
            }

            echo "<p>La llamada ha costado ".$precio." céntimos</p>";
        ?>
        <hr/>
        <!---Ejercicio 6--->
        <form>
            <p><label>Numero 1 </label><input type="number" name="iguales1" /></p>
            <p><label>Numero 2 </label><input type="number" name="iguales2" /></p>
            <p><label>Numero 3 </label><input type="number" name="iguales3" /></p>
            <input type="submit" value="Comprobar iguales"/>
        </form>
        <?php
            $iguales1 = $_GET["iguales1"];
            $iguales2 = $_GET["iguales2"];
            $iguales3 = $_GET["iguales3"];

            #Si los 3 numeros son iguales, se imprimira el aviso de que hay 3 numeros iguales
            if($iguales1 == $iguales2 && $iguales1 == $iguales3) {
                echo "<p> Hay tres números iguales a ".$iguales1."</p>";
            } #Si el primer numero es igual que otro...
            elseif ($iguales1 == $iguales2 || $iguales1 == $iguales3) {
                echo "<p> Hay dos números iguales a ".$iguales1."</p>";
            } #o el segundo es igual que el tercero, avisara de que hay 2 numeros iguales
            elseif ($iguales2 == $iguales3) {
                echo "<p> Hay dos números iguales a ".$iguales2."</p>";
            } #Si ninguna expresion es verdadera, entonces no habra numeros iguales
            else {
                echo "<p> No hay números iguales </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 7--->
        <form>
            <p>Inserta una fecha (YYYY-MM-DD HH:mm:ss)</p>
            <input type="text" name="fechaDeseada"/>
            <input type="submit" value="Calcular diferencia"/>
        </form>
        <?php
            #Creo una fecha con date_create, le paso date() para que obtenga la fecha del sistema
            $fechaActual=date_create(date());
            #Creo otra fecha a partir de la cadena introducida en el formulario
            $fechaDeseada=date_create($_GET["fechaDeseada"]);
            #Obtengo la diferencia entre ambas fechas con la funcion date_diff()
            $interval=date_diff($fechaActual,$fechaDeseada);
            
            #la variable interval es un array asociativo donde se guardan todos los datos de la diferencia,
            #'d' son los dias, 'h' las horas y 'i' los minutos
            echo "<p> Faltan ".$interval->d." dias ,".$interval->h." horas y ".$interval->i." minutos para llegar a esa fecha";
        ?>
        <hr/>
        <!---Ejercicio 8--->
        <form>
            <p><label>Numero: </label><input type="number" name="tabla"/></p>
            <input type="submit" value="Sacar Tabla de multiplicar"/>
        </form>
        <?php
            $ntabla=$_GET["tabla"];

            for ($i=1; $i<11 ; $i++) { 
                echo "<p> " . $ntabla . " * " . $i . " = " . ($ntabla*$i) . " </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 9--->
        <?php
            $fact = rand(1,15);
            #Guardo el factorial original en otra variable
            $nfact = $fact;

            #En este bucle, empiezo el contador con el numero factorial-1, y se detendra al llegar a 0,
            #restara 1 por cada vez que se reinicie
            for ($i=$nfact-1; $i > 0; $i--) { 
                #Se ira multiplicando y guardando el factorial
                $nfact *= $i;
            }
            echo "<p>" . $fact . "! = " . $nfact . "</p>";
        ?>
        <hr/>
        <!---Ejercicio 10--->
        <?php
            $sumatorio = rand(1,20);
            $sum = 0;

            #Creo un bucle parecido al del ejercicio anterior, solo que esta vez se va sumando el resultado
            #en lugar de multiplicar
            for ($i=$sumatorio; $i > 0; $i--) { 
                $sum += $i;
            }

            echo "<p> Sumatorio de " . $sumatorio . " = " . $sum . " </p>";
        ?>
        <hr/>
        <!---Ejercicio 11--->
        <table>
            <tr>
                <th>Numero</th>
                <th>Cuadrado</th>
                <th>Cubo</th>
            </tr>
        <?php
            $nfilas = rand(5,10);
            
            for ($i=1; $i < $nfilas+1; $i++) { 
                echo "<tr>
                        <td>".$i."</td>
                        <td>".($i*$i)."</td>
                        <td>".($i*$i*$i)."</td>
                      </tr>";
            }
        ?>
        </table>
        <hr/>
        <!---Ejercicio 12--->
        <?php
            $nimpares = rand(15,25);

            echo "<p> Impares menores que ".$nimpares." = ";

            for ($i=0; $i < $nimpares; $i++) {
                #Si el contador es impar(al dividirlo entre 2, el resto no es 0), se imprimira el numero
                if ($i%2!=0) {
                    echo $i." ";
                }
            }
            echo "</p>";
        ?>
        <hr/>
        <!---Ejercicio 13--->
        <form>
            <p><label>Escribe un numero: </label><input type="number" name="invertir"/></p>
            <input type="submit" value="Invertir Numero"/>
        </form>
        <?php
            $ninvertir = $_GET["invertir"];
            #Para invertir el numero he usado la funcion strrev(), la cual invierte numeros y strings de derecho al reves
            echo "<p> El numero invertido es ".strrev($ninvertir)." </p>";
        ?>
        <hr/>
        <!---Ejercicio 14--->
        <?php
            #Creo un array con los notas generadas aleatoriamente
            $notas = array(rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10));
            $media = 0;

            #Imprimo la notas de los alumnos y voy sumando las notas a la media
            for ($i=0; $i < 10; $i++) { 
                echo "<p> Alumno ".($i+1)." - ".$notas[$i]." </p>";
                $media += $notas[$i];
            }

            #Una vez sumadas todas la notas, la dividimos entre 10 para obtener la media
            $media /= 10;
            echo "<p> La media de la clase es ".$media."</p>
                  <p> El/Los Alumnos que superan la media es/son ";

            for ($i=0; $i < 10; $i++) {
                #Si la nota del alumno es mayor que la media, se imprimira
                if ($notas[$i]>$media) {
                    echo ($i+1)." ";
                }
            }
            echo"</p>";
        ?>
        <hr/>
        <!---Ejercicio 15--->
        <form>
            <p><label>Escribe el numero base </label><input type="number" name="base"/></p>
            <p><label>Escribe el numero de la potencia </label><input type="number" name="exponente"/></p>
            <input type="submit" value="Calcular potencia"/>
        </form>
        <?php
            $base = $_GET["base"];
            $exponente = $_GET["exponente"];

            #Para calcular la potencia, utilizo la funcion pow()
            echo "<p> ".$base."^".$exponente." = ".pow($base,$exponente)."</p>";
        ?>
        <hr/>
        <!---Ejercicio 16--->
        <?php
            function permutar($vector)
            {
                #Creo una variable auxiliar para poder cambiar los valores del array
                $aux = 0;

                #Este bucle solo se recorrera la mitad del tamaño del array (3 veces en este caso)
                for ($i=0; $i < 7/2; $i++) {
                    #Gurado en la variable auxiliar el valor de atras
                    $aux = $vector[7-($i+1)];
                    #Reemplazo esa posicion con el de delante
                    $vector[7-($i+1)] = $vector[$i];
                    #Y reemplazo la posicion de delante con el valor de la variable auxiliar
                    $vector[$i] = $aux;
                }

                #Devuelvo el array permutado
                return $vector;
            }

            #Creo un array con los valores y lo imprimo
            $V = array(6,3,4,1,9,8,5);
            echo"<p>Array sin permutar: ";
            for ($i=0; $i < 7; $i++) { 
                echo $V[$i]." ";
            }
            echo"</p>";

            #Llamo a la funcion permutar() para obtener el array cambiado
            $V = permutar($V);

            #Imprimo el array de nuevo, cuando ya esta modificado
            echo"<p>Array permutado: ";
            for ($i=0; $i < 7; $i++) { 
                echo $V[$i]." ";
            }
            echo"</p>";
        ?>
        <hr/>
        <!---Ejercicio 17--->
        <?php
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

            #Llamo a las funciones para calcular los datos
            echo"<p>El mayor salario es de ".salarioMaximo($trabajadores)."€ </p>";
            echo"<p>El menor salario es de ".salarioMinimo($trabajadores)."€ </p>";
            echo"<p>El salario medio es de ".salarioMedio($trabajadores)."€ </p>";
        ?>
        <hr/>
        <!---Ejercicio 18--->
        <p><strong>Salarios Actuales</strong></p>
        <?php
            foreach ($trabajadores as $nombre => $salario) {
                echo"<p> ".$nombre.": ".$salario."€ </p>";
            }
        ?>
        <p><strong>Salarios con un aumento del 15%</strong></p>
        <?php
            foreach ($trabajadores as $nombre => $salario) {
                #Guardo el resultado del porcentaje formateado con un solo decimal
                $porcentaje=number_format($salario*15/100 ,1);
                
                echo"<p> ".$nombre.": ".($salario+$porcentaje)."€ </p>";
            }
        ?>
    </body>
</html>