<?php

function calculateVAT($amount, $vatRate = 15) {
   
    $vat = ($amount * $vatRate) / 100;
    return $vat;
}


$amount = 1000; 
$vatRate = 15; 


$vat = calculateVAT($amount, $vatRate);


echo "Amount: $" .$amount ;echo "\r\n";
echo "VAT Rate: $vatRate";echo"\r\n";
echo "Calculated VAT: $".$vat  ;echo"\r\n";
echo "Total (Amount + VAT): $" . $amount + $vat;echo"\r\n";
?>
