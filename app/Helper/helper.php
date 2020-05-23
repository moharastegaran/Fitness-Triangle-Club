<?php

function toFaDigits($str){

    $easterns = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $westerns =  ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($westerns,$easterns,$str);

}


function toEnDigits($str){

    $easterns = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $westerns =  ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($easterns,$westerns,$str);

}

function ellipsize($str){
    if (strlen($str) > 31){
        return mb_substr($str,0,31).'....';
    }
    return $str;
}

?>