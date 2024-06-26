<?php
$num1 = 20;
$num2 = 30;
$operapor = "Multiplication";
switch ($operapor) {
    case 'Addition';
        echo $num1 + $num2;
        break;
    case 'Subtraction';
        echo $num1 - $num2;
        break;
    case 'Multiplication';
        echo $num1 * $num2;
        break;
    case 'Division';
        echo $num1 / $num2;
        break;
}
