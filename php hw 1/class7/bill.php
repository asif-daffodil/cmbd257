<?php
$units = 600;
if ($units <= 50) {
    $bill = $units * 3.50;
} elseif ($units > 50 && $units <= 150) {
    $bill = (50 * 3.50) + ($units - 50) * 4.00;
} elseif ($units > 150 && $units <= 250) {
    $bill = (50 * 3.50) + (100 * 4.00) + ($units - 50 - 100) * 5.20;
} elseif ($units > 250) {
    $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + ($units - 250) * 6.20;
}

echo $bill;
