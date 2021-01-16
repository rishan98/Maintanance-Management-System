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
   $id = $_POST['oid'];
   $oname = $_POST['oname'];
   $qty = $_POST['qty'];
   $dreq = $_POST['dreq'];
   $dcom = $_POST['dcom'];
   $sid = $_POST['sid'];

   $sql = "EXEC dbo.insertOrders @oid='$id', @oname='$oname', @qty='$qty', @datereq='$dreq', @datecom='$dcom', @spid='$sid'";
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
</head>
<body>
   
  

<div class="sidebar">
  <a style="background-color: #909B69;" href="#home"><b>ABC Pvt Ltd</b></a>
  <a href="admin.php">Dashboard</a>
  <a href="employee.php">Employees</a>
  <a href="breakdown.php">Breakdown<br> &nbsp&nbsp Maintanance</a>
  <a href="schedule.php">Schedule<br> &nbsp&nbsp Maintanance</a>
  <a class="active" href="#">Orders</a>
  <a href="invoice.php">Invoices</a>
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
   
    <h2>Add Order</h2><hr>
    
    <form action="orders1.php" method="post">
    <b>Order ID</b><br>
    <input type="text" name="oid" required><br><br>

    <b>Item</b><br>
    <input type="text" name="oname" required><br><br>

    <b>Qty</b><br>
    <input type="text" name="qty" required><br><br>

    <b>Date Required</b><br>
    <input type="text" name="dreq" required><br><br>

    <b>Date Completed</b><br>
    <input type="text" name="dcom" required><br><br>

    <b>Supplier ID</b><br>
    <input type="text" name="sid" required><br><br>

    <input type="submit" name="submit" value="Add">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="reset" name="clear" value="clear">
    </form>

  </div>

</div>

</body>
</html>