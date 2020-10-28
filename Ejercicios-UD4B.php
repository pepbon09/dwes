<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios PHP Josep</title>
    </head>
    <body>
        <!---Ejercicio 1--->
        <form>
            <p>Cuantos numeros impares quieres seleccionar?</p>
            <input type="text" name="impares"/>
            <p>Que tipo de operacion quieres realizar?</p>
            <input type="radio" name="operacion" value="suma"/>Suma
            <input type="radio" name="operacion" value="multi"/>Multiplicación
            <input type="submit" value="Calcular"/>
        </form>
        <?php
            $nImpares = $_REQUEST["impares"];
            $operacion = $_REQUEST["operacion"];

            if ($nImpares=="" || !ctype_digit($nImpares) || $nImpares < 0) {
                echo "<p> Cantidad no valida </p>";
            } else {
                $resultado = 1;
                switch ($operacion) {
                    case 'suma':
                        for ($i=0; $i <= ($nImpares*2); $i++) { 
                            if($i%2!=0){
                                $resultado += $i;
                            }
                        }
                        --$resultado;
                        echo "<p>La suma de los primeros ".$nImpares." numeros impares es: ".$resultado."</p>";
                        break;
                    case 'multi':
                        for ($i=0; $i <= ($nImpares*2); $i++) { 
                            if($i%2!=0){
                                $resultado *= $i;
                            }
                        }
                        echo "<p>La multiplicación de los primeros ".$nImpares." numeros impares es: ".$resultado."</p>";
                        break;
                    default:
                        echo "<p>No has seleccionado ninguna operación</p>";
                        break;
                }
            }
        ?>
        <hr/>
        <!---Ejercicio 2--->
        <form>
            <p>Inserta tu nombre: </p>
            <input type="text" name="nombre"/>
            <p>Que mensaje quieres mostrar?</p>
            <input type="radio" name="mensaje" value="bienvenida"/>Bienvenida
            <input type="radio" name="mensaje" value="despedida"/>Despedida
            <input type="submit" value="Generar mensaje"/>
        </form>
        <?php

            $nombre = $_REQUEST["nombre"];
            $mensaje = $_REQUEST["mensaje"];
            
            if($nombre=="" || !ctype_alpha($nombre)) {
                echo "<p>Nombre no valido</p>";
            } else {
                switch ($mensaje) {
                    case 'bienvenida':
                        echo "<p>Bienvenid@ a nuestra pagina web ".$nombre."! </p>";
                        break;
                    case 'despedida':
                        echo "<p>Hasta luego ".$nombre.", esperamos que vuelvas pronto! </p>";
                        break;
                    default:
                        echo "<p>No has escogido el tipo de mensaje</p>";
                        break;
                }
            }
        ?>
        <hr/>
        <!---Ejercicio 3--->
        <form>
            <p>Introduce algunos numeros (separados por espacios)</p>
            <input type="text" name="numeros"/>
            <p>Que quieres obtener?</p>
            <input type="checkbox" name="obtener[]" value="media"/> Media
            <input type="checkbox" name="obtener[]" value="moda"/> Moda
            <input type="checkbox" name="obtener[]" value="mediana"/> Mediana
            <input type="submit" value="Obtener Resultados"/>
        </form>
        <?php
            $numeros = $_REQUEST["numeros"];
            $obtener = $_REQUEST["obtener"];

            $lNumeros = explode(" ", $numeros);
            $listaValida = true;
            foreach ($lNumeros as $num) {
                if(!ctype_digit($num)) {
                    $listaValida = false;
                }
            }

            if (!$listaValida) {
                echo "<p> La lista de numeros que has introducido no es valida </p>";
            } elseif (empty($obtener)) {
                echo "<p> No has escogido ninguna opcion de la lista </p>";
            } else {
                
            }
        ?>
    </body>
</html>