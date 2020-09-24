<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Josep PHP</title>
        <style>
            th,td {
                border: 1px solid;
            }
            .verde {
                color: green;
            }
            .rojo {
                color: red;
            }
            .ambar {
                color: #f5bf42;
            }
        </style>
    </head>
    <body>
        <!---Ejercicio 1--->
        <p> Hola <?php $nombre="Pep"; echo "$nombre"; ?>, encantado de conocerte!</p>
        <hr/>
        <!---Ejercicio 2--->
        <p> <?php $nombre="Pep"; echo 'Hola ' . $nombre; ?>, encantado de conocerte!</p>
        <hr/>
        <!---Ejercicio 3--->
        <p> <?php $nombre="Pep"; echo 'Hola <strong>' . $nombre . '</strong>'; ?>, encantado de conocerte!</p>
        <p> Gracias por la visita! </p>
        <hr/>
        <!---Ejercicio 4--->
        <form method="get">
            <p><label>Numero 1</label><input type="number" name="num1" min="1"/></p>
            <p><label>Numero 2</label><input type="number" name="num2" min="1"/></p>
            <input type="submit" value="Calcular"/>
        </form>
        <br/>
        <?php
            $num1=$_GET["num1"];
            $num2=$_GET["num2"];
            echo '<p>' . $num1 . ' + ' . $num2 . ' = ' . ($num1+$num2) . ' </p>';
            echo '<p>' . $num1 . ' - ' . $num2 . ' = ' . ($num1-$num2) . ' </p>';
            echo '<p>' . $num1 . ' * ' . $num2 . ' = ' . ($num1*$num2) . ' </p>';
            echo '<p>' . $num1 . ' / ' . $num2 . ' = ' . ($num1/$num2) . ' </p>';
        ?>
        <hr/>
        <!---Ejercicio 5--->
        <table>
                <?php
                    $a=5;
                    $b=7;
                    $c=2;
                    $d='1 numero';
                ?>
            <tr>
                <th colspan="2">Comparación</th>
                <th>Resultado</th>
            </tr>
            <tr>
                <td>5 < 7</td>
                <td>5 es menor que 7</td>
                <td><?php if($a<$b) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 > 7</td>
                <td>5 es mayor que 7</td>
                <td><?php if($a>$b) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 <= 7</td>
                <td>5 es menor o igual que 7</td>
                <td><?php if($a<=$b) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 >= 7</td>
                <td>5 es mayor o igual que 7</td>
                <td><?php if($a>=$b) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 == 7</td>
                <td>5 es igual que 7</td>
                <td><?php if($a==$b) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 != 7</td>
                <td>5 no es igual que 7</td>
                <td><?php if($a!=$b) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="2">Comparación</th>
                <th>Resultado</th>
            </tr>
            <tr>
                <td>2 < '1 numero'</td>
                <td>2 es menor que '1 numero'</td>
                <td><?php if($c<$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>2 > '1 numero'</td>
                <td>2 es mayor que '1 numero'</td>
                <td><?php if($c>$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>2 <= '1 numero'</td>
                <td>2 es menor o igual que '1 numero'</td>
                <td><?php if($c<=$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>2 >= '1 numero'</td>
                <td>2 es mayor o igual que '1 numero'</td>
                <td><?php if($c>=$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>2 == '1 numero'</td>
                <td>2 es igual que '1 numero'</td>
                <td><?php if($c==$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>2 != '1 numero'</td>
                <td>2 no es igual que '1 numero'</td>
                <td><?php if($c!=$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
        </table>
        <hr/>
        <!---Ejercicio 6--->
        <table>
            <tr>
                <th colspan="2">Comparación</th>
                <th>Resultado</th>
            </tr>
            <tr>
                <td>5 > 7 || 2 > '1 numero'</td>
                <td>5 es mayor que 7 o 2 es mayor que '1 numero'</td>
                <td><?php if($a>$b || $c>$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 > 7 || 2 < '1 numero'</td>
                <td>5 es mayor que 7 o 2 es menor que '1 numero'</td>
                <td><?php if($a>$b || $c<$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 <= 7 && 2 >= '1 numero'</td>
                <td>5 es menor o igual que 7 y 2 es mayor o igual que '1 numero'</td>
                <td><?php if($a<=$b && $c>=$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 <= 7 && 2 <= '1 numero'</td>
                <td>5 es menor o igual que 7 y 2 es menor o igual que '1 numero'</td>
                <td><?php if($a<=$b && $c<=$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 != 7 !! 2 == '1 numero'</td>
                <td>5 no es igual que 7 o 2 es igual que '1 numero', pero no ambos</td>
                <td><?php if($a!=$b xor $c==$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
            <tr>
                <td>5 != 7 !! 2 != '1 numero'</td>
                <td>5 no es igual que 7 o 2 no es igual que '1 numero', pero no ambos</td>
                <td><?php if($a!=$b xor $c!=$d) {echo 'true';} else{echo 'false';} ?></td>
            </tr>
        </table>
        <hr/>
        <!---Ejercicio 7--->
        <form>
            <p>
                <label>Numero decimal:</label>
                <input type="text" name="decimal"/>
            </p>
            <input type="submit" value="Redondear"/>
        </form>
            <?php
                $decimal=$_GET["decimal"];
                $decimal=round($decimal);
                echo '<p> Resultado: ' . $decimal . '</p>';
            ?>
        <hr/>
        <!---Ejercicio 8--->
        <form>
            <p><label>Numero 1</label><input type="number" name="med1"/></p>
            <p><label>Numero 2</label><input type="number" name="med2"/></p>
            <p><label>Numero 3</label><input type="number" name="med3"/></p>
            <p><label>Numero 4</label><input type="number" name="med4"/></p>
            <p><label>Numero 5</label><input type="number" name="med5"/></p>
            <input type="submit" value="Sacar Media"/>
        </form>
            <?php
                $med1=$_GET["med1"];
                $med2=$_GET["med2"];
                $med3=$_GET["med3"];
                $med4=$_GET["med4"];
                $med5=$_GET["med5"];
                $media=round(($med1+$med2+$med3+$med4+$med5)/5);
                echo '<p> La media es de ' . $media . '</p>';
            ?>
        <hr/>
        <!---Ejercicio 9--->
        <form>
            <p><label>Numero 1</label><input type="number" name="ord1" value="1"/></p>
            <p><label>Numero 2</label><input type="number" name="ord2" value="2"/></p>
            <p><label>Numero 3</label><input type="number" name="ord3" value="3"/></p>
            <input type="submit" value="Ordenar"/>
        </form>
            <?php
                $ord1=$_GET["ord1"];
                $ord2=$_GET["ord2"];
                $ord3=$_GET["ord3"];

                if($ord1 == $ord2 || $ord1 == $ord3 || $ord2 == $ord3) {
                    echo "<script type='text/javascript'>alert('Has escogido 2 o mas numeros iguales');</script>";
                } else {
                    $nums = array($ord1, $ord2, $ord3);
                    rsort($nums);
                    foreach ($nums as $num) {
                        echo $num . ' ';
                    }
                }
            ?>
        <hr/>
        <!---Ejercicio 10--->
        <h1>
            <?php 
                $al=rand(1,100);
                echo $al . '</h1>';
            
                if($al>50) {
                    echo "<p class='verde'> Mayor </p>";
                } elseif ($al<50) {
                    echo "<p class='rojo'> Menor </p>";
                } else {
                    echo "<p class='ambar'> Igual </p>";
                }
            ?>
        <hr/>
        <!---Ejercicio 11--->
        <p>Hoy es: </p>
        <?php
            echo "<h1> " . date("j") . " </h1>";

            if (date("j")<=15) {
                echo "<p> Primera Quincena </p>";
            } else {
                echo "<p> Segunda Quincena </p>";
            }
        ?>
        <hr/>
        <!---Ejercicio 12--->
        <p>La cantidad es de <?php $precio=rand(10,90); echo $precio;?>€ </p>
        <hr/>
        <!---Ejercicio 13--->
        <?php
            $numero=rand(1,5);
            echo '<p> ' . $numero . '-';

            switch ($numero) {
                case 1:
                    echo 'uno';
                    break;
                case 2:
                    echo 'dos';
                    break;
                case 3:
                    echo 'tres';
                    break;
                case 4:
                    echo 'cuatro';
                    break;
                case 5:
                    echo 'cinco';
                    break;
                default:
                    echo 'si';
                    break;
            }

            echo '</p>';
        ?>
        <hr/>
        <!---Ejercicio 14--->
        <?php
            $color = rand(0,2);
            echo "";
            switch ($color) {
                case 0:
                    echo "<div style='width: 60px; height: 60px;background-color: green;'><p>PASE</p></div>";
                    break;
                case 1:
                    echo "<div style='width: 60px; height: 60px;background-color: red;'><p>ALTO</p></div>";
                    break;
                case 2:
                    echo "<div style='width: 60px; height: 60px;background-color: #f5bf42;'></div>";
                    break;
            }
        ?>
        <hr/>
        <!---Ejercicio 15--->
        <form>
            <p><label>Numero: </label><input type="number" name="tabla"/></p>
            <input type="submit" value="Sacar Tabla de multiplicar"/>
        </form>
            <?php
                $ntabla=$_GET["tabla"];

                for ($i=1; $i<11 ; $i++) { 
                    echo "<p> " . $ntabla . " * " . $i . " = " . ($ntabla*$i) . " </p>";
                }
            ?>
    </body>
</html>