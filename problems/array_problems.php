<?php
// Find maximum number from an array
$arr = [3, 1, 5, 9, 2, 7, 8, 4, 6];
$max = $arr[0];

for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $max) {
        $max = $arr[$i];
    }
}

echo "Maximum number is: " . $max . "<br>";

// Find 2nd max number from an array
$arr = [3, 1, 5, 9, 2, 7, 8, 4, 6];
$max = $arr[0];
$secondMax = $arr[0];

for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $max) {
        $secondMax = $max;
        $max = $arr[$i];
    } elseif ($arr[$i] > $secondMax) {
        $secondMax = $arr[$i];
    }
}
echo "Second maximum number is: " . $secondMax . "<br>";

$max = 9;
$secondMax = 8;

// Sort array from min to max
$arr = [34, 15, 51, 92, 27, 74, 85, 43, 61];
sort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";

// Calculate average number of an array
$arr = [3, 1, 5, 9, 2, 7, 8, 4, 6];
$sum = 0;
for ($i = 0; $i < count($arr); $i++) {
    $sum += $arr[$i];
}
$average = $sum / count($arr);
echo "Average number is: " . $average . "<br>";

// Merging 2 different types of array together
$arr1 = [3, 1, 5, 9, 2, 7, 8, 4, 6];
$arr2 = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];
$arr3 = array_merge($arr1, $arr2);
echo "<pre>";
print_r($arr3);
echo "</pre>";

// Search data from an array
$arr = [3, 1, 5, 9, 2, 7, 8, 4, 6];
echo in_array(5, $arr) ? "Data found" : "Data not found";
echo "<br>";

// strtoupper(), strtolower()
$cities = ['Dhaka', 'Chittagong', 'Sylhet', 'Khulna', 'Rajshahi'];
foreach ($cities as $city) {
    echo strtoupper($city) . "<br>";
}

foreach ($cities as $city) {
    echo strtolower($city) . "<br>";
}

// Get unique values
$arr = [3, 1, 5, 9, 2, 7, 8, 4, 6, 3, 1, 5, 9, 2, 7, 8, 4, 6];
$arr = array_unique($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";

// Merge 2 comma separated lists with unique value only
$list1 = "3, 1, 5, 9, 2, 7, 8, 4, 6";
$list2 = "3, 1, 5, 9, 2, 7, 8, 4, 6, 10, 11, 12, 13, 14, 15";
$arr1 = explode(", ", $list1);
$arr2 = explode(", ", $list2);
$arr3 = array_merge($arr1, $arr2);
$arr3 = array_unique($arr3);
echo "<pre>";
print_r($arr3);
echo "</pre>";

// Difference between 2 multi-dimensional arrays
$arr1 = [
    ['a', 'b', 'c'],
    ['d', 'e', 'f'],
    ['g', 'h', 'i']
];
$arr2 = [
    ['a', 'b', 'c'],
    ['d', 'e', 'f']
];
// $arr3 = array_diff($arr1, $arr2);
echo "<pre>";
print_r($arr3);
echo "</pre>";

// Check if all values are string or not
$arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];
function isAllString($arr)
{
    foreach ($arr as $value) {
        if (!is_string($value)) {
            return "Not all values are string";
        }
    }
    return "All values are string";
}
echo isAllString($arr);

// Filter out array data with some specific keys


$ages = [10, 20, 30, 40, 50, 60, 70, 80, 90];
$filteredAges = array_filter($ages, function ($age) {
    return $age > 50;
});

// Filter a multi-dimensional array
$students = [
    ['name' => 'John', 'age' => 20],
    ['name' => 'Doe', 'age' => 30],
    ['name' => 'Smith', 'age' => 40],
    ['name' => 'Alex', 'age' => 50],
    ['name' => 'Martin', 'age' => 60],
    ['name' => 'Stuart', 'age' => 70],
    ['name' => 'Micheal', 'age' => 80],
    ['name' => 'Robert', 'age' => 90],
    ['name' => 'William', 'age' => 100],
];
$filteredStudents = array_filter($students, function ($student) {
    return $student['age'] > 50;
});
echo "<pre>";
print_r($filteredStudents);
echo "</pre>";

// Remove all white spaces from an array
$arr = ['   a  ', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];
$arr = array_map('trim', $arr);
echo "<pre>";
print_r($arr);
echo "</pre>";

$x = [2, 4, 6];
function square($n)
{
    return $n * $n;
}
$y = array_map('square', $x);
echo "<pre>";
print_r($y);
echo "</pre>";

// ombine 2 array and use one array data as keys and others as values
$names = ['John', 'Doe', 'Smith', 'Alex', 'Martin'];
$ages = [20, 30, 40, 50, 60];
$combined = array_combine($names, $ages);
echo "<pre>";
print_r($combined);
echo "</pre>";

// Convert string to array
$str = "Ami vaat khai";
$arr = explode(" ", $str);
echo "<pre>";
print_r($arr);
echo "</pre>";
