<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <title>Sesiones 3</title>
    </head>
    <body>
        <form action="Formulario.php" method="POST">
            <h1>Registrate</h1>
            <p>Nombre de usuario: </p>
            <input type="text" name="usuario" value="<?php echo $_REQUEST["usuario"]?>"/>
            <p>Contraseña: </p>
            <input type="password" name="contra" value="<?php echo $_REQUEST["contra"]?>"/>
            <p>Nombre: </p>
            <input type="text" name="nombre" value="<?php echo $_REQUEST["nombre"]?>"/>
            <p>Email: </p>
            <input type="text" name="email" value="<?php echo $_REQUEST["email"]?>"/>
            <p>Tlf. Fijo </p>
            <input type="text" name="tlfFijo" value="<?php echo $_REQUEST["tlfFijo"]?>"/>
            <p>Tlf. Móvil </p>
            <input type="text" name="tlfMovil" value="<?php echo $_REQUEST["tlfMovil"]?>"/>
            <p>Dirección</p>
            <input type="text" name="direccion" value="<?php echo $_REQUEST["direccion"]?>"/>
            <p>C.P.</p>
            <input type="text" name="cpostal" value="<?php echo $_REQUEST["cpostal"]?>"/>
            <p>Sexo</p>
            <input type="radio" name="sexo" value="Hombre"/>Hombre
            <input type="radio" name="sexo" value="Mujer"/>Mujer
            <p>Marca la casilla si aceptas nuestro LOPDGDD <input type="checkbox" name="acepta[]" value="si"/></p>
            <p>¿Como nos has conocido?</p>
            <select multiple size="4" name="conocido[]">
                <option value="Web">Web</option>
                <option value="Prensa">Prensa</option>
                <option value="Conocidos">Conocidos</option>
                <option value="Otro">Otro</option>
            </select>
            <p>¿Que temas te interesan mas?</p>
            <input type="checkbox" name="temas[]" value="Historica"/> Histórica
            <input type="checkbox" name="temas[]" value="Misterio"/> Misterio
            <input type="checkbox" name="temas[]" value="Romantica"/> Romántica
            <input type="checkbox" name="temas[]" value="Terror"/> Terror
            <input type="checkbox" name="temas[]" value="Comic"/> Comic
            <p>¿Que tipo de usuario eres?</p>
            <select name="tipo">
                <option value="Infantil(1-5)">Infantil(1-5 años)</option>
                <option value="Infantil(6-11)">Infantil(6-11 años)</option>
                <option value="Juvenil(12-15)">Juvenil(12-15 años)</option>
                <option value="Juvenil(16-18)">Juvenil(16-18 años)</option>
                <option value="Adulto(+18)">Adulto(+18 años)</option>
            </select>
            <p>
                <input type="submit" value="Validar" name="validar"/>
                <input type="reset" value="Limpiar"/>
                <input type="submit" value="Enviar" name="enviar"/>
            </p>
        </form>
        <?php
            include 'Validaciones.php';

            $usuario = isset($_REQUEST["usuario"]) ? $_REQUEST["usuario"] : null;
            $contra = isset($_REQUEST["contra"]) ? $_REQUEST["contra"] : null;
            $nombre = isset($_REQUEST["nombre"]) ? $_REQUEST["nombre"] : null;
            $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : null;
            $tlfFijo = isset($_REQUEST["tlfFijo"]) ? $_REQUEST["tlfFijo"] : null;
            $tlfMovil = isset($_REQUEST["tlfMovil"]) ? $_REQUEST["tlfMovil"] : null;
            $direccion = isset($_REQUEST["direccion"]) ? $_REQUEST["direccion"] : null;
            $cp = isset($_REQUEST["cpostal"]) ? $_REQUEST["cpostal"] : null;
            $sexo = isset($_REQUEST["sexo"]) ? $_REQUEST["sexo"] : null;
            $acepta = isset($_REQUEST["acepta"]) ? $_REQUEST["acepta"] : null;
            $conocido = isset($_REQUEST["conocido"]) ? $_REQUEST["conocido"] : null;
            $temas = isset($_REQUEST["temas"]) ? $_REQUEST["temas"] : null;
            $tipo = isset($_REQUEST["tipo"]) ? $_REQUEST["tipo"] : null;
            $btnEnviar = $_REQUEST["enviar"];

            $errores = array();

            if(usuarioValido($usuario)!="Valido") {
                $errores[] = usuarioValido($usuario);
            }
            if(contraValido($contra)!="Valido") {
                $errores[] = contraValido($contra);
            }
            if(nombreValido($nombre)!="Valido") {
                $errores[] = nombreValido($nombre);
            }
            if(correoValido($email)!="Valido") {
                $errores[] = correoValido($email);
            }
            if(fijoValido($tlfFijo)!="Valido") {                   
                $errores[] = fijoValido($tlfFijo);
            }
            if(movilValido($tlfMovil)!="Valido") {
                $errores[] = movilValido($tlfMovil);
            }
            if(direccionValido($direccion)!="Valido") {
                $errores[] = direccionValido($direccion);
            }
            if(cpValido($cp)!="Valido") {
                $errores[] = cpValido($cp);
            }
            if(sexoValido($sexo)!="Valido") {
                $errores[] = sexoValido($sexo);
            }
            if(aceptaValido($acepta)!="Valido") {
                $errores[] = aceptaValido($acepta);
            }
            if(conocidoValido($conocido)!="Valido") {
                $errores[] = conocidoValido($conocido);
            }
            if(temasValido($temas)!="Valido") {
                $errores[] = temasValido($temas);
            }
            if(tipoValido($tipo)!="Valido") {
                $errores[] = tipoValido($tipo);
            }

            if(empty($errores)) {

                $_SESSION["usuario"] = $usuario;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["correo"] = $email;
                $_SESSION["fijo"] = $tlfFijo;
                $_SESSION["movil"] = $tlfMovil;
                $_SESSION["direccion"] = $direccion;
                $_SESSION["cpostal"] = $cp;
                $_SESSION["sexo"] = $sexo;
                $_SESSION["conocido"] = $conocido;
                $_SESSION["temas"] = $temas;
                $_SESSION["tipo"] = $tipo;

                echo "<h3 style='color: blue;'>El formulario está correctamente validado y preparado para su envío</h3>";

                if(isset($btnEnviar)==1) {
                    header("Location: Resultados.php");
                    exit;
                }

            } else {
                echo "<ul style='color: red;'>";
                foreach ($errores as $error) {
                    echo "<li>".$error."</li>";
                }
                echo "</ul>";
            }
        ?>
    </body>
</html>