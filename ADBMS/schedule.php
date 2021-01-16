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
   $sid = $_POST['edit'];
   $sdate = $_POST['date'];
   
   

   $sql = "EXEC dbo.updateSchedule @sid='$sid', @sdate='$sdate'";
   $stmt = sqlsrv_query($conn,$sql);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
             echo "<script type='text/javascript'>alert('Update Successfully!')</script>";
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
  <a class="active" href="#">Schedule<br> &nbsp&nbsp Maintanance</a>
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
  	<h2>Schedule Maintanance</h2>
    <hr>
    <table class="table">
      <tr>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Frequency<br>(weeks)</b></td>
        <td><b>Check<br>(last date)</b></td>
        <td><b>Section Leader</b></td>
        <td><b></b></td>
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_scheduleDetails ORDER BY sid ASC";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                <form action="schedule1.php" method="post"> 

                  <tr>
                  <td style="background-color: white; height: 50px;"><?php echo $row["sid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["sdesc"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["freq"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["sdate"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["ename"]; ?></td>
                  <input type="hidden" name="edit" value="<?php echo $row["sid"]; ?>">
                  <td style="background-color: white; height: 50px;"><input type="submit" name="submit" value="Update"></td>
                  </tr>
                </form>
               <?php
            }

                   

                    
        ?>
      
    </table>
    
  </div>

</div>

</body>
</html>