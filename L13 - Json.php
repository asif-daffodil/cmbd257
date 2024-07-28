<script>
    const myData = {
        name: "John",
        age: 30,
        city: "New York"
    };

    console.log(JSON.stringify(myData));
    console.log(JSON.parse('{"name":"John","age":30,"city":"New York"}'));
</script>

<?php
$myData = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];

echo json_encode($myData);
echo "<br>";
print_r(json_decode('{"name":"John","age":30,"city":"New York"}', true));

?>