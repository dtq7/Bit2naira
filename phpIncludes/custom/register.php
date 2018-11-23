<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;

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
    $token = AccountNumberGenerator();

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


      include_once "./PHPMailer/Exception.php";
      include_once "./PHPMailer/SMTP.php";
      include_once "./PHPMailer/PHPMailer.php";
 
     
        $mail = new PHPMailer();
        $mail->Username = $SERVER_EMAIL_USER_NAME;
        $mail->Password = $SERVER_EMAIL_PASSWORD;
        $mail->setFrom($SERVER_EMAIL_USER_NAME,'Bit2naira');
        $mail->addReplyTo($NOREPLY);
        
        $mail->addAddress($email);
        $mail->isHTML(true);   

       
        $mail->Subject = 'Verify Bit2naira Account';
        $mail->Body = "
            Congratulations on your sign up! Click the link below to verify your account. Welcome to Bit2naira!:<br><br>
        
            <a href='$URL/confirmEmail.php?email=$email&token=$token'>Click here</a>
        ";
      if($mail->send()){ 
        $register = $con->query("INSERT INTO Users(Username,Email,Password,Bit2naira_Account_Number,Bit2naira_Account_Balance,token) VALUES 
        ('$username','$email','$password','$Bit2nairaAccountNumber','$Bit2nairaAccountBalance','$token')");
           
           if($register == true){
            $usernameBorder = "full-width";
            $usernameVal = "";
            $completionStyle = "Login_Successful full-width show";

            
            $emailBorder = "full-width";
            $emailVal = "";
            echo("Inserted");
          }else{
            echo "Failed";
          }
    }else{
    }

  }

}   

 ?>