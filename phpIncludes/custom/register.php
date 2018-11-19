<?php

session_start();

if(isset($_SESSION['loggedIn'])){
    header('Location: ./welcome.php');
    exit();
  }

//echo "<script src=\"asset/js/jquery-3.3.1.min.js\"></script>";

$errUsername = "";
$errEmail = "";
$passwordMismatch = "";

$usernameVal = "";
$emailVal = "";

$completionStyle = "Login_Successful full-width";

$usernameBorder = "full-width";
$emailBorder = "full-width";
$passwordBorder = "full-width";

require_once("./phpIncludes/Functions.php");

if(isset($_POST['submit'])){
   
    require_once('./phpIncludes/openConnection.php');

    $username = $con->real_escape_string($_POST['username']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $Cpassword = $con->real_escape_string($_POST['Cpassword']);
    $Bit2nairaAccountNumber = AccountNumberGenerator();
    $Bit2nairaAccountBalance = 0;

    $sqlUsername = $con->query("SELECT id FROM Users WHERE Username='$username'");
    if($sqlUsername->num_rows>0){
      $errUsername = 'Username already exists';
      $usernameBorder = "full-width Error_Border";
    }else{
      $usernameBorder = "full-width Success_Border";
      $usernameVal = $username;
    }


    $sqlEmail = $con->query("SELECT id FROM Users WHERE Email='$email'");
    if($sqlEmail->num_rows>0){
      $errEmail = 'Email already exists';
      $emailBorder = "full-width Error_Border";
    }else{
      $emailBorder = "full-width Success_Border";
      $emailVal = $email;
    }

    if($password != $Cpassword){
        $passwordMismatch = "Password does not match";
        $passwordBorder = "full-width Error_Border";
    }


    if($sqlUsername->num_rows == 0 && $sqlEmail->num_rows == 0 && $passwordMismatch == ""){
        $register = $con->query("INSERT INTO Users(Username,Email,Password,Bit2naira_Account_Number,Bit2naira_Account_Balance) VALUES 
        ('$username','$email','$password','$Bit2nairaAccountNumber','$Bit2nairaAccountBalance')");
           
           if($register == true){
             //Remove Username Validations
            $usernameBorder = "full-width";
            $usernameVal = "";
            $completionStyle = "Login_Successful full-width show";

            //Remove email validation
            $emailBorder = "full-width";
            $emailVal = "";
            echo("Inserted");
          }else{
            echo "Failed";
          }
    }

}   

 ?>