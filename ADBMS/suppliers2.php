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
<html>
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
  <a href="orders.php">Orders</a>
  <a href="invoice.php">Invoices</a>
  <a class="active" href="#">Suppliers</a>
</div>

<div class="content">
    

<div class="topnav">
  <a href="#"><img class="image" src="business.jpg">Business</a>
  <a href="#"><img class="image" src="user.jpg">Users</a>
  <a href="#"><img class="image" src="support.jpg">Support</a>
  <a href="conn.php"><img class="image" src="Logout.png">Logout</a>
</div>

  <div class="view">
    <h2>Supplier details</h2><hr>
    <table class="table">
      <tr>
        <td><b>id</b></td>
        <td><b>Supplier Name</b></td>
        <td><b>E-mail</b></td>
        
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_suppliersDetails ORDER BY spid ASC";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                  <tr>
                  <td style="background-color: white; height: 50px;"><?php echo $row["spid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["spname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["email"]; ?></td> 
                  </tr>

               <?php
            }

                   

                    
        ?>
      
    </table>
    
    
  </div>

</div>

</body>
</html>