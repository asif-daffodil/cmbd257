<?php
require_once './class1.php';

use myNamespace1\myClass;

require_once './class2.php';

use myNamespace2\myClass as myClass2;

$myObj = new myClass();
$myObj2 = new myClass2();

echo $myObj->myInfo();
echo "<br>";
echo $myObj2->myInfo();
