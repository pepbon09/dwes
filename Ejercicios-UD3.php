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
            $fecha = date("w");
            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
            $hora = getdate();
            $formato = "%02d";
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
            $H = sprintf($formato, $s/3600);
            $s -= $H * 3600;
            $M = sprintf($formato, $s/60);
            $s -= $M * 60;
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

            if (($horas>0 && $horas<24)&&($minutos>0 && $minutos<60)&&($segundos>0 && $segundos<60)) {
                echo "La hora es valida";
            } else {
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

            if ($duracion > 3) {
                $duracion -= 3;
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

            if($iguales1 == $iguales2 && $iguales1 == $iguales3) {
                echo "<p> Hay tres números iguales a ".$iguales1."</p>";
            } elseif ($iguales1 == $iguales2 || $iguales1 == $iguales3) {
                echo "<p> Hay dos números iguales a ".$iguales1."</p>";
            } elseif ($iguales2 == $iguales3) {
                echo "<p> Hay dos números iguales a ".$iguales2."</p>";
            } else {
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
            $fechaActual=date_create(date());
            $fechaDeseada=date_create($_GET["fechaDeseada"]);
            $interval=date_diff($fechaActual,$fechaDeseada);
            //$res=date_format('%H Horas y %I minutos' ,$diferencia);

            //echo $interval->format('%H Horas y %I minutos');
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
            $nfact = $fact;

            for ($i=$nfact-1; $i > 0; $i--) { 
                $nfact *= $i;
            }
            echo "<p>" . $fact . "! = " . $nfact . "</p>";
        ?>
        <hr/>
        <!---Ejercicio 10--->
        <?php
            $sumatorio = rand(1,20);
            $sum = 0;

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
            echo "<p> El numero invertido es ".strrev($ninvertir)." </p>";
        ?>
        <hr/>
        <!---Ejercicio 14--->
        <?php
            $notas = array(rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10), rand(1,10));
            $media = 0;

            for ($i=0; $i < 10; $i++) { 
                echo "<p> Alumno ".($i+1)." - ".$notas[$i]." </p>";
                $media += $notas[$i];
            }

            $media /= 10;
            echo "<p> La media de la clase es ".$media."</p>
                  <p> El/Los Alumnos que superan la media es/son ";

            for ($i=0; $i < 10; $i++) { 
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

            echo "<p> ".$base."^".$exponente." = ".pow($base,$exponente)."</p>";
        ?>
        <hr/>
        <!---Ejercicio 16--->
        <?php
            function permutar($vector)
            {
                $aux = 0;

                for ($i=0; $i < 7/2; $i++) { 
                    $aux = $vector[7-($i+1)];
                    $vector[7-($i+1)] = $vector[$i];
                    $vector[$i] = $aux;
                }

                return $vector;
            }
            $V = array(6,3,4,1,9,8,5);
            echo"<p>Array sin permutar: ";
            for ($i=0; $i < 7; $i++) { 
                echo $V[$i]." ";
            }
            echo"</p>";

            $V = permutar($V);

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
                $max=500;
                foreach ($vector as $nombre => $salario) {
                    if($salario>$max) {
                        $max = $salario;
                    }
                }
                return $max;
            }

            function salarioMinimo($vector) {
                $min=1250;
                foreach ($vector as $nombre => $salario) {
                    if($salario<$min) {
                        $min = $salario;
                    }
                }
                return $min;
            }

            function salarioMedio($vector) {
                $salarioMedio=0;
                foreach ($vector as $nombre => $salario) {
                    $salarioMedio+=$salario;
                }
                $salarioMedio/=5;
                return $salarioMedio;
            }

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
                $porcentaje=number_format($salario*15/100 ,1);
                
                echo"<p> ".$nombre.": ".($salario+$porcentaje)."€ </p>";
            }
        ?>
    </body>
</html>