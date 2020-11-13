<!DOCTYPE html>
<html>
    <head>
        <title>Formulario Biblioteca</title>
    </head>
    <body>
        <form action="JosepBonafont_ok.php" method="POST">
            <h1>Registrate</h1>
            <p>Nombre de usuario: </p>
            <input type="text" name="usuario"/>
            <p>Contraseña: </p>
            <input type="password" name="contra"/>
            <p>Nombre: </p>
            <input type="text" name="nombre"/>
            <p>Email: </p>
            <input type="text" name="email"/>
            <p>Tlf. Fijo </p>
            <input type="text" name="tlfFijo"/>
            <p>Tlf. Móvil </p>
            <input type="text" name="tlfMovil"/>
            <p>Dirección</p>
            <input type="text" name="direccion"/>
            <p>C.P.</p>
            <input type="text" name="cpostal"/>
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
            <select multiple name="temas[]">
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
                <input type="submit" value="Enviar"/>
                <input type="reset" value="Limpiar"/>
                <button type="button" onclick="validarFormulario()">Comprobar datos</button>
            </p>
        </form>
        <?php
            include 'JosepBonafont_v.php';

            function validarFormulario() {
                if(usuarioValido($_REQUEST["usuario"])!="Valido") {
                    echo usuarioValido($_REQUEST["usuario"]);
                }
                elseif(contraValido($_REQUEST["contra"])!="Valido") {
                    echo contraValido($_REQUEST["contra"]);
                }
                elseif(nombreValido($_REQUEST["nombre"])!="Valido") {
                    echo nombreValido($_REQUEST["nombre"]);
                }
                elseif(correoValido($_REQUEST["correo"])!="Valido") {
                    echo correoValido($_REQUEST["correo"]);
                }
                elseif(fijoValido($_REQUEST["tlfFijo"])!="Valido") {
                    echo fijoValido($_REQUEST["tlfFijo"]);
                }
                elseif(movilValido($_REQUEST["tlfMovil"])!="Valido") {
                    echo movilValido($_REQUEST["tlfMovil"]);
                }
                elseif(direccionValido($_REQUEST["direccion"])!="Valido") {
                    echo direccionValido($_REQUEST["direccion"]);
                }
                elseif(cpValido($_REQUEST["cpostal"])!="Valido") {
                    echo cpValido($_REQUEST["cpostal"]);
                }
                elseif(sexoValido($_REQUEST["sexo"])!="Valido") {
                    echo sexoValido($_REQUEST["sexo"]);
                }
                elseif(aceptaValido($_REQUEST["acepta"])!="Valido") {
                    echo aceptaValido($_REQUEST["acepta"]);
                }
                elseif(conocidoValido($_REQUEST["conocido"])!="Valido") {
                    echo conocidoValido($_REQUEST["conocido"]);
                }
                elseif(temasValido($_REQUEST["temas"])!="Valido") {
                    echo temasValido($_REQUEST["temas"]);
                }
                elseif(tipoValido($_REQUEST["tipo"])!="Valido") {
                    echo tipoValido($_REQUEST["tipo"]);
                }
            }

        ?>
    </body>
</html>