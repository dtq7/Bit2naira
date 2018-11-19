<?php

session_start();

if(!isset($_SESSION['loggedIn'])){
    header('Location: ./index.php');
    exit();
  }

  $currentUser = $_SESSION['Username'];


  $email = "";
  $bitcoinWalletAddress = "";
  $bankName = "";
  $bankAccountNumber = "";
  $bankAccountName = "";
  $bit2NairaAccountNumber = "";
  $bit2NairaAccountBalance = "";



  require_once('./phpIncludes/openConnection.php');

  $sqlUser = $con->query("SELECT * FROM Users WHERE Username='$currentUser'"); 
  $dataUser = $sqlUser->fetch_assoc();

  if($sqlUser->num_rows > 0){
    $email = $dataUser["Email"];
    $bitcoinWalletAddress = $dataUser["Bitcoin_Wallet_Address"];
    $bankName = $dataUser["Bank_Name"];
    $bankAccountNumber = $dataUser["Bank_Account_Number"];
    $bankAccountName = $dataUser["Bank_Account_Name"];
    $bit2NairaAccountNumber = $dataUser["Bit2naira_Account_Number"];
    $bit2NairaAccountBalance = $dataUser["Bit2naira_Account_Balance"];
  }



  if(isset($_POST['withdraw'])){

    require_once('./phpIncludes/openConnection.php');

    $amount = $con->real_escape_string($_POST['amount']);

    $sqlBalance = $con->query("SELECT * FROM Users WHERE Username='$currentUser'"); 
    $dataBalance = $sqlBalance->fetch_assoc();
    $currentBalance = $dataBalance["Bit2naira_Account_Balance"];

    if($amount <= 0 || is_nan($amount)){
      exit('Invalid Amount');
    }
  
    if($currentBalance < $amount ){
        exit('Insufficient Balance');
    }

    $newBalance = $currentBalance - $amount;


    $sqlWithdraw = $con->query("INSERT INTO WithdrawalRequest(Username,Amount,Bank_Name,Account_Number,Account_Name) VALUES 
    ('$currentUser','$amount','$bankName','$bankAccountName','$bankAccountNumber')");

    $sqlDeduct = $con->query("UPDATE Users SET Bit2naira_Account_Balance =  '$newBalance' WHERE Username = '$currentUser'");

    if($sqlWithdraw && $sqlDeduct){
      exit("success");
    }else {
      exit("failed");
    }
  }

?>