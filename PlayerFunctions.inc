<?php

function validateName($incoming){
    return (!empty($incoming) && (preg_match("/^[a-z\-' ]+$/i", $incoming)));
}

function validateEmail($incoming){
    return (!empty($incoming) && (preg_match("/^.+\@.+\..+(\..+)?$/i", $incoming)));
}

function validateCity($incoming){
    return (!empty($incoming) && (preg_match("/^[a-z\- ]+$/i", $incoming)));
}

function validatePwd($incoming){
    return (!empty($incoming));
}




//$err = array();
//if (!preg_match('/[A-Z]+/', $pass))
//    $err[count($err)] = "Password must have an UPPERCASE letter.";
//if (!preg_match('/[a-z]+/', $pass))
//    $err[count($err)] = "Password must have a lowercase letter.";
//if (!preg_match('/[0-9]+/', $pass))
//    $err[count($err)] = "Password must have a number.";
//if (preg_match('/ /', $pass))
//    $err[count($err)] = "Password cannot contain spaces.";
//if (!preg_match('/[^a-zA-Z\d ]/', $pass))
//    $err[count($err)] = "Password must have a special character.";
//if (!(strlen($pass) >=8 && strlen($pass) <=16))
//    $err[count($err)] = "Password must be between 8 and 16 characters.";
//return $err;