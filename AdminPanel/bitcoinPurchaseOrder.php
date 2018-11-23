<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;

if(!isset($_SESSION['loggedInSuperUser'])){
  header('Location: ./index.php');
  exit();
}
if(isset($_POST['confirm'])){
   
  require_once('../phpIncludes/openConnection.php');

  $id = $con->real_escape_string($_POST['id']);

  $sqlConfirm = $con->query("UPDATE BitcoinPurchaseOrder SET Addressed=1 WHERE id='$id'");
}

if(isset($_POST['deny'])){
   
  require_once('../phpIncludes/openConnection.php');
  require_once('../phpIncludes/Functions.php');
  $id = $con->real_escape_string($_POST['id']);
  $username = $con->real_escape_string($_POST['username']);
  $attachmentInfo = $con->real_escape_string($_POST['attachmentInfo']);
  $attachment = addslashes(file_get_contents($_FILES["attachment"]["tmp_name"]));

  $sqlLogIssue = $con->query("INSERT INTO IssueLog(Identity,Issue,Description) VALUES('$id','$attachment','$attachmentInfo')");

  $sqlRetrieveIssue = $con->query("SELECT * FROM IssueLog WHERE Identity='$id'");
  $dataRetrieveIssue = $sqlRetrieveIssue->fetch_assoc();
  $resl = $dataRetrieveIssue["Issue"];
  $src = "";

  if($resl != ''){
    $src = "data:image/jpeg;base64,";
    $src.=base64_encode($resl);
  }


  $sqlGetEmail = $con->query("SELECT Email FROM Users WHERE Username='$username'");
  $dataGetEmail = $sqlGetEmail->fetch_assoc();

  $email = $dataGetEmail["Email"];

      include_once "../PHPMailer/Exception.php";
      include_once "../PHPMailer/SMTP.php";
      include_once "../PHPMailer/PHPMailer.php";
 
      
        $mail = new PHPMailer();
        $mail->Username = $SERVER_EMAIL_USER_NAME;
        $mail->Password = $SERVER_EMAIL_PASSWORD;
        $mail->setFrom($SERVER_EMAIL_USER_NAME,'Bit2naira');
        $mail->addReplyTo($NOREPLY);
        $mail->addAddress($email);
        $mail->isHTML(true);                       
     
       
        $mail->Subject = 'Bitcoin Purchase Failed';
        $mail->Body = "
            $attachmentInfo<br><br>
            <img src='$src' />
        ";
       //if($mail->send()){
         if(true){
          //Delete the record
            $sqlDelete = $con->query("DELETE FROM IssueLog WHERE Identity='$id'");
            $sqlDeny = $con->query("UPDATE BitcoinPurchaseOrder SET Addressed=1 WHERE id='$id'");
       }
  





}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel | Bitcoin Purchase Order</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="./special/dataTables.bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/bitcoinPurchaseOrder.css">
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid custom-container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">BIT2NAIRA</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="dashboard.php">DASHBOARD</a></li>
          <li class="active"><a href="bitcoinPurchaseOrder.php">BITCOINPURCHASE</a></li>
          <li><a href="bitcoinSalesOrder.php">BITCOINSALES</a></li>
          <li><a href="giftCardSalesOrder.php">GIFTCARDSALES</a></li>
          <li><a href="withdrawalRequest.php">WITHDRAWALREQUEST</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Welcome, Admin</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> BPO <small>Manage Your Bitcoin Purchase
              Order</small></h1>
        </div>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container-fluid custom-container">

      <div class="row">
        <?php

          require_once('../phpIncludes/openConnection.php');

          
          $sqlOrder = $con->query("SELECT * FROM BitcoinPurchaseOrder where Addressed=0");

          $count = 0;
          while($row = $sqlOrder->fetch_assoc()){
            $resl = $row['ProofofPayment'];
            $username = $row['Username'];
            $naira = $row['NairaAmount'];
            $bitcoin = $row['BitcoinAmount'];
            $id = $row['id'];
            $count+=1;



            $src = "data:image/jpeg;base64,";
            $src.=base64_encode($resl);

            echo ' <form enctype="multipart/form-data" action="bitcoinPurchaseOrder.php" method="post">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 well info_wrapper">
              <div class="info_section">
                <span class="counter mb-2">'.$count.'</span>
                <ul class="list-group">
                  <li class="list-group-item">USERNAME: <span class="sep ">'.$username.'</span> </li>
                  <li class="list-group-item">NAIRA AMOUNT: <span class="sep">'.$naira.' Naira</span> </li>
                  <li class="list-group-item">BITCOIN AMOUNT: <span class="sep">'.$bitcoin.' Btc</span> </li>
                </ul>
                <input type="hidden" name="id" value="'.$id.'"/>
                <input type="hidden" name="username" value="'.$username.'"/>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="submit" name="confirm" class="btn btn-primary mr-3">Confirm Order</button>
                  <button type="button" id="denyButton" name="'.$id.'" class="btn btn-default">Deny Order</button>
                </div>
                <div class="mt3" id="'.$id.'">
                   <input type="file" name="attachment">
                   <textarea class="mt-1 TA" name="attachmentInfo" placeHolder="Description"></textarea><br>
                   <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="submit" name="deny" class="btn btn-default mr-3">Send</button>
                    <button type="button" class="btn btn-danger" name="'.$id.'" id="cancelDeny">Cancel</button>
                 </div>
                  </div>
              </div>
              <div class="picture_section">
                <img src="'.$src.'" alt="POP">
              </div>
            </div>
            <div class="col-md-2"></div>
            </div>
          </form>';
            

          }


?>

      </div>
    </div>
  </section>

  <footer id="footer">
    <p>Copyright Bit2naira, &copy; 2018</p>
  </footer>





  <!-- Modals -->

  <!-- Add Page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Page Title</label>
              <input type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Published
              </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="./special/jquery.dataTables.min.js"></script>
  <script src="./special/dataTables.bootstrap.min.js"></script>
  <script src="./js/bitcoinPurchaseOrder.js"></script>
</body>

</html>