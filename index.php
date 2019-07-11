<?php

function time_in_words($h, $m) {
    
    if(($h < 1 || $h > 12) || ($m < 0 || $m > 60)) {
        echo 'Please enter a value time between 0:00 and 11:59';
        exit;
    }
    
    
    
}