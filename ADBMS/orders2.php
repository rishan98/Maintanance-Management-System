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

   $id = $_POST["edit"];

  

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
  <a href="#">Dashboard</a>
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
  	<h2>Orders</h2><hr>
    <table class="table">
      <tr>
        <td><b>Order ID</b></td>
        <td><b>Order Name</b></td>
        <td><b>Qty</b></td>
        <td><b>Date Required</b></td>
        <td><b>Date Completed</b></td>
        <td><b>Supplier Name</b></td>
        
      </tr>
      
        <?php
             
            $query = "SELECT * FROM dbo.v_orderDetails WHERE oid='$id'";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
               
                  <tr>
                  <td style="background-color: white; height: 50px;"><?php echo $row["oid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["oname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["qty"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["datereq"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["datecom"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["spname"]; ?></td> 
                 
                  </tr>

               </table><br><br>
    <form action="orders3.php" method="post">
      <input type="hidden" name="edit" value="<?php echo $row["oid"]; ?>">
      <input type="submit" name="update" value="Update">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </form><br>
    
    <form action="orders.php" method="post">
      <input type="hidden" name="edit1" value="<?php echo $row["oid"]; ?>">
      <input style="background-color: #BD2807;" type="submit" name="submit1" value="Delete">
    </form>
    
 
               <?php
            }

                   

                    
        ?>


    <br><br><br>
    
    <hr>
    

  </div>

</div>

</body>
</html>