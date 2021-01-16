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
  
   $bid = $_POST['edit'];
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>ABC Pvt Ltd</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

</style>
</head>
<body>
   
  

<div class="sidebar">
  <a style="background-color: #909B69;" href="#home"><b>ABC Pvt Ltd</b></a>
  <a href="admin.php">Dashboard</a>
  <a href="employee.php">Employees</a>
  <a class="active" href="#">Breakdown<br> &nbsp&nbsp Maintanance</a>
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
    <h2>Breakdown Maintanance</h2><hr>

    <table class="table">
      <tr>
        <td><b>ID</b></td>
        <td><b>Breakdown</b></td>
        <td><b>Breakdown Date</b></td>
        <td><b>Item</b></td>
        <td><b>Checked By</b></td>
        
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_breakdownDetails01 WHERE bid = '$bid' ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                  
                    <tr>
                  
                  <td style="background-color: white; height: 50px;"><?php echo $row["bid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["bdesc"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["bdate"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["oname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["ename"]; ?></td>
                   
                 
                  </tr>
                  
                  

      
    </table><br><br><br>
    <form action="breakdown.php" method="post">
      <input type="hidden" name="edit1" value="<?php echo $row["bid"]; ?>">
      <input style="background-color: #BD2807;" type="submit" name="submit1" value="Delete">
    </form>


               <?php
            }

                   

                    
        ?>

    <br><br>
    <hr>
    
    
  </div>

</div>

</body>
</html>