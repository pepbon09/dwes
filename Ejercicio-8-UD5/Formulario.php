<!DOCTYPE html>
<?php
session_start();
#Creo un array asociativo con los trabajadores y sus salarios
$trabajadores = array(
    "Trabajador 1" => rand(550,1200),
    "Trabajador 2" => rand(550,1200),
    "Trabajador 3" => rand(550,1200),
    "Trabajador 4" => rand(550,1200),
    "Trabajador 5" => rand(550,1200)
);
?>
<html>
    <head>
        <title>Sesiones 4</title>
    </head>
    <body>
        <form action="Formulario.php">
            <p>Nombre:</p>
            <input type="text" name="nombre"/>
            <p>Empleo:</p>
            <input type="radio" name="empleo" value="gerente"/> Gerente
            <input type="radio" name="empleo" value="sindicalista"/> Sindicalista
            <input type="radio" name="empleo" value="nominas"/> Responsable de nóminas
            <p><input type="submit" value="Iniciar Sesión" name="iniciar"></p>
        </form>
        <?php
            $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
            $empleo = isset($_REQUEST["empleo"]) ? $_REQUEST["empleo"] : null;
            $iniciar = $_REQUEST["iniciar"];

            if(!is_null($nombre) && $nombre!="" && !is_null($empleo) && $empleo!="") {
                $_SESSION["nombre"] = $nombre;
                $_SESSION["empleo"] = $empleo;
                $_SESSION["salarios"] = $trabajadores;

                if(isset($iniciar)==1) {
                    switch($empleo) {
                        case 'gerente':
                            header("Location: sesionGerente.php");
                            exit;
                            break;
                        case 'sindicalista':
                            header("Location: sesionSindicalista.php");
                            exit;
                            break;
                        case 'nominas':
                            header("Location: sesionNominas.php");
                            exit;
                            break;
                    }
                }
            }
        ?>
    </body>
</html>