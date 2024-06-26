<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Bill Assignment</title>
</head>
<body>
   <h3>i. Electrick Bill Calculator NO </h3> 
        <?php
                $units=120;
                if($units<=50){
                    $bill = $units * 3.50;

                } elseif($units>50 && $units<=150){
                    $bill=50*3.50+($units-50)*4.00;

                }elseif($units>150 && $units<=250){
                    $bill=50*3.50+ 100*4.00+($units-150)*5.20;

                }elseif($units>=250 ){
                    $bill=50*3.50+ 100*4.00+100*5.20+($units-250)*6.50;
                } 

                echo $bill;
        ?>  
<h3>ii. A PHP calculator using switch case (Addition, Subtraction, Multiplication, Division)</h3>
    <?php
        $Num1=50;
        $Num2= 30;
        $operator= "Subtraction";

        switch($operator){
            case "Addition": echo $Num2+ $Num1; break;
            case "Subtraction": echo $Num1 - $Num2; break;
            case "Multiplication": echo $Num1 * $Num2; break;
            case "Division": echo $Num1 / $Num2;
        }
    
    ?>                



<h3>iii. Check if a person is eligible to vote by age </h3>
        <?php 
            $person=17;
            echo $person >=18 ? "You are  <b> Eligible</b> to vote" : "Your Are <b>Not Eligible</b>  to vote";
        ?>
        


<h3>iv. Married Or Unmarried NO</h3>
        <?php
            $man="femail";
            $age=15;

            if($man=="male"){
                if($age>=21){
                    echo "Your are Qulified Man for Married";
                }else{
                    echo "Your are Not Qulified Man for Married";
                }
            }elseif($man=="femail"){
                if($age>=18){
                    echo "You are Qulified Women for married";
                }else{
                    echo "You are not Qulified Women for Married";
                }
            }
        ?>
    <h3>V. Check if number is positive or negetive </h3>    
    <?php
        $number= -10;
        if($number > 0){
            echo "Number is positive";
            
        } elseif($number < 0 ){
            echo "Your Number is negetive";
        } else{
            echo "It's Just A ZERO";
        }
        
    ?>
    
    <h3>vi. Check if number is odd or even </h3>
        <?php
            $myNumber= 19;
            if($myNumber%2 == 0){
                echo "The number is <b>EVEN</b>";
            }else{
                echo "The Number is  <b>ODD</b>";
            }
        ?>

</body>
</html>