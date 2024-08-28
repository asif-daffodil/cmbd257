<?php
abstract class myClass
{
    public string $name = "Asif Abir";
    public array $newProperties = [];

    public function __construct()
    {
        return "";
    }

    abstract public function myInfo(): string;

    // Magic methods

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } elseif (array_key_exists($property, $this->newProperties)) {
            return $this->newProperties[$property];
        } else {
            return "$property property does not exist";
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            $this->newProperties[$property] = $value;
        }
    }
}

// interface myInterface

interface myInterface
{
    public function myOtherInfo(): void;
    public function myOtherInfo2(string $msg): string;
}

final class myInfo extends myClass implements myInterface
{
    public function myInfo(): string
    {
        return "My name is " . $this->name;
    }

    public function myOtherInfo(): void
    {
        echo "This is my other info";
    }

    public function myOtherInfo2(string $msg = "Other info 2 message"): string
    {
        return $msg;
    }
}

$myInfoObj = new myInfo;
$myInfoObj->name = "Shohag Rana";
echo $myInfoObj->myInfo() . "<br>";
$myInfoObj->myOtherInfo() . "<br>";
echo $myInfoObj->myOtherInfo2() . "<br>";
echo $myInfoObj->phone;
$myInfoObj->gender = "Male";
echo "<pre>";
print_r($myInfoObj->newProperties);
echo "</pre>";
echo $myInfoObj->gender;
