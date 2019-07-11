<?php

function time_in_words($h, $m) {
    
    if(($h < 1 || $h > 12) || ($m < 0 || $m > 60)) {
        echo 'Please enter a value time between 0:00 and 11:59';
        exit;
    }
   
    $minute_str = format_minutes($m);
    $hour_str = format_hour($h, $m);
    $return = '';
    
    if($m == 0) {
        $return = sprintf("%s o'clock", $hour_str);
    } else {
            
        switch($m) {
            case 0:
                $return = sprintf("%s o'clock", $hour_str);
            case 15:
                $return = sprintf("quarter past %s", $hour_str);
                break;
            case 30:
                $return = sprintf("half past %s", $hour_str);
                break;
            case 45:
                $return = sprintf("quarter to %s", $hour_str);
                break;
            default:
                $return = string_time($h, $m, $hour_str, $minute_str);
        }
    }
    
    echo $return;
}

function string_time($h, $m, $hour_str, $minute_str) {
    
    if($m == 1) {
        return sprintf("%s minute past %s", $minute_str, $hour_str);
    }
    
    if($m < 30) {
        return sprintf("%s minutes past %s", $minute_str, $hour_str);
    }
    
    if($m > 30) {
        return sprintf("%s minutes to %s", $minute_str, $hour_str);
    }
}

function format_hour($h, $m) {
    // A small data sample like this doesn't need an array
    $h_strings = array(
        1 => 'one', 
        2 => 'two', 
        3 => 'three', 
        4 => 'four', 
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve'
    );
    
    // If $m > 30, then forward the hour by 1 unless it's 12, then loop back 
    // around to 1
    if($m > 30) {
        
        $h_key = $h + 1;
        
        if($h_key > 12) {
            $h_key = 1;
        }
        
        return $h_strings[$h_key];
        
    } else {
        
        return $h_strings[$h];
        
    }
}

function format_minutes($m) {
    
    // Handle single digits and teens, then just do every ten
    $m_strings = array(
        1 => 'one', 
        2 => 'two', 
        3 => 'three', 
        4 => 'four', 
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty'
    );
        
    // Edge cases, return a blank
    if($m == 30 || $m == 0 || $m == 15 || $m == 45) {
        return '';
    }
    
    // Create an inverse of 60 if $m > 30
    if($m > 30) {
        $m = 60 - $m;
    }
    
    // If $m is more than 20, then it needs to be a compound of x & y, like
    // twenty-three etc.
    if($m > 20) {
        
        $m = (string)$m;
        
        $m1 = $m[0];
        $m2 = $m[1];
        
        $mstr = $m_strings[$m[0] . "0"] . ' ' . $m_strings[$m2];
        
    } else {
        
        $mstr = $m_strings[$m];
        
    }
    
    return $mstr;
    
}

echo time_in_words(12, 00);
echo '<br/>';
echo time_in_words(9, 45);
echo '<br/>';
echo time_in_words(3, 17);
echo '<br/>';
echo time_in_words(12, 33);
echo '<br/>';
echo time_in_words(8, 3);
echo '<br/>';
echo time_in_words(7, 30);