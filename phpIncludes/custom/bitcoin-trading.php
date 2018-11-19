<?php

error_reporting(E_ALL ^ E_NOTICE);

session_start();

if(!isset($_SESSION['loggedIn'])){
    header('Location: ./index.php');
    exit();
  }

  $currentUser = $_SESSION['Username'];

  $spanData = "";
  $spanID = "";


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

  //Handle request of bitcoin sales

  if(isset($_POST['sell'])){

    require_once('./phpIncludes/openConnection.php');

    $amount = $con->real_escape_string($_POST['amount']);
    $transactionID = $con->real_escape_string($_POST['transactionID']);
    $remarks = $con->real_escape_string($_POST['remarks']);

    $sqlSell = $con->query("INSERT INTO BitcoinSalesOrder(Username,BitcoinAmount,TransactionID,WalletAddress,Remarks) VALUES 
    ('$currentUser','$amount','$transactionID','$bitcoinWalletAddress','$remarks')");

    if($sqlSell){
      exit("success");
    }else {
      exit("failed");
    }
  }


  if(isset($_POST['submit'])){

    require_once('./phpIncludes/openConnection.php');

    $amountBitcoinP = $con->real_escape_string($_POST['inputBitcoinAmountP']);
    $amountNairaP = $con->real_escape_string($_POST['inputNairaAmountP']);
    $pop = addslashes(file_get_contents($_FILES["inputPOP"]["tmp_name"]));
    $remarksP = $con->real_escape_string($_POST['inputRemarksP']);

    $checkPop = getimagesize($_FILES["inputPOP"]["tmp_name"]);
    $extension = end(explode(".", $_FILES['inputPOP']['name']));  

    $sqlPurchase = $con->query("INSERT INTO BitcoinPurchaseOrder(Username,NairaAmount,BitcoinAmount,ProofofPayment,Extension,Remarks) VALUES 
    ('$currentUser','$amountNairaP','$amountBitcoinP','$pop','$extension','$remarksP')");

    if($sqlPurchase && $checkPop){
      $spanData = "Transaction Successful";
      $spanID = "errorMessagePass";
    }else {
      $spanData = "Transaction Failed";
      $spanID = "errorMessageFail";
    }
  }

  

?>