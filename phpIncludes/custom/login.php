<?php


  session_start();

  $msg = "";
 

  function redirect(){
    Header('Location: welcome.php');
    exit();
  };


if(isset($_SESSION['loggedIn'])){
  redirect();
}



  if(isset($_POST['login'])){

    require_once('./phpIncludes/openConnection.php');

    $email = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);



    $sqlLogin = $con->query("SELECT id,Username FROM Users WHERE Email='$email' AND Password='$password' AND isEmailConfirmed=1"); 
    $dataLogin = $sqlLogin->fetch_assoc();

    if($sqlLogin->num_rows > 0){
      $_SESSION['loggedIn'] = '1';
      $_SESSION['Username'] = $dataLogin['Username'];

      exit("success");
    }else {
      exit("failed");
    }
  }

  

 ?>