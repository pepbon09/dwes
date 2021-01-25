<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <title>Sesiones 5</title>
    </head>
    <body>
        <form action="Registro.php">
            <p>Nombre:</p>
            <input type="text" name="nombre"/>
            <p>Apellidos:</p>
            <input type="text" name="apellidos"/>
            <p>Asignatura</p>
            <select name="asignatura">
                <option value="NONE" selected>Selecciona una asignatura</option>
                <option value="DWEC">Desarrollo Web en Entorno Cliente</option>
                <option value="DWES">Desarrollo Web en Entorno Servidor</option>
                <option value="DAW">Despliegue de Apliciones Web</option>
                <option value="DIW">Diseño de Interfaces Web</option>
                <option value="EIE">Empresa e Iniciativa Emprendedora</option>
                <option value="TUT">Tutoría</option>
            </select>
            <p>Grupo</p>
            <input type="radio" name="grupo" value="A"/> A
            <input type="radio" name="grupo" value="B"/> B
            <p>Eres mayor de edad?</p>
            <input type="radio" name="edad" value="Si"/> Si
            <input type="radio" name="edad" value="No"/> No
            <p>Ocupas un cargo?</p>
            <input type="radio" name="cargo" value="Si"/> Si
            <input type="radio" name="cargo" value="No"/> No
            <p><input type="submit" value="Iniciar Sesión" name="iniciar"></p>
        </form>
        <?php
            $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
            $apellidos = isset($_REQUEST["apellidos"]) ? $_REQUEST["apellidos"] : null;
            $asignatura = isset($_REQUEST["asignatura"]) ? $_REQUEST["asignatura"] : null;
            $grupo = isset($_REQUEST["grupo"]) ? $_REQUEST["grupo"] : null;
            $edad = isset($_REQUEST["edad"]) ? $_REQUEST["edad"] : null;
            $cargo = isset($_REQUEST["cargo"]) ? $_REQUEST["cargo"] : null;
            $iniciar = $_REQUEST["iniciar"];

            if(!is_null($edad) && $edad!="" && !is_null($cargo) && $cargo!="" && $asignatura!="NONE") {
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apellidos"] = $apellidos;
                $_SESSION["asignatura"] = $asignatura;
                $_SESSION["grupo"] = $grupo;

                if(isset($iniciar)==1) {
                    
                    if($edad=="No" && $cargo=="Si") {
                        header("Location: sesionDelegado.php");
                        exit;
                    } elseif($edad=="Si" && $cargo=="No") {
                        header("Location: sesionProfesor.php");
                        exit;
                    } elseif($edad=="Si" && $cargo=="Si") {
                        header("Location: sesionDirector.php");
                        exit;
                    } else {
                        header("Location: sesionEstudiante.php");
                        exit;
                    }

                }
            }
        ?>
    </body>
</html>