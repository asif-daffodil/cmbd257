<?php
// Object Cloning
// When we clone an object, a new object is created with the same properties and methods as the original object.
// To clone an object, use the clone keyword:

class myClass
{
    public $name = "Asif Abir";

    public function myInfo(): string
    {
        return "My name is " . $this->name;
    }
}

$myObj = new myClass();

$cloneObj = clone $myObj;

echo $cloneObj->myInfo(); // Output: My name is Asif Abir

// Comparing Objects
// To compare two objects, use the == operator:

class myClass2
{
    public $name = "Asif Abir";

    public function myInfo(): string
    {
        return "My name is " . $this->name;
    }
}

$myObj2 = new myClass2();
echo "<br>";
if ($cloneObj == $myObj) {
    echo "They are the same";
} else {
    echo "They are not the same";
}

// Late Static Bindings

class myClass3
{
    public static $name = "Abir";
    public static function myInfo(): string
    {
        return "My name is " . self::$name;
    }
}

echo "<br>";
echo myClass3::myInfo();

// Objects and references
// When an object is passed as an argument to a function, the function receives a reference to the object.
echo "<br>";
class myClass4
{
    public $name = "Asif Abir";
    public function myInfo(): string
    {
        return "My name is " . $this->name;
    }
}

function myFunction(myClass4 $obj)
{
    $obj->name = "Mohammad";
    echo $obj->myInfo();
}

$myObj4 = new myClass4();
myFunction($myObj4);


// Object Serialization
// Serialization is the process of converting an object into a string.
// To serialize an object, use the serialize() function:

class myClass5
{
    public $name = "Asif Abir";
    public function myInfo(): string
    {
        return "My name is " . $this->name;
    }
}

$myObj5 = new myClass5();
$serializedObj = serialize($myObj5);
echo "<br>";
echo $serializedObj;

// Traits
// Traits are a mechanism for code reuse in single inheritance languages such as PHP.

trait myTrait
{
    public function myInfo(): string
    {
        return "My name is AA";
    }
}

class myClass6
{
    use myTrait;
}

$myObj6 = new myClass6();
echo "<br>";
echo $myObj6->myInfo();

// Namespace
// Namespaces are used to avoid name collisions between classes, interfaces, functions, and constants.
// To declare a namespace, use the namespace keyword:


// Exceptions
// Exceptions are used to handle errors in PHP.
// To throw an exception, use the throw keyword:

class myClass7
{
    public function myFunction(int $num): int
    {
        if ($num <= 1) {
            throw new Exception("Number must be greater than 1");
        }
        return $num;
    }
}

$myObj7 = new myClass7();
try {
    echo "<br>";
    echo $myObj7->myFunction(1);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
