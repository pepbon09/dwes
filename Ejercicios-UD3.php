<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios-PHP-Josep</title>
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
            <input type="number" max="86400" name="segundos" />
            <input type="submit" value="Crear Hora" />
        </form>
        <?php
            $segundos = $_GET["segundos"];
            $H = sprintf($formato, $segundos/3600);
            $segundos -= $H * 3600;
            $M = sprintf($formato, $segundos/60);
            $segundos -= $M * 60;
            $S = sprintf($formato, $segundos);

            echo "<p> " . $H . ":" . $M . ":" . $S . "</p>";
        ?>
        <hr/>
        <!---Ejercicio 4--->
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
            <p><label>Numero 1</label><input type="number" name="iguales1" /></p>
            <p><label>Numero 2</label><input type="number" name="iguales2" /></p>
            <p><label>Numero 3</label><input type="number" name="iguales3" /></p>
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
            $res = gmp_fact($fact);
            echo "<p>".$fact."! = ".$res."</p>";
        ?>
    </body>
</html>