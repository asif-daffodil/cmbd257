<form action="" method="POST">
    <input type="text" name="userName" placeholder="Your Name">
    <input type="submit" value="Submit">
</form>

<?php
$userName = $_POST['userName'] ?? null;
echo $userName;

// $_ENV
$_ENV['DB_HOST'] = "localhost";
$_ENV['myName'] = "Asif Abir";

echo "<pre>";
print_r($_ENV);
echo "</pre>";

echo $_ENV['myName'];

$arr = [];
$arr['city'] = "Dhaka";
$arr['country'] = "Bangladesh";

echo "<pre>";
print_r($arr);
echo "</pre>";

?>