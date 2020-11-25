<?php

function usuarioValido($usuario) {
    if ($usuario == "") {
        return "El campo Usuario esta vacio";
    } elseif (!ctype_alnum($usuario)) {
        return "El campo Usuario contiene caracteres invalidos (solo letras y numeros)";
    } else {
        return "Valido";
    }
}

function contraValido($contra) {
    if ($contra == "") {
        return "El campo Contraseña esta vacio";
    } elseif (strlen($contra)<6) {
        return "El campo Contraseña debería incluir al menos 6 caracteres";
    } else {
        return "Valido";
    }
}

function nombreValido($nombre) {
    if ($nombre == "") {
        return "El campo Nombre esta vacio";
    } elseif (!ctype_alpha(str_replace(' ','',$nombre))) {
        return "El campo Nombre contiene caracteres invalidos (solo letras)";
    } else {
        return "Valido";
    }
}

function correoValido($correo) {
    if ($correo == "") {
        return "El campo Correo esta vacio";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return "El campo Correo no es una dirección valida ";
    } else {
        return "Valido";
    }
}

function fijoValido($fijo) {
    if ($fijo == "") {
        return "El campo Fijo esta vacio";
    } elseif (!ctype_digit($fijo)) {
        return "El campo Fijo contiene caracteres invalidos (solo numeros) ";
    } else {
        preg_match("/^96\d{7}/", $fijo, $coFijo, PREG_OFFSET_CAPTURE);
        if (empty($coFijo)) {
            return "El campo Fijo no es valido (debe ser de la C. Valenciana, empieza por 96 y contiene 9 digitos)";
        } else {
            return "Valido";
        }
    }
}

function movilValido($movil) {
    if ($movil == "") {
        return "El campo Movil esta vacio";
    } elseif (!ctype_digit($movil)) {
        return "El campo Movil contiene caracteres invalidos (solo numeros) ";
    } else {
        preg_match("/^6\d{8}/", $movil, $coMovil, PREG_OFFSET_CAPTURE);
        if (empty($coMovil)){
            return "El campo Movil no es un numero de telefono invalido (empieza por 6 y contiene 9 digitos)";
        } else {
            return "Valido";
        }
    }
}

function direccionValido($direccion) {
    if ($direccion == "") {
        return "El campo dirección esta vacio";
    } elseif (!ctype_alnum(str_replace(' ','',$direccion))) {
        return "El campo dirección contiene caracteres invalidos (solo letras y numeros)";
    } else {
        return "Valido";
    }
}

function cpValido($cp) {
    if ($cp == "") {
        return "El campo c.p. esta vacio";
    } elseif (!ctype_digit($cp)) {
        return "El campo c.p. contiene caracteres invalidos (solo numeros) ";
    } else {
        preg_match("/^46\d{3}/", $cp, $coCP, PREG_OFFSET_CAPTURE);
        if (empty($coCP)) {
            return "El campo c.p. no es valido (debe ser de la C.Valenciana, empieza por 46 y contiene 5 digitos)";
        } else {
            return "Valido";
        }
    }
}

function sexoValido($sexo) {
    if ($sexo == "") {
        return "El campo sexo esta vacio";
    } else {
        return "Valido";
    }
}

function aceptaValido($acepta) {
    if (empty($acepta)) {
        return "No has aceptado nuestro LOPDGDD";
    } else {
        return "Valido";
    }
}

function conocidoValido($conocido) {
    if (empty($conocido)) {
        return "No has seleccionado ninguna opcion de donde nos has conocido";
    } else {
        return "Valido";
    }
}

function temasValido($temas) {
    if (empty($temas)) {
        return "No has seleccionado ninguna opcion de los temas que prefieres";
    } else {
        return "Valido";
    }
}

function tipoValido($tipo) {
    if ($tipo == "") {
        return "No has seleccionado ningun tipo de usuario ";
    } else {
        return "Valido";
    }
}

?>