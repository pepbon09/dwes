<!DOCTYPE html>
<html>
    <head>
        <title>Resultados formulario</title>
    </head>
    <body>
        <?php

            $nombre = $_REQUEST["nombre8"];
            $apellidos = $_REQUEST["apellidos8"];
            $edad = $_REQUEST["edad8"];
            $peso = $_REQUEST["peso8"];
            $sexo = $_REQUEST["sexo8"];
            $estadoCivil = $_REQUEST["estadocivil8"];
            $aficiones = $_REQUEST["aficiones8"];

            if ($nombre==""||!ctype_alpha(str_replace(' ','',$nombre))) { #1 VALIDAR NOMBRE (No esta vacio y solo esta compuesto por letras y espacios)
                echo "<p>ERROR: No has introducido un nombre valido </p>";
            } elseif ($apellidos==""||!ctype_alpha(str_replace(' ','',$apellidos))) { #2 VALIDAR APELLIDOS (No esta vacio y solo esta compuesto por letras y espacios)
                echo "<p>ERROR: No has introducido unos apellidos validos </p>";
            } elseif ($edad==""||!ctype_digit($edad)) { #3 VALIDAR EDAD (No esta vacio y solo esta compuesto por numeros)
                echo "<p>ERROR: No has introducido una edad valida </p>";
            } elseif ($peso==""||!ctype_digit($peso)||$peso<10||$peso>150) { #4 VALIDAR PESO (No esta vacio, solo esta compuesto por numeros y se encuentra entre 10 y 150)
                echo "<p>ERROR: No has introducido un peso valido </p>";
            } elseif ($sexo=="") { #5 VALIDAR SEXO (Ha escogido al menos una opcion)
                echo "<p>ERROR: No has especificado ningun sexo </p>";
            } elseif ($estadoCivil=="") { #6 VALIDAR ESTADO CIVIL (Ha escogido al menos una opcion)
                echo "<p>ERROR: No has especificado ningun estado civil </p>";
            } elseif (empty($aficiones)) { #7 VALIDAR LISTA DE AFICIONES (Ha escogido al menos una opcion)
                echo "<p>ERROR: No has especificado ninguna aficion </p>";
            } else { #CORRECTO
                
                echo "<h1> Datos recibidos correctamente! </h1>";

                echo "<p>";
                switch ($sexo) {
                    case 'hombre':
                        echo "Bienvenido ";
                        break;
                    case 'mujer':
                        echo "Bienvenida ";
                        break;
                }
                echo " ".$nombre." ".$apellidos." </p>";

                echo "<p> Tienes ".$edad." años </p>";

                echo "<p> Actualmente pesas ".$peso." kg. </p>";

                echo "<p> Estado civil: ".$estadoCivil." </p>";

                echo "<p> Tus aficiones son : </p>";

                foreach ($aficiones as $aficion) {
                    echo "<p> - ".$aficion." </p>";
                }

            }

        ?>
    </body>
</html>