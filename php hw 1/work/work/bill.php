<?php
function calculateElectricBill($units) {
    $rate1 = 3.50; 
    $rate2 = 4.00; 
    $rate3 = 5.20; 
    $rate4 = 6.50; 

    if ($units <= 50) {
        $bill = $units * $rate1;
    } elseif ($units <= 150) {
        $bill = (50 * $rate1) + (($units - 50) * $rate2);
    } elseif ($units <= 250) {
        $bill = (50 * $rate1) + (100 * $rate2) + (($units - 150) * $rate3);
    } else {
        $bill = (50 * $rate1) + (100 * $rate2) + (100 * $rate3) + (($units - 250) * $rate4);
    }

    return $bill;
}


$units = 300; 
$bill = calculateElectricBill($units);
echo "The total electric bill for $units units is: ৳" . number_format($bill, 2);
?>
