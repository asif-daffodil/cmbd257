<?php
// chaeck type is string or number
$x = 3;
if (is_numeric($x)) {
    echo "$x is a number";
} elseif (is_string($x)) {
    echo "$x is a string";
} else {
    echo "Not a number or string";
}

echo "<br>";

// for, foreach, while, do, do while

// starting point, incremtnet, endpoint

$sp = 1;
do {
    echo $sp . "<br>";
    $sp += 2;
} while ($sp <= 10);

echo "<br>";

for ($i = 0; $i < 10; $i++) {
    echo $i . "<br>";
}

//  array
// indexed array
// associative array
// multidimensional array

// $names = array("John", "Doe", "Jane");
$names = ["John", "Doe", "Jane"];
echo $names[2] . "<br>";
$banglaNames = ["আবুল", "বাবুল", "কাবুল"];

foreach ($names as $chacha) {
    echo $chacha . "<br>";
}

$person = ["name" => "John", "age" => 45, "city" => "Dhaka"];
echo $person["city"];

echo "<br>";

// multidimensional array
$persons = [
    ["Abul", 45, "Dhaka"],
    ["Babul", 35, "Chittagong"],
    ["Kabul", 25, "Sylhet"]
];

echo $persons[2][2] . "<br>";
echo "<pre>";
print_r($persons);
echo "</pre>";

//  in_array()
var_dump(is_array($sp));

// array_merge()
$mergedName = array_merge($names, $banglaNames);
echo "<pre>";
print_r($mergedName);
echo "</pre>";

// array_keys()
$keys = array_keys($person);
echo "<pre>";
print_r($keys);
echo "</pre>";

// array_key_exists
var_dump(array_key_exists("country", $person));

array_shift($names);
array_unshift($names, "Kabul");
array_pop($names);
array_push($names, "Abdul");
echo "<pre>";
print_r($names);
echo "</pre>";

// array_map()
function myFunc($n)
{
    return $n * $n;
}
$numbers = [1, 2, 3, 4, 5];
$squaredNumbers = array_map("myFunc", $numbers);
echo "<pre>";
print_r($squaredNumbers);
echo "</pre>";

// array_unique()
$city = ["Dhaka", "Chittagong", "Dhaka", "Sylhet", "Chittagong", "Dhaka"];
$uniqueCities = array_unique($city);
echo "<pre>";
print_r($uniqueCities);
echo "</pre>";

// array_diff

$countries = ["Bangladesh", "India", "Pakistan", "Nepal"];
array_slice($countries, 1, 2);
