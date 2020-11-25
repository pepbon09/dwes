<!DOCTYPE html>
<html>
    <head>
        <title>Formulario Biblioteca</title>
    </head>
    <body>
        <form action="JosepBonafont.php" method="POST">
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
            <input type="checkbox" name="conocido[]" value="Web"/> Web
            <input type="checkbox" name="conocido[]" value="Prensa"/> Prensa
            <input type="checkbox" name="conocido[]" value="Conocidos"/> Conocidos
            <input type="checkbox" name="conocido[]" value="Otro"/> Otro
            <p>¿Que temas te interesan mas?</p>
            <select multiple size="5" name="temas[]">
                <option value="Historica">Histórica</option>
                <option value="Misterio">Misterio</option>
                <option value="Romantica">Romántica</option>
                <option value="Terror">Terror</option>
                <option value="Comic">Comic</option>
            </select>
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
            include 'JosepBonafont_v.php';

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

            if(empty($errores) && isset($btnEnviar)==1) {
                header('location: JosepBonafont_ok.php?usuario='.$usuario.'&nombre='.$nombre.'&email='.$email.'&tlfFijo='.$tlfFijo.'&tlfMovil='.$tlfMovil.'&direccion='.$direccion.'&cpostal='.$cp.'&sexo='.$sexo.'&tipo='.$tipo);
                exit;
            } else {
                echo "<ul style='color: #f00;'>";
                foreach ($errores as $error) {
                    echo "<li>".$error."</li>";
                }
                echo "</ul>";
            }

        ?>
    </body>
</html>