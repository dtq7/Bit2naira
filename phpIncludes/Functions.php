<?php

$EMAIL_USER_NAME = "";
$EMAIL_PASSWORD = "";  

function AccountNumberGenerator(){
    $toks = '567765991234567890';
    $toks = str_shuffle($toks);
    $toks = substr($toks, 0, 9);
    $toks = "B" . $toks;
    return $toks;
  }

?>