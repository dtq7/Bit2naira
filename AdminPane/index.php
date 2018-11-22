<?php

session_start();

$msg = "";

function redirect(){
  Header('Location: dashboard.php');
  exit();
};

if(isset($_SESSION['loggedInSuperUser'])){
redirect();
}


if(isset($_POST['login'])){

  require_once('../phpIncludes/openConnection.php');
  require_once('../phpIncludes/Functions.php');


  $password = $con->real_escape_string($_POST['thepass']);


      if($password == $ADMIN_PASSWORD){
        $_SESSION['loggedInSuperUser'] = 'something';
        $_SESSION['name'] = 'something';
        exit("success");
      }else {
        exit("failed");
      }


}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="font-weight: 900;font-size: 22px" href="#">BIT2NAIRA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Panel <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="login" action="" class="well">
                  <div class="form-group">
                    <label>Enter you administrator password</label>
                    <input type="passowrd" id="email" class="form-control" placeholder="Enter password">
                  </div>
                  
                  <button type="button" id="retrieve" class="btn btn-success btn-block">Login</button>
                  <img src="spinner.gif" class="preloader" alt="" style="display:none;width:50px;margin:auto;text-align:center">
                        <br>
                        <p id="res" style="color:red; text-align:center"></p>
              </form>
          </div>
        </div>
      </div>
    </section>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./special/jquery.3.2.1.min.js"></script>
    <script src="./special/bootstrap.min.js"></script>
    <script src="./special/jquery.dataTables.min.js"></script>
    <script src="./special/dataTables.bootstrap.min.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
