<?php
session_start();
if(!isset($_SESSION['loggedInSuperUser'])){
  header('Location: ./index.php');
  exit();
}

require_once('../phpIncludes/openConnection.php');

$UserCount = 0;
$bitcoinPurchaseCount = 0;
$bitcoinSalesCount = 0;
$giftcardSalesCount = 0;
$withdrawalRequestCount = 0;
$bitcoinPrice = "";
$giftcardPrice = "";
$perfectmoneyPrice = "";

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
    $UserCount+=1;
}

if(isset($_POST['updatePrice'])){

  require_once('../phpIncludes/openConnection.php');

  $bitcoin = $con->real_escape_string($_POST['bitcoin']);
  $giftcard = $con->real_escape_string($_POST['giftcard']);
  $perfectmoney = $con->real_escape_string($_POST['perfectmoney']);

  $sqlUpdatePrice = $con->query("UPDATE PerfectMoneyPrice SET Bitcoin='$bitcoin',Giftcard='$giftcard', PerfectMoney='$perfectmoney' WHERE id=1");

  if($sqlUpdatePrice){
    exit("success");
  }else {
    exit("failed");
  }
}

$sqlFetchPrice = $con->query("SELECT * FROM PerfectMoneyPrice WHERE id=1");
$dataFetchPrice = $sqlFetchPrice->fetch_assoc();

$bitcoinPrice = $dataFetchPrice["Bitcoin"];
$giftcardPrice = $dataFetchPrice["Giftcard"];
$perfectmoneyPrice = $dataFetchPrice["PerfectMoney"];




















///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

require_once("../phpIncludes/Functions.php");

if(isset($_POST['key'])){

    require_once("../phpIncludes/openConnection.php");

   //Tas Pay User
    if($_POST['key'] == 'payNew'){
        
        $amount = $con->real_escape_string($_POST['amountToSave']);
        $rowID = $con->real_escape_string($_POST['rowID']);
    
             $test = $con->query("UPDATE Users SET Bit2naira_Account_Balance = Bit2naira_Account_Balance + '$amount' WHERE id='$rowID'");

             $total = $con->query("SELECT id,Bit2naira_Account_Balance FROM Users WHERE id='$rowID'");
             $totalData = $total->fetch_assoc();

             $value = $totalData['Bit2naira_Account_Balance'];
    
       
    
            if($test){
              $res = [
                  "successMessage" => "success",
                  "balance" => round($value,2)
              ];  
              exit(json_encode($res));
            }
            else {
                $res = 'failed';  
                exit(json_encode($res));
            }
    
        
    
    
        } //End of task #






  


  // 2.Populating the table
  if($_POST['key'] == 'getExistingData'){
    $start = $con->real_escape_string($_POST['start']);
    $limit = $con->real_escape_string($_POST['limit']);

    $sql5 = $con->query("SELECT * FROM Users LIMIT $start, $limit");
    if($sql5->num_rows > 0){
        $response = "";
        while($data = $sql5->fetch_assoc()){
            $response.='
                <tr>
                    
                    <td id="username'.$data["id"].'">'.$data["Username"].'</td>
                    <td id="email'.$data["id"].'">'.$data["Email"].'</td>
                    <td id="bicoinWA'.$data["id"].'">'.$data["Bitcoin_Wallet_Address"].'</td>
                    <td id="bit2nairaAB'.$data["id"].'">'.$data["Bit2naira_Account_Balance"].'</td>
                    <td id="bankname'.$data["id"].'">'.$data["Bank_Name"].'</td>
                    <td id="bankAN'.$data["id"].'">'.$data["Bank_Account_Name"].'</td>
                    <td id="bankAB'.$data["id"].'">'.$data["Bank_Account_Number"].'</td>
                    <td>
                        <input type="button" onclick="viewORedit('.$data["id"].',\'pay\')" value="Pay" class="btn btn-sm" style="background-color:#a59746;color:#ffffff;border:0;">
                        <input type="button" onclick="deleteRow('.$data["id"].')" value="Delete" class="btn btn-sm btn-danger">
                    </td>
            </tr>'
            ;

        }
        exit($response );

    }else{
        exit('reachedMax');
    }

}

  //3. update form field populated

    if($_POST['key'] == 'getRowData'){

        $rowID = $con->real_escape_string($_POST['rowID']);
        $sql6 = $con->query("SELECT * FROM Users WHERE id='$rowID'");
        $data2 = $sql6->fetch_assoc();

        $jsonArray = array(
            'username' => $data2['Username']
        );

        exit(json_encode($jsonArray));

    }

    $rowID = $con->real_escape_string($_POST['rowID']);

    if($_POST['key'] == 'deleteRow'){
        $con->query("DELETE FROM Users WHERE id='$rowID'");
        exit('The row has been deleted');
    }

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
      </div>
      <!--/.nav-collapse -->
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
            <a href="#" class="list-group-item"><span class="" aria-hidden="true"></span> Users <span class="badge">
                <?php echo $UserCount?></span></a>
            <a href="bitcoinPurchaseOrder.php" class="list-group-item"><span class="" aria-hidden="true"></span>
              Bitcoin Purchase Order <span class="badge">
                <?php echo $bitcoinPurchaseCount?></span></a>
            <a href="bitcoinSalesOrder.php" class="list-group-item"><span class="" aria-hidden="true"></span> Bitcoin
              Sales Order <span class="badge">
                <?php echo $bitcoinSalesCount?></span></a>
            <a href="giftCardSalesOrder.php" class="list-group-item"><span class="" aria-hidden="true"></span> Gift
              Card Sales Order <span class="badge">
                <?php echo $giftcardSalesCount?></span></a>
            <a href="withdrawalRequest.php" class="list-group-item"><span class="" aria-hidden="true"></span>
              Withdrawal Request <span class="badge">
                <?php echo $withdrawalRequestCount?></span></a>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Product Price Change</h3>
            </div>
            <div class="panel-body">
              <form action="" class="form">
                <div class="form-group">
                  <img src="spinner.gif" class="preloader" alt="" style="display:none;width:70px;margin:auto;text-align:center">
                  <p id="errorMessage" style="color:red; text-align:center"></p>
                  <label>BITCOIN </label><input type="text" class="form-control" value="<?php echo $bitcoinPrice?>" id="inputBitcoin"><br>
                  <label>GIFTCARD </label><input type="text" class="form-control" value="<?php echo $giftcardPrice?>"
                    id="inputGiftcard"><br>
                  <label>PERFECT MONEY </label><input type="text" class="form-control" value="<?php echo $perfectmoneyPrice?>"
                    id="inputPerfectmoney"><br>

                  <button id="updatePrice" type="button" class="btn btn-success form-control">Update Price</button>
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
                  <th>Options</th>
                  </head>
                <tbody>
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


  <div class="modal fade" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="height:1px">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">PAY USER</h3>
        </div>
        <div class="modal-body">
          <div id="payContent">
            <input type="text" class="form-control mb-2" placeholder="Amount..." id="fullAmountA">
            <input type="hidden" id="editRowID" value="0">
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" data-dismiss="modal" aria-label="Close" class="btn btn-sm" value="Close" style="background-color:#c42f2f;color:#ffffff;border:0;">
          <input type="button" id="manageBtn" onclick="saveData('addNew')" class="btn btn-sm" value="Pay" style="background-color:#3a7fd5;color:white;border:0;">

        </div>
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