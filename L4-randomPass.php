<?php
// random password
$uppercase_letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$lowercase_letters = "abcdefghijklmnopqrstuvwxyz";
$numbers = "0123456789";
$symbols = "!@#$%^&*()_+";

echo str_shuffle(substr(str_shuffle($uppercase_letters), 0, 2) . substr(str_shuffle($lowercase_letters), 0, 2) . substr(str_shuffle($numbers), 0, 2) . substr(str_shuffle($symbols), 0, 2));

echo "<br>";
echo uniqid();
echo "<br>";
echo rand(100000, 999999);

// 
echo "<br>";
echo ceil(5.2);
echo "<br>";
echo floor(5.8);
echo "<br>";
echo round(5.4);
echo "<br>";
echo abs(-5);
echo "<br>";
echo max(5, 10, 15);

// Incrementing and decrementing
echo "<br>";
$a = 5;
--$a;
$a += 2;
echo $a;
echo "<br>";

trim("Hello World");
echo stripslashes("/kazz korena/");
echo "<br>";
echo htmlspecialchars("<h1>Hello World</h1>");

// str functions
echo "<br>";
echo strlen("Hello World");
$myArr = explode(" ", "Hello World");
$totalCar = 0;
echo "<br>";
foreach ($myArr as $word) {
    $totalCar += strlen($word);
}
echo $totalCar;
echo "<br>";
echo str_replace("World", "Bangladesh", "Hello World");
echo "<br>";
echo substr("Hello World", 6, 5);
echo "<br>";
echo strtolower("Hello World");
echo "<br>";
echo strtoupper("Hello World");
echo "<br>";
echo ucfirst("hello world");
echo "<br>";
echo ucwords("hello world");
echo "<br>";
echo str_repeat("Hello World ", 3);
echo "<br>";
echo strrev("Hello World");

// function
echo "<br>";
function myFunc($age = 15, $name = "Mokles")
{
    if ($age >= 18) {
        return "Welcome $name<br>";
    }
    return "Sorry $name, you are not allowed<br>";
}

echo myFunc(16, "Aslam");
echo myFunc(19, "Ashfaq");
echo myFunc();
echo myFunc(20);
echo myFunc(name: "Kamal", age: 20);
