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


  if(isset($_POST['submit'])){

    require_once('./phpIncludes/openConnection.php');

    $amount = $con->real_escape_string($_POST['inputAmount']);
    $cardType = $con->real_escape_string($_POST['inputCardType']);
    $giftcard = addslashes(file_get_contents($_FILES["inputGiftCard"]["tmp_name"]));
    $denomination = $con->real_escape_string($_POST['inputDenomination']);
    $remarks = $con->real_escape_string($_POST['inputRemarks']);

    $checkCard = getimagesize($_FILES["inputGiftCard"]["tmp_name"]);
    $extension = end(explode(".", $_FILES['inputGiftCard']['name']));  

    $sqlGift = $con->query("INSERT INTO GiftCardSaleOrder(Username,Amount,CardType,Denomination,GiftCard,Extension,Remarks) VALUES 
    ('$currentUser','$amount','$cardType','$denomination','$giftcard','$extension','$remarksP')");

    if($sqlGift && $checkCard){
      $spanData = "Transaction Successful";
      $spanID = "errorMessagePass";
    }else {
      $spanData = "Transaction Failed";
      $spanID = "errorMessageFail";
    }
  }

?>