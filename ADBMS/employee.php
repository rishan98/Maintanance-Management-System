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
    $id = $_POST['i'];
   $ename = $_POST['e'];
   $cno = $_POST['c'];
   $position = $_POST['p'];

   $sql = "EXEC dbo.insertEmployee @empid='$id', @ename='$ename', @cno='$cno', @position='$position'";
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
<html>
<head>
<title>ABC Pvt Ltd</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
  .view input[value="All"] {
  outline: none;
  height: 25px;
  width: 100px;
  background: #837D7C;
  color: white;
  font-size: 15px;
  margin-left: 80%
}
</style>
</head>
<body>
   
  

<div class="sidebar">
  <a style="background-color: #909B69;" href="#home"><b>ABC Pvt Ltd</b></a>
  <a href="admin.php">Dashboard</a>
  <a class="active" href="#">Employees</a>
  <a href="breakdown.php">Breakdown<br> &nbsp&nbsp Maintanance</a>
  <a href="schedule.php">Schedule<br> &nbsp&nbsp Maintanance</a>
  <a href="orders.php">Orders</a>
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
    <h2 class="theme">Employee details</h2><a href="employee2.php"><input class="theme" type="submit" name="" value="All"></a><hr>
    <form action="employee1.php" method="post">
      
    <b class="theme">Enter Employee ID :</b>
    <input class="theme" type="text" name="eid" required><br><br>
    <input class="theme" type="submit" name="" value="search">
    </form><br><br><br>
    <hr style="background-color: black;">
    <br><br>
    <h2>Add New Employee</h2><hr>
    
    <form action="employee.php" method="post">
      <b>Employee ID</b><br>
    <input type="text" name="i" required><br><br>

    <b>Employee Name</b><br>
    <input type="text" name="e" required><br><br>

    <b>Contact Number</b><br>
    <input type="text" name="c" required><br><br>

    <b>Position</b><br>
    <input type="text" name="p" required><br><br>

    <input type="submit" name="submit" value="Add">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="reset" name="clear" value="clear">
    </form>


    
  </div>

</div>

</body>
</html>