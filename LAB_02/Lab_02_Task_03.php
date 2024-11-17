<?php

function checkOddEven($number) {
    if ($number % 2 == 0) {
        echo "The number $number is Even.";
    } else {
        echo "The number $number is Odd.";
    }
}


$number = 7; 


checkOddEven($number);
?>
