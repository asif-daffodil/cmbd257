<?php
// $GLOBALS
$x = 5;
$y = 10;
function sum()
{
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

sum();
echo $z;

// $_SERVER
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

echo $_SERVER['HTTP_HOST'];
echo $_SERVER['PHP_SELF'];
?>

<form action="" method="get">
    <input type="text" name="name">
    <input type="submit" value="Submit">
</form>