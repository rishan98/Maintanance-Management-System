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
  	<h2>Quatations</h2><hr>
    <table class="table">
      <tr>
        <td><b>Invoice ID</b></td>
        <td><b>Item Name</b></td>
        <td><b>Qty</b></td>
        <td><b>Supplier</b></td>
        <td><b>Payment Date</b></td>
        <td><b>Payment Method</b></td>
        <td><b>Amount</b></td>
        
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_invoiceDetails WHERE inid='$id' ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                  <tr>
                  
                  <td style="background-color: white; height: 50px;"><?php echo $row["inid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["oname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["qty"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["spname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["pdate"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["pmethod"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["amount"]; ?></td> 
                  
                  </tr>

               <?php
            }

                   

                    
        ?>
      
    </table><br><br>
    
    <br><br><br>
    
    <hr>
    <h2>Update</h2><hr>
    <form action="invoice.php" method="post">
      <table class="table">
      <tr>
        
        <td>Order ID</td>
        <td>Payment Date</td>
        <td>Payment Method</td>
        <td>Amount</td>
      </tr>
      <tr>
        
        <td style="background-color: white;"><input type="text" name="oid" required=""></td>
        <td style="background-color: white;"><input type="text" name="pdate" required=""></td>
        <td style="background-color: white;"><input type="text" name="pmethod" required=""></td>
        <td style="background-color: white;"><input type="text" name="amount" required=""></td>
        <input type="hidden" name="edit0" value="<?php echo $_POST['edit']; ?>">
      </tr>
    </table><br><br>

    <input type="submit" name="submit" value="Add">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="reset" name="clear" value="clear">
    </form>
  </div>

</div>

</body>
</html>