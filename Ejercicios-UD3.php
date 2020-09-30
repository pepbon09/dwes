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
        
    </body>
</html>