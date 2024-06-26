<?php
// Regular expression (RegEx)
$tel = "01712345678";
$pattern = "/^01[0-9]{9}$/";
var_dump(preg_match($pattern, $tel));
echo "<br>";
var_dump(preg_match("/world/", "world"));
echo "<br>";
var_dump(preg_match("/123/", "123"));
echo "<br>";
var_dump(preg_match("/[0-9]/", "123"));
echo "<br>";
var_dump(preg_match("/^1/", "123"));
echo "<br>";
var_dump(preg_match("/3$/", "123"));
echo "<br>";
var_dump(preg_match("/[0-9]{3}/", "123"));
echo "<br>";

$email = "abir@gmail.com";
$emailPattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
var_dump(preg_match($emailPattern, $email));
echo "<br>";

// strong password
$password = "Abc@1234";
$passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&*()_+])[a-zA-Z0-9@#$%^&*()_+]{8,}$/";
var_dump(preg_match($passwordPattern, $password));
echo "<br>";
var_dump(preg_match("/^[A-Za-z. ]*$/", "Asif Abir"));
