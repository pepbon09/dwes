<?php

function salarioMaximo($vector) {
    #Inicializo la variable del maximo con la menor cantidad posible
    $max=500;
    foreach ($vector as $nombre => $salario) {
        #Si el salario es mayor que la cantidad en max, se guardara este como el nuevo maximo
        if($salario>$max) {
            $max = $salario;
        }
    }
    #Devuelvo el valor del salario maximo
    return $max;
}

function salarioMinimo($vector) {
    #Inicializo la variable del minimo con la mayor cantidad posible
    $min=1250;
    foreach ($vector as $nombre => $salario) {
        #Si el salario es menor que la cantidad en min, se guardara este como el nuevo minimo
        if($salario<$min) {
            $min = $salario;
        }
    }
    #Devuelvo el valor del salario minimo
    return $min;
}

function salarioMedio($vector) {
    $salarioMedio=0;
    #Voy sumando todos los salarios
    foreach ($vector as $nombre => $salario) {
        $salarioMedio+=$salario;
    }
    #Y luego los divido entre 5
    $salarioMedio/=5;
    return $salarioMedio;
}

?>