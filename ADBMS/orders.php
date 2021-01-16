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
   $iid = $_POST['edit0'];
   $spid = $_POST['spid'];
   $oname = $_POST['oname'];
   $datereq = $_POST['dreq'];
   $datecom = $_POST['dcom'];
   $qty = $_POST['qty'];

   $sql = "EXEC dbo.updateOrder @oid='$iid', @spid='$spid', @oname='$oname', @datereq='$datereq', @datecom='$datecom', @qty='$qty'";
   $stmt = sqlsrv_query($conn,$sql);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
             echo "<script type='text/javascript'>alert('Update Successfully!')</script>";
           }
   }



  if (isset($_POST['submit1'])){
   $id = $_POST['edit1'];
   

   $sql = "EXEC dbo.deleteOrder @oid='$id'";
   $stmt = sqlsrv_query($conn,$sql);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
             echo "<script type='text/javascript'>alert('Delete Successfully!')</script>";
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
  	<h2>Orders</h2><hr>
    <table class="table">
      <tr>
        <td><b>Order ID</b></td>
        <td><b>Order Name</b></td>
        <td><b>Qty</b></td>
        <td><b>Date Required</b></td>
        <td><b>Date Completed</b></td>
        <td><b>Supplier Name</b></td>
        <td><b></b></td>
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_orderDetails ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
               <form action="orders2.php" method="post">
                  <tr>
                  <td style="background-color: white; height: 50px;"><?php echo $row["oid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["oname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["qty"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["datereq"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["datecom"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["spname"]; ?></td> 
                  <input type="hidden" name="edit" value="<?php echo $row["oid"]; ?>">
                  <td style="background-color: white; height: 50px;"><input type="submit" name="submit" value="Edit"></td>
                  </tr>
               </form>
                 

               <?php
            }

                   

                    
        ?>
      
    </table><br>
    <a href="orders1.php"><input type="submit" name="submit" value="Add Order"></a>
    <br><br><br><br>
    
    <hr>
    

  </div>

</div>

</body>
</html>