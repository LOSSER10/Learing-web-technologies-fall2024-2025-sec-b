<?php

function findLargest($num1, $num2, $num3) {
    if ($num1 >= $num2 && $num1 >= $num3) {
        echo "The largest number is $num1.";
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        echo "The largest number is $num2.";
    } else {
        echo "The largest number is $num3.";
    }
}


$num1 = 45;
$num2 = 78;
$num3 = 32;


findLargest($num1, $num2, $num3);
?>
