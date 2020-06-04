<?php

function toFaDigits($str)
{

    $easterns = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $westerns = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($westerns, $easterns, $str);

}


function toEnDigits($str)
{

    $easterns = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $westerns = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($easterns, $westerns, $str);

}

function ellipsize($str)
{
    if (strlen($str) > 31) {
        return mb_substr($str, 0, 31) . '....';
    }
    return $str;
}

function normalize($str)
{
    $len = strlen($str);
    for ($i = $len,$j=0; $i > 2; $i -= 3,$j++) {
        $first = strpos($str, ',');
        if ($first > 3 || !$first) {
            $str =  substr($str, 0, $i - 3). ','.substr($str, $i - 3, $len - $i + 3+$j) ;
        }else{
            break;
        }
    }
    return toFaDigits($str);
}

?>