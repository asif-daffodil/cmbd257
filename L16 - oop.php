<?php
class myInfo
{
    public $name = "Asif Abir";
    public $city = "Dhaka";
    public const country = "Bangladesh";
    protected $phone = "01712345678";
    private $email = "abir@gmail.com";
    public static $age = 37;

    public function myAddress()
    {
        return "Hazaribagh, Dhaka-1209, " . $this->city;
    }

    public function __destruct()
    {
        echo "<br>This is a destructor";
    }

    public function __construct()
    {
        echo "This is a constructor<br>";
    }
}

$myInfoObj = new myInfo;
echo $myInfoObj->name;
echo "<br>";
echo $myInfoObj->city;
echo "<br>";
echo $myInfoObj->myAddress();
echo "<br>";
echo myInfo::country;
echo "<br>";
echo myInfo::$age;


class myChild extends myInfo
{
    public function myChildInfo()
    {
        return "My father's city is " . $this->city;
    }
}

echo "<br>";
$myChildObj = new myChild;
echo $myChildObj->myChildInfo();
