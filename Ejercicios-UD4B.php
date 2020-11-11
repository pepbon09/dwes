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

            #Validar que el campo nImpares no esta vacio, solo esta compuesto por digitos y no sea un numero negativo
            if ($nImpares=="" || !ctype_digit($nImpares) || $nImpares < 0) {
                echo "<p> Cantidad no valida </p>";
            } else { #En caso de cumplir la validacion...
                $resultado = 1; #Inicializo la variable del resultado (1 por defecto)
                switch ($operacion) {
                    case 'suma':
                        #Creo un bucle que se recorrera el numero introducido x 2, para asi poder recorrer todos los impares que ha pedido el usuario
                        for ($i=0; $i <= ($nImpares*2); $i++) { 
                            if($i%2!=0){ #Si el numero del contador es impar (es decir, al dividirlo entre 2 su resto no es 0)
                                $resultado += $i; #Sumo al resultado final el numero del contador
                            }
                        }
                        --$resultado; #En este caso, le restaremos uno al resultado para cuadrarlo
                        echo "<p>La suma de los primeros ".$nImpares." numeros impares es: ".$resultado."</p>";
                        break;
                    case 'multi':
                        #Creo un bucle que se recorrera el numero introducido x 2, para asi poder recorrer todos los impares que ha pedido el usuario
                        for ($i=0; $i <= ($nImpares*2); $i++) { 
                            if($i%2!=0){ #Si el numero del contador es impar (es decir, al dividirlo entre 2 su resto no es 0)
                                $resultado *= $i; #Multiplico el resultado por el numero del contador
                            }
                        }
                        echo "<p>La multiplicación de los primeros ".$nImpares." numeros impares es: ".$resultado."</p>";
                        break;
                    default:
                        #Devolvera este error en caso de no haber seleccionado ninguna operacion
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
            
            #Validar que el campo nombre no esta vacio y solo esta compuesto por letras
            if($nombre=="" || !ctype_alpha($nombre)) {
                echo "<p>Nombre no valido</p>";
            } else {
                switch ($mensaje) { #Dependiendo de la opcion que haya escogido, se mostrara el mensaje correspondiente
                    case 'bienvenida':
                        echo "<p>Bienvenid@ a nuestra pagina web ".$nombre."! </p>";
                        break;
                    case 'despedida':
                        echo "<p>Hasta luego ".$nombre.", esperamos que vuelvas pronto! </p>";
                        break;
                    default:
                        #Devolvera este error en caso de no haber seleccionado ninguna operacion
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

            #Dividire el string donde se han introducido los numeros y los guardo en un array
            $lNumeros = explode(" ", $numeros);
            $listaValida = true;
            foreach ($lNumeros as $num) { #Ahora comprobare que todos los componentes del array son numeros
                if(!ctype_digit($num)) {
                    $listaValida = false; #En el caso de encontrar algun elemento que no sea un numero, la lista se dara como no valida
                }
            }

            if (!$listaValida) { #Si se ha detectado que no es una lista valida, sacara el siguiente error
                echo "<p> La lista de numeros que has introducido no es valida </p>";
            } elseif (empty($obtener)) { #Validar que no este vacia la lista de las operaciones
                echo "<p> No has escogido ninguna opcion de la lista </p>";
            } else {
                foreach ($obtener as $opcion) {
                    switch ($opcion) {
                        case 'media':
                            $res = 0; #Creo una variable donde guardare el resultado
                            foreach ($lNumeros as $num) {
                                $res += $num; #Sumare todos los numeros de la lista
                            }
                            $res /= count($lNumeros); #Y luego lo dividire entre la cantidad de numeros que se han introducido
                            echo "<p> La media de los numeros es ".$res." </p>";
                            break;
                        case 'moda':
                            $moda = 0;
                            $vecesMax = 0; #Creo dos variables, una para guardar el numero moda y otra para guardar las veces que ha salido
                            $cuenta = array_count_values($lNumeros);
                            /*
                            La variable $cuenta es un array asociativo que guarda como key los valores dentro del array $lNumeros,
                            y como valor sera las veces que aparece dicha key en el array $lNumeros
                            EJEMPLO: si $lNumeros = [7,3,3,5], entonces $cuenta = ["7"=>1,"3"=>2,"5"=>1]
                            */
                            foreach ($cuenta as $numeros => $veces) { #Creo un bucle que recorrera el array asociativo
                                if($veces>$vecesMax){ #Si el valor de la key actual es mayor que el maximo que se ha registrado
                                    $moda = $numeros; #Entonces tendremos una nueva moda, guardamos la key como numero moda
                                    $vecesMax = $veces; #Y el valor como las veces que ha salido
                                }
                            }
                            echo "<p> La moda de los numeros es ".$moda.", ha aparecido ".$vecesMax." vez/veces </p>";
                            break;
                        case 'mediana':
                            $mediana = 0;
                            if (count($lNumeros)%2==0) { #Si se ha introducido una cantidad de numeros par
                                #Obtendremos los 2 numeros de la mitad y haremos la media de los 2
                                $indiceMediana = count($lNumeros)/2;
                                $num1 = $lNumeros[$indiceMediana];
                                $num2 = $lNumeros[$indiceMediana-1];
                                $mediana = ($num1+$num2)/2;
                                echo "<p> La mediana de los numeros es ".$mediana.", promedio de los 2 numeros centrales (".$num1." y ".$num2.") </p>";
                            } else { #Si se ha introducido una cantidad de numeros impar
                                #Solo accederemos al indice de la mitad del array
                                $indiceMediana = (count($lNumeros)-1)/2;
                                $mediana = $lNumeros[$indiceMediana];
                                echo "<p> La mediana de los numeros es ".$mediana." </p>";
                            }
                            break;
                    }
                }
            }
        ?>
        <hr/>
        <!---Ejercicio 4--->
        <form>
            <p>Escoge el curso al que perteneces</p>
            <input type="radio" name="curso" value="1"/>Primero
            <input type="radio" name="curso" value="2"/>Segundo
            <p>Escoge los modulos que quieras listar</p>
            <select multiple size="6" name="modulos[]">
                <option value="DWEC">Desarrollo Web en Entorno Cliente</option>
                <option value="DWES">Desarrollo Web en Entorno Servidor</option>
                <option value="DAW">Despliegue de Apliciones Web</option>
                <option value="DIW">Diseño de Interfaces Web</option>
                <option value="EIE">Empresa e Iniciativa Emprendedora</option>
                <option value="TUT">Tutoría</option>
            </select>
            <p>Escribe la hora a la que empieza cada clase (HH:MM, en el orden de la lista de arriba y separadas por espacios)</p>
            <input type="text" name="horas"/>
            <input type="submit" value="Crear horario"/>
        </form>
        <?php
            $curso = $_REQUEST["curso"];
            $modulos = $_REQUEST["modulos"];
            $horas = $_REQUEST["horas"];
            $lista = explode(' ', $horas);

            if ($curso=="") { #Validar que el campo curso no este vacio
                echo "<p>No has especificado ningun curso</p>";
            } elseif (empty($modulos)) { #Validar que el campo modulos no este vacio
                echo "<p>No has seleccionado ningun modulo</p>";
            } elseif ($horas==""||!listaValida($horas, $modulos)) { #Validar que el campo horas no este vacio, que son horas validas e introducidas en el formato adecuado (funcion listaValida)
                echo "<p>No has introducido las horas correctamente</p>";
            } else { #En caso de cumplir la validación...
                echo "<table style='border: 1px solid;margin: 15px;text-align: center;'> 
                            <th colspan='2' style='border: 1px solid;'>".$curso."º DAW </th>"; #Creamos la tabla y el encabezado con el curso seleccionado
                for ($i=0; $i < count($modulos); $i++) { #Se creara una fila por cada modulo seleccionado, contendra en la primera columna la hora a la que empieza la clase y en la segunda el modulo correspondiente                
                    echo "<tr>
                            <td style='border: 1px solid;'>".$lista[$i]."</td>
                            <td>".$modulos[$i]."</td>
                          </tr>";
                }
                echo "</table>";
            }


            #Esta funcion comprobara que se han introducido horas validas y en el formato correcto
            function listaValida($lista, $modulos) {
                $valida = true; #Daremos la condicion de que la lista es valida desde el principio
                $listaHoras = explode(' ', $lista); #Creamos un array que contendra cada hora separadas por espacios
                if (count($listaHoras)!=count($modulos)) {
                    #Si no tenemos la misma cantidad de horas que modulos seleccionados, entonces esta lista ya no nos vale
                    $valida = false;
                } else {
                    foreach ($listaHoras as $h) { #Ahora que sabemos que tenemos el mismo numero de horas y de modulos, vamos a comprobar que son horas validas
                        $componentesHora = explode(':', $h); #Partimos el valor en dos a partir de ':', separando asi las horas y los minutos en el array $componentesHora
                        if (count($componentesHora)!=2 || #En el caso de tener mas de 2 componentes...
                            !ctype_digit($componentesHora[0]) ||
                            !ctype_digit($componentesHora[1]) || #Que las horas o los minutos no esten compuestos solo por numeros...
                            $componentesHora[0]<0 ||
                            $componentesHora[0]>23 || #Que las horas no se encuentren entre 0 y 23
                            $componentesHora[1]<0 ||
                            $componentesHora[1]>59) { #Y que los minutos no se encuentren entre 0 y 59
                                #Si se da cualquiera de esos casos, se dara la hora introducida como invalida, y por lo tanto la lista entera
                                $valida = false;
                        }
                    }
                }
                #Devolveremos el valor booleano correspondiente, si ha cumplido todas las validaciones, devolvera true, en caso contrario, false
                return $valida;
            }
        ?>
        <hr/>
        <!---Ejercicio 5--->
        <form>
            <p>Introduce una hora (HH)</p>
            <input type="text" name="hora"/>
            <input type="submit" value="Generar mensaje"/>
        </form>
        <?php
            $hora = $_REQUEST["hora"];
            #Validar que el campo hora no este vacio, que solo este compuesto por numeros y que se encuentre dentro de 0 y 23
            if (!ctype_digit($hora) || $hora=="" || $hora<0 || $hora>23) {
                echo "<p> La hora que has introducido no es valida </p>";
            } else { #En caso de cumplir la validacion...
                #Sacara el mensaje correspondiente dependiendo del rango en el que se encuentre la hora
                if ($hora>=6 && $hora<=12) {
                    echo "<p>Buenos días!</p>";
                } elseif ($hora>=13 && $hora<=20) {
                    echo "<p>Buenas tardes!</p>";
                } else {
                    echo "<p>Buenas noches!</p>";
                }
            }
        ?>
        <hr/>
        <!---Ejercicio 6--->
        <form>
            <p>Selecciona una zona horaria </p>
            <select multiple size="10" name="zonas[]">
                <option value="-11">UTC-11</option>
                <option value="-10">UTC-10</option>
                <option value="-9">UTC-9</option>
                <option value="-8">UTC-8</option>
                <option value="-7">UTC-7</option>
                <option value="-6">UTC-6</option>
                <option value="-5">UTC-5</option>
                <option value="-4">UTC-4</option>
                <option value="-3">UTC-3</option>
                <option value="-2">UTC-2</option>
                <option value="-1">UTC-1</option>
                <option value="+0">UTC+0</option>
                <option value="+1">UTC+1</option>
                <option value="+2">UTC+2</option>
                <option value="+3">UTC+3</option>
                <option value="+4">UTC+4</option>
                <option value="+5">UTC+5</option>
                <option value="+6">UTC+6</option>
                <option value="+7">UTC+7</option>
                <option value="+8">UTC+8</option>
                <option value="+9">UTC+9</option>
                <option value="+10">UTC+10</option>
                <option value="+11">UTC+11</option>
                <option value="+12">UTC+12</option>
                <option value="+13">UTC+13</option>
                <option value="+14">UTC+14</option>
            </select>
            <p>
                <input type="submit" value="Mostrar horas"/>
            </p>
        </form>
        <?php
            date_default_timezone_set('UTC'); #Establecemos la zona horaria por defecto en UTC
            $zonas = $_REQUEST["zonas"];
            if (empty($zonas)) { #Validamos que el campo zonas no esta vacio
                echo "<p> No has seleccionado ninguna opción </p>";
            } elseif (count($zonas)>20) { #Y que no ha seleccionado mas de 20 opciones
                echo "<p> Has seleccionado demasiadas opciones (max. 20) </p>";
            } else {
                foreach ($zonas as $zona) {
                    /*
                    Calcularemos dependiendo de la opcion que hemos escogido, las horas que vamos a añadir o quitar
                    EJEMPLO: Si hemos seleccionado la opcion +3, $aplicar = "+3 hours"
                    Esto nos servira a la hora de formatear la fecha, ya que podremos modificarla gracias a la funcion strtotime
                    EJEMPLO: Si en PHP la fecha actual es 15:15, date("H:i", strtotime("+3 hours")) = 18:15
                     */
                    $aplicar = $zona." hours";
                    $fecha = date('d/m H:i:s', strtotime($aplicar));
                    echo "<p> Hora en UTC".$zona.": ".$fecha." </p>";
                }   
            }
        ?>
        <hr/>
        <!---Ejercicio 7--->
        <form>
            <p>Introduce un correo electronico</p>
            <input type="text" name="correo"/>
            <p>Confirma el correo electronico</p>
            <input type="text" name="correoconf"/>
            <p><input type="checkbox" name="publicidad[]" value="acepta"/> Marca la casilla si aceptas recibir publicidad</p>
            <input type="submit" value="Enviar"/>
            <input type="reset" value="Borrar"/>
        </form>
        <?php
            $correo = $_REQUEST["correo"];
            $confirmacion = $_REQUEST["correoconf"];
            $publicidad = $_REQUEST["publicidad"];

            #Validar que el campo correo cumple con la validacion por defecto de PHP
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "<p> La dirrecion de correo electronico que has introducido no es valida </p>";
            } elseif ($correo != $confirmacion) { #Validar que el campo correo y el campo confirmacion contienen el mismo texto
                echo "<p> La confirmacion y la direccion del correo electronico no coinciden </p>";
            } elseif (empty($publicidad)) { #Validar que el campo publicidad no este vacio
                echo "<p> No has aceptado recibir publicidad </p>";
            } else { #En el caso de cumplir todas las validaciones, mostraremos al usuario que se ha enviado el correo correctamente
                echo "<p> Correo enviado! </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 8--->
        <form action="resultadosEj8.php" method="POST">
            <p>Nombre:</p>
            <input type="text" name="nombre8"/>
            <p>Apellidos:</p>
            <input type="text" name="apellidos8"/>
            <p>Edad: </p>
            <input type="text" name="edad8"/>
            <p>Peso (en Kg.): </p>
            <input type="text" name="peso8"/>
            <p>Sexo: </p>
            <input type="radio" name="sexo8" value="hombre"/>Hombre
            <input type="radio" name="sexo8" value="mujer"/>Mujer
            <p>Estado civil </p>
            <input type="radio" name="estadocivil8" value="Soltero"/>Soltero
            <input type="radio" name="estadocivil8" value="Casado"/>Casado
            <input type="radio" name="estadocivil8" value="Viudo"/>Viudo
            <input type="radio" name="estadocivil8" value="Divorciado"/>Divorciado
            <input type="radio" name="estadocivil8" value="Otro"/>Otro
            <p>Aficiones: </p>
            <input type="checkbox" name="aficiones8[]" value="Cine"/> Cine
            <input type="checkbox" name="aficiones8[]" value="Deporte"/> Deporte
            <input type="checkbox" name="aficiones8[]" value="Literatura"/> Literatura
            <input type="checkbox" name="aficiones8[]" value="Musica"/> Musica
            <input type="checkbox" name="aficiones8[]" value="Comics"/> Comics
            <input type="checkbox" name="aficiones8[]" value="Series"/> Series
            <input type="checkbox" name="aficiones8[]" value="Videojuegos"/> Videojuegos
            <p>
                <input type="submit" value="Enviar"/>
                <input type="reset" value="Borrar"/>
            </p>
        </form>
        <hr/>
        <!---Ejercicio 9--->
        <form action="resultadosEj9.php" method="POST" enctype="multipart/form-data">
            <p>Nombre completo:</p>
            <input type="text" name="nombre9"/>
            <p>Contraseña: </p>
            <input type="password" name="contra9"/>
            <p>Nivel de estudios:</p>
            <input type="radio" name="estudios9" value="Sin Estudios"/>Sin Estudios
            <input type="radio" name="estudios9" value="ESO"/>Educación Secundaria Obligatoria
            <input type="radio" name="estudios9" value="BACH"/>Bachillerato
            <input type="radio" name="estudios9" value="FP"/>Formación Profesional
            <input type="radio" name="estudios9" value="UNI"/>Estudios Universitarios
            <p>Nacionalidad:</p>
            <input type="radio" name="nacionalidad9" value="ESP"/> Española
            <input type="radio" name="nacionalidad9" value="Otro"/> Otra
            <p>Idiomas: </p>
            <input type="checkbox" name="idiomas9[]" value="ESP"/> Español
            <input type="checkbox" name="idiomas9[]" value="ENG"/> Ingles
            <input type="checkbox" name="idiomas9[]" value="ALE"/> Aleman
            <input type="checkbox" name="idiomas9[]" value="ITA"/> Italiano
            <input type="checkbox" name="idiomas9[]" value="FRA"/> Frances
            <p>Email: </p>
            <input type="text" name="email9"/>
            <p>Adjuntar Foto: </p>
            <input type="file" name="foto9"/>
            <p><input type="submit" value="Enviar"/></p>
        </form>
    </body>
</html>