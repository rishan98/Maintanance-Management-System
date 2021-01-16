<?php

   $serverName = "DESKTOP-4IAPDQC";

   $connectionInfo = array("Database"=>"adbms");
   $conn = sqlsrv_connect($serverName, $connectionInfo);

  /* if($conn) {
      echo "success. <br/>";
   }else {

    echo "failed.<br/>";
    die(print_r(sqlsrv_error(), true));
}*/

  if (isset($_POST['submit'])){
   $inid = $_POST['inid'];
   $oid = $_POST['oid'];
   $pdate = $_POST['pdate'];
   $pmethod = $_POST['pmethod'];
   $amount = $_POST['amount'];
   

   $sql = "EXEC dbo.insertInvoice @inid='$inid', @oid='$oid', @pdate='$pdate', @pmethod='$pmethod',@amount='$amount'";
   $stmt = sqlsrv_query($conn,$sql);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
             echo "<script type='text/javascript'>alert('Added Successfully!')</script>";
           }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ABC Pvt Ltd</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
	.view input[type="text"] {
  width: 80%;
  height: 50px;
  margin-left: 20px;
  border: none;
}
.table td {
  border: 1px solid black;

}

.table {
  width: 80%;
  border-collapse: collapse;

}
</style>
</head>
<body>
   
  

<div class="sidebar">
  <a style="background-color: #909B69;" href="#home"><b>ABC Pvt Ltd</b></a>
  <a href="admin.php">Dashboard</a>
  <a href="employee.php">Employees</a>
  <a href="breakdown.php">Breakdown<br> &nbsp&nbsp Maintanance</a>
  <a href="schedule.php">Schedule<br> &nbsp&nbsp Maintanance</a>
  <a href="orders.php">Orders</a>
  <a class="active" href="#">Invoices</a>
  <a href="suppliers.php">Suppliers</a>
</div>

<div class="content">
    

<div class="topnav">
  <a href="#"><img class="image" src="business.jpg">Business</a>
  <a href="#"><img class="image" src="user.jpg">Users</a>
  <a href="#"><img class="image" src="support.jpg">Support</a>
  <a href="conn.php"><img class="image" src="Logout.png">Logout</a>
</div>

  <div class="view">
  	<h2>Add New Quatation</h2><hr>
    <form action="invoice2.php" method="post">
    <table class="table">
    	<tr>
    		<td>ID</td>
    		<td>Order ID</td>
    		<td>Payment Date</td>
    		<td>Payment Method</td>
    		<td>Amount</td>
    	</tr>
    	<tr>
    		<td style="background-color: white;"><input type="text" name="inid" required=""></td>
    		<td style="background-color: white;"><input type="text" name="oid" required=""></td>
    		<td style="background-color: white;"><input type="text" name="pdate" required=""></td>
    		<td style="background-color: white;"><input type="text" name="pmethod" required=""></td>
    		<td style="background-color: white;"><input type="text" name="amount" required=""></td>
    	</tr>
    </table><br><br>

    <input type="submit" name="submit" value="Add">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="reset" name="clear" value="clear">
    </form>
  </div>

</div>

</body>
</html>