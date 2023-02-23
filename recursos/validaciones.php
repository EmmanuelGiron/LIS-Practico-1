<?php
function estaVacio($var){
    return empty(trim($var));
}
function formatoCorrecto($var){
    return preg_match('/^PROD\d{5}$/',$var);
}
function esEntero($var){
    if(is_int($var))
    { 
        return 0;
    }
}
function formato($var){
    if($var=='image/jpg' || $var=='image/png')
    {
    return 1;
    }
    else{
        return 0;
    }
}