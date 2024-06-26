<?php
$man = "male";
$age = 21;
if ($man == "male" && $age < 21) {
    echo "You are not qualified for married!";
} elseif ($man == "male" && $age >= 21) {
    echo "You are qualified for married!";
} elseif ($man == "female" && $age < 18) {
    echo "You are not qualified for married!";
} elseif ($man == "female" && $age >= 18) {
    echo "You are qualified for married!";
}

if ($man == "male") {
    if ($age < 21) {
        echo "You are not qualified for married!";
    } else {
        echo "You are qualified for married!";
    }
} elseif ($man = "female") {
    if ($age < 18) {
        echo "You are not qualified for married!";
    } else {
        echo "You are qualified for married!";
    }
}
