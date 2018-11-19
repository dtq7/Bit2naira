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

?>