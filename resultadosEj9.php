<!DOCTYPE html>
<html>
    <head>
        <title>Resultados formulario</title>
    </head>
    <body>
        <?php

            $nombre = $_REQUEST["nombre9"];
            $contra = $_REQUEST["contra9"];
            $estudios = $_REQUEST["estudios9"];
            $nacionalidad = $_REQUEST["nacionalidad9"];
            $idiomas = $_REQUEST["idiomas9"];
            $correo = $_REQUEST["email9"];
            $foto = $_FILES["foto9"];

            if ($nombre==""||!ctype_alpha(str_replace(' ','',$nombre))) { #1 VALIDAR NOMBRE (No esta vacio y solo esta compuesto por letras y espacios)
                echo "<p>ERROR: No has introducido un nombre valido </p>";
            } elseif ($contra==""||strlen($contra)<6) { #2 VALIDAR CONTRASEÑA (No esta vacio y tiene al menos 6 caracteres)
                echo "<p>ERROR: No has introducido una contraeña valida </p>";
            } elseif ($estudios=="") { #3 VALIDAR ESTUDIOS (Ha escogido al menos una opcion)
                echo "<p>ERROR: No has seleccionado ningunos estudios </p>";
            } elseif ($nacionalidad=="") { #4 VALIDAR NACIONALIDAD (Ha escogido al menos una opcion)
                echo "<p>ERROR: No has seleccionado ninguna nacionalidad </p>";
            } elseif (empty($idiomas)) { #5 VALIDAR LISTA DE IDIOMAS (Ha escogido al menos una opcion)
                echo "<p>ERROR: No has seleccionado ningun idioma </p>";
            } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) { #6 VALIDAR EMAIL (Con filter var)
                echo "<p>ERROR: No has introducido un email valido </p>";
            } else { #7 VALIDAR ARCHIVO
                #7.1 Comprobar que ha subido el fichero
                if (!is_uploaded_file($foto["tmp_name"])) {
                    echo "<p>ERROR: No has subido ninguna foto </p>";
                } else { #7.2 Comprobar que el fichero tiene extension PNG,JPG o GIF
                    $extension = explode('.', $foto["name"]);
                    if(!($extension[1]=="png"||$extension[1]=="jpg"||$extension[1]=="gif")) {
                        echo "<p>ERROR: El fichero que has subido no es una imagen </p>";
                    } elseif (!is_dir("img/")) { #7.3 Comprobar que existe un directorio para guardar la imagen
                        echo "<p>ERROR: No existe ningun directorio para guardar la imagen </p>";
                    } else { #Si cumple con todo lo anterior se generara un nombre unico y se movera al directorio del servidor
                        $idUnico = time();
                        $nombreImagen = $idUnico."-".$foto['name'];
                        $completo = "img/".$nombreImagen;
                        move_uploaded_file($foto["tmp_name"], $completo);

                        #Indicaremos al usuario que se ha procesado el formulario con exito
                        echo "<h1> Formulario procesado con exito! </h1>";
                        echo "<h3> Pagina hecha por Josep Bonafont - 2º DAW Grupo B </h3>";
                    }
                }
            }

        ?>
    </body>
</html>