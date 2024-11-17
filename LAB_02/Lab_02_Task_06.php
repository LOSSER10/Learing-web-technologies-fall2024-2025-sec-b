<?php

function searchElement($array, $element) {
    $found = false;

   
    foreach ($array as $index => $value) {
        if ($value == $element) {
            echo "Element $element found at index $index ";
            $found = true;
            break;
        }
    }

    
    if (!$found) {
        echo "Element $element not found in the array.<br>";
    }
}


$array = [10, 20, 30, 40, 50, 60, 70];


$elementToSearch = 40;


searchElement($array, $elementToSearch);
?>
