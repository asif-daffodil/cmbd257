<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="color: red">
        <?php
        echo "Hello World!<br>", "Hello World 2!<br>", "Hello World 3!<br>";
        print "<b>Hello World!</b>";
        if (print("Hello World 4!")) {
            echo "Print function return true";
        }
        echo "<br>";
        var_dump("Hello World");
        echo "<br>";
        var_dump(123);
        echo "<br>";
        var_dump(123.45);
        echo "<br>";
        var_dump(true);
        echo "<br>";
        var_dump([1, 2, 3]);
        echo "<br>";
        class Person
        {
            public $name = "John";
        }
        $person = new Person();
        var_dump($person);
        echo "<br>";
        var_dump(null);
        echo "<br>";
        // resource
        $file = fopen("test.txt", "r");
        var_dump($file);
        echo "<br>";

        // Variables - Start with $, letter or _, case sensitive, no number at start
        $name = "John";
        echo $name;
        echo "<br>";
        // constants
        define("city", "Dhaka");
        echo city;

        // single line comment
        # single line comment
        /*
        multi 
        line 
        comment
        */
        ?>
    </div>
</body>

</html>