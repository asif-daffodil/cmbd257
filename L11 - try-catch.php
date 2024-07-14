<?php
$x = 6;

try {
    if ($x > 5) {
        throw new Exception("kaaz hoynai");
    }
    echo "kaaz hoise";
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<br>";

class MyException extends Exception
{
    public function errorMessage()
    {
        $this->getMessage();
    }
}

try {
    if ($x > 10) {
        throw new MyException("kaaz hoinai");
    }
    echo "kaaz hoise";
} catch (MyException $me) {
    echo $me->errorMessage();
}

echo "<br>";

filter_var(123, FILTER_VALIDATE_URL);

$associativeArr = ["name" => "asif", "age" => 25, "location" => "Dhaka"];

echo json_encode($associativeArr);

echo "<br>";

// json decode
$json = '{"name":"asif","age":25,"location":"Dhaka"}';
$decoded = json_decode($json, true);
echo "<pre>";
print_r($decoded);
echo "</pre>";
