<?php
session_start();
if(!isset($_SESSION['loggedInSuperUser'])){
  header('Location: ./login.php');
  exit();
}

require_once('../phpIncludes/openConnection.php');

$tableBody = "";
$UserCount = 0;
$bitcoinPurchaseCount = 0;
$bitcoinSalesCount = 0;
$giftcardSalesCount = 0;
$withdrawalRequestCount = 0;

$sqlFetchUser = $con->query("SELECT * FROM Users");

//Fetch counter values
$sqlbitcoinPurchaseCount = $con->query("SELECT count(*) as cnt FROM BitcoinPurchaseOrder WHERE Addressed=0"); 
$sqlbitcoinSalesCount = $con->query("SELECT count(*) as cnt FROM BitcoinSalesOrder WHERE Addressed=0"); 
$sqlgiftcardSalesCount = $con->query("SELECT count(*) as cnt FROM GiftCardSaleOrder WHERE Addressed=0"); 
$sqlwithdrawalRequestCount = $con->query("SELECT count(*) as cnt FROM WithdrawalRequest WHERE Addressed=0"); 

$databitcoinPurchaseCount = $sqlbitcoinPurchaseCount->fetch_assoc();
$databitcoinSalesCount = $sqlbitcoinSalesCount->fetch_assoc();
$datagiftcardSalesCount = $sqlgiftcardSalesCount->fetch_assoc();
$datawithdrawalRequestCount = $sqlwithdrawalRequestCount->fetch_assoc();

$bitcoinPurchaseCount =$databitcoinPurchaseCount["cnt"];
$bitcoinSalesCount = $databitcoinSalesCount["cnt"];
$giftcardSalesCount = $datagiftcardSalesCount["cnt"];
$withdrawalRequestCount = $datawithdrawalRequestCount["cnt"];


while($row = $sqlFetchUser->fetch_assoc()){
    $tableBody .= "<tr> 
        <td>".$row['Username']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['Bitcoin_Wallet_Address']."</td>
        <td>".$row['Bit2naira_Account_Balance']."</td>
        <td>".$row['Bank_Name']."</td>
        <td>".$row['Bank_Account_Name']."</td>
        <td>".$row['Bank_Account_Number']."</td> 
    </tr>";
    $UserCount+=1;

}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./special/bootstrap.min.css">
    <link rel="stylesheet" href="./special/dataTables.bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid custom-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BIT2NAIRA</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="bitcoinPurchaseOrder.php">BITCOINPURCHASE</a></li>
            <li><a href="bitcoinSalesOrder.php">BITCOINSALES</a></li>
            <li><a href="giftCardSalesOrder.php">GIFTCARDSALES</a></li>
            <li><a href="withdrawalRequest.php">WITHDRAWALREQUEST</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, Admin</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container-fluid custom-container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container-fluid custom-container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="#" class="list-group-item"><span class="" aria-hidden="true"></span> Users <span class="badge"><?php echo $UserCount?></span></a>
              <a href="bitcoinPurchaseOrder.php" class="list-group-item"><span class="" aria-hidden="true"></span> Bitcoin Purchase Order <span class="badge"><?php echo $bitcoinPurchaseCount?></span></a>
              <a href="bitcoinSalesOrder.php" class="list-group-item"><span class="" aria-hidden="true"></span> Bitcoin Sales Order <span class="badge"><?php echo $bitcoinSalesCount?></span></a>
              <a href="giftCardSalesOrder.php" class="list-group-item"><span class="" aria-hidden="true"></span> Gift Card Sales Order <span class="badge"><?php echo $giftcardSalesCount?></span></a>
              <a href="withdrawalRequest.php" class="list-group-item"><span class="" aria-hidden="true"></span> Withdrawal Request <span class="badge"><?php echo $withdrawalRequestCount?></span></a>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Product Price Change</h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form">
                        <div class="form-group">
                            
                            <label>BITCOIN </label><input type="text" class="form-control"><br>
                            <label>GIFTCARD </label><input type="text" class="form-control"><br>
                            <label>PERFECT MONEY </label><input type="text" class="form-control"><br>
                            <button class="btn btn-success form-control">Update Price</button>
                        </div>
                      </form>
                </div>
              </div>
          </div>
          <div class="col-md-9">

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Users</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover" id="resTable">
                      <thead class="icorem">
                        <th>Username</th>
                        <th>Email</th>
                        <th>Bitcoin Address</th>
                        <th>Bit2naira Balance</th>
                        <th>Bank Name</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                      </head>
                      <tbody>
                      <?php echo $tableBody?>
                      </tbody>
                    </table>
                </div>
              </div>
              
          </div>
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

    <script src="./special/jquery.3.2.1.min.js"></script>
    <script src="./special/bootstrap.min.js"></script>
    <script src="./special/jquery.dataTables.min.js"></script>
    <script src="./special/dataTables.bootstrap.min.js"></script>
    <script src="./js/dashboard.js"></script>
  </body>
</html>
