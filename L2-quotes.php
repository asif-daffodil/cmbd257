<?php
$city = "Dhaka";
echo "Hello $city! <br>";
echo 'Hello ' . $city . ' 2! <br>';

// Arithmetic operators
/**
 * +
 * -
 * *
 * /
 * %
 * **
 */

//  Logical operators
/**
 * and
 * &&
 * or
 * ||
 * !
 */

// Comparison operators
/**
 * ==
 * ===
 * !=
 * !==
 * >
 * <
 * >=
 * <=
 */

// Operator precedence
/**
 * ()
 * **
 * * / %
 * + -
 * = += -= *= /=
 */

//  Mathematical functions
/**
 * abs()
 * ceil()
 * floor()
 * round()
 * max()
 * min()
 * pow()
 * sqrt()
 */

//  Control Statements
$age = 45;
if ($age <= 12 && $age >= 0) {
    echo "You are a child";
} elseif ($age > 12 && $age <= 19) {
    echo "You are a teenager";
} elseif ($age > 19 && $age <= 30) {
    echo "You are an young adult";
} elseif ($age > 30 && $age <= 50) {
    echo "You are an adult";
} elseif ($age > 50 && $age <= 140) {
    echo "You are an old person";
} else {
    echo "You are not a human";
}
echo "<br>";
// switch case
$day = "Wednesday";
switch ($day) {
    case "Saturday":
        echo "Today is Saturday";
        break;
    case "Sunday":
        echo "Today is Sunday";
        break;
    case "Monday":
        echo "Today is Monday";
        break;
    case "Tuesday":
        echo "Today is Tuesday";
        break;
    case "Wednesday":
        echo "Today is Wednesday";
        break;
    case "Thursday":
        echo "Today is Thursday";
        break;
    case "Friday":
        echo "Today is Friday";
        break;
    default:
        echo "Invalid day";
}

echo "<br>";

//  ternary operator    
$age = 20;
echo $age > 18 ? "You are an adult" : "You are not an adult";

// A PHP calculator using switch case (Addition, Subtraction, Multiplication, Division)

echo $country ?? null;
