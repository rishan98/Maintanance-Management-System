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
  <a class="active" href="breakdown.php">Breakdown<br> &nbsp&nbsp Maintanance</a>
  <a href="schedule.php">Schedule<br> &nbsp&nbsp Maintanance</a>
  <a href="orders.php">Orders</a>
  <a  href="invoice.php">Invoices</a>
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
  	<h2>Add New Breakdown</h2><hr>
    <form action="breakdown.php" method="post">
    <table class="table">
    	<tr>
    		<td>ID</td>
    		<td>Breakdwn</td>
    		<td>Breakdown Date</td>
    		<td>Item ID</td>
    		<td>Employee ID</td>
    	</tr>
    	<tr>
    		<td style="background-color: white;"><input type="text" name="bid" required=""></td>
    		<td style="background-color: white;"><input type="text" name="bdesc" required=""></td>
    		<td style="background-color: white;"><input type="text" name="bdate" required=""></td>
    		<td style="background-color: white;"><input type="text" name="oid" required=""></td>
    		<td style="background-color: white;"><input type="text" name="empid" required=""></td>
    	</tr>
    </table><br><br>

    <input type="submit" name="submit0" value="Add">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="reset" name="clear" value="clear">
    </form>
  </div>

</div>

</body>
</html>