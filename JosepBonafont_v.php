<?php

function usuarioValido($usuario) {
    if ($usuario == "") {
        return "<p>El campo usuario esta vacio</p>";
    } elseif (!ctype_alnum($usuario)) {
        return "<p>El campo usuario contiene caracteres invalidos (solo letras y numeros)</p>";
    } else {
        return "Valido";
    }
}

function contraValido($contra) {
    if ($contra == "") {
        return "<p>El campo contraseña esta vacio</p>";
    } elseif (strlen($contra)<6) {
        return "<p>El campo contraseña debería incluir al menos 6 caracteres</p>";
    } else {
        return "Valido";
    }
}

function nombreValido($nombre) {
    if ($nombre == "") {
        return "<p>El campo nombre esta vacio</p>";
    } elseif (!ctype_alpha(str_replace(' ','',$nombre))) {
        return "<p>El campo usuario contiene caracteres invalidos (solo letras)</p>";
    } else {
        return "Valido";
    }
}

function correoValido($correo) {
    if ($correo == "") {
        return "<p>El campo correo esta vacio</p>";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return "<p>El campo correo no es una dirección valida </p>";
    } else {
        return "Valido";
    }
}

function fijoValido($fijo) {
    if ($fijo == "") {
        return "<p>El campo fijo esta vacio</p>";
    } elseif (!ctype_digit($fijo)) {
        return "<p>El campo fijo contiene caracteres invalidos (solo numeros) </p>";
    } elseif (preg_match()) {
        return "<p>El campo fijo no empieza por 96 </p>";
    } else {
        return "Valido";
    }
}

function movilValido($movil) {
    if ($movil == "") {
        return "<p>El campo movil esta vacio</p>";
    } elseif (!ctype_digit($movil)) {
        return "<p>El campo movil contiene caracteres invalidos (solo numeros) </p>";
    } else {
        return "Valido";
    }
}

function direccionValido($direccion) {
    if ($direccion == "") {
        return "<p>El campo dirección esta vacio</p>";
    } elseif (!ctype_alnum($direccion)) {
        return "<p>El campo dirección contiene caracteres invalidos (solo letras y numeros)</p>";
    } else {
        return "Valido";
    }
}

function cpValido($cp) {
    if ($cp == "") {
        return "<p>El campo c.p. esta vacio</p>";
    } elseif (!ctype_digit($cp)) {
        return "<p>El campo c.p. contiene caracteres invalidos (solo numeros) </p>";
    } elseif (preg_match()) {
        return "<p>El campo c.p. no empieza por 46 </p>";
    } else {
        return "Valido";
    }
}

function sexoValido($sexo) {
    if ($sexo == "") {
        return "<p>El campo sexo esta vacio</p>";
    } else {
        return "Valido";
    }
}

function aceptaValido($acepta) {
    if (empty($acepta)) {
        return "<p>No has aceptado nuestro LOPDGDD</p>";
    } else {
        return "Valido";
    }
}

function conocidoValido($conocido) {
    if (empty($conocido)) {
        return "<p>No has seleccionado ninguna opcion de donde nos has conocido</p>";
    } else {
        return "Valido";
    }
}

function temasValido($temas) {
    if (empty($temas)) {
        return "<p>No has seleccionado ninguna opcion de los temas que prefieres</p>";
    } else {
        return "Valido";
    }
}

function tipoValido($tipo) {
    if ($tipo == "") {
        return "<p>No has seleccionado ningun tipo de usuario </p>";
    } else {
        return "Valido";
    }
}

?>