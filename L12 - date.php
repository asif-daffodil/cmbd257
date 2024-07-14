<?php
date_default_timezone_set("Asia/Dhaka");
echo date("d/m/y D h:i:s a") . "<br>";
echo date("M-d-Y l H:i:s") . "<br>";
echo date("F-d-Y l h:i:s A") . "<br>";

// mktime(hour, minute, second, month, day, year)
$myTime = mktime(0, 0, 0, 9, 10, 2024);
echo date("d/m/y D", $myTime) . "<br>";

// strtotime(time)
$myTime2 = strtotime("now");
echo date("d/m/y D h:i:s a", $myTime2) . "<br>";

$myTime3 = strtotime("tomorrow");
echo date("d/m/y D h:i:s a", $myTime3) . "<br>";

$myTime4 = strtotime("next Sunday");
echo date("d/m/y D h:i:s a", $myTime4) . "<br>";

$myTime5 = strtotime("+3 years 2 months 1 day");
echo date("d/m/y D h:i:s a", $myTime5) . "<br>";
