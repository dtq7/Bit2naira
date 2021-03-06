<?php
session_start();
if(!isset($_SESSION['loggedInSuperUser'])){
  header('Location: ./index.php');
  exit();
}


if(isset($_POST['confirm'])){
   
  require_once('../phpIncludes/openConnection.php');

  $id = $con->real_escape_string($_POST['id']);

  $sqlConfirm = $con->query("UPDATE WithdrawalRequest SET Addressed=1 WHERE id='$id'");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel |Withdrawal Request</title>
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
            <li><a href="dashboard.php">DASHBOARD</a></li>
            <li><a href="bitcoinPurchaseOrder.php">BITCOINPURCHASE</a></li>
            <li><a href="bitcoinSalesOrder.php">BITCOINSALES</a></li>
            <li><a href="giftCardSalesOrder.php">GIFTCARDSALES</a></li>
            <li class="active"><a href="withdrawalRequest.php">WITHDRAWALREQUEST</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> WR <small>Manage Your Withdrawal Request</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
    <div class="container-fluid custom-container">
      <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Users</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover" id="resTable">
                      <thead class="icorem">
                        <th>Username</th>
                        <th>Amount</th>
                        <th>Bank</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Options</th>
                      </head>
                      <tbody>
                      <?php
                      require_once('../phpIncludes/openConnection.php');

          
                      $sqlOrder = $con->query("SELECT * FROM WithdrawalRequest where Addressed=0");
            
                      
                      while($row = $sqlOrder->fetch_assoc()){
                        $username = $row['Username'];
                        $amount = $row['Amount'];
                        $bank = $row['Bank_Name'];
                        $name = $row['Account_Name'];
                        $number = $row['Account_Number'];
                        $id = $row['id'];
            
                        echo ' 
                          <tr>
                            <td>'.$username.'</td>
                            <td>'.$amount.'</td>
                            <td>'.$bank.'</td>
                            <td>'.$name.'</td>
                            <td>'.$number.'</td>
                            <td>
                            <form action="withdrawalRequest.php" method="post">
                              <input type="hidden" name="username">
                              <input type="hidden" name="id" value="'.$id.'">
                              <button type="submit" name="confirm" class="btn btn-success">Confirm</button>
                            </form>  
                            </td>
                          </tr>
                        ';
                        
            
                      }
                      ?>
                      </tbody>
                    </table>
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



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script src="./special/jquery.dataTables.min.js"></script>
  <script src="./special/dataTables.bootstrap.min.js"></script>
  <script src="./js/withdrawalRequest.js"></script>
  </body>
</html>
