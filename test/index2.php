<?php 
$array = array (1, 3, 3, 5, 6); 
$my_value = 3;
$my_value2 = 6; 
$filtered_array = array_filter($array, function ($element) use ($my_value, $my_value2) { 
    return ($element != $my_value); 
} 
); 
print_r($filtered_array); 
?> 