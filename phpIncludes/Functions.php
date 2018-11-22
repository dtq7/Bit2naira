<?php

$ADMIN_PASSWORD = "12";


$SERVER_EMAIL_USER_NAME = "";
$SERVER_EMAIL_PASSWORD = "";  
$URL = "";
$NOREPLY = "";

function AccountNumberGenerator(){
    $toks = '567765991234567890';
    $toks = str_shuffle($toks);
    $toks = substr($toks, 0, 9);
    $toks = "B" . $toks;
    return $toks;
  }

?>