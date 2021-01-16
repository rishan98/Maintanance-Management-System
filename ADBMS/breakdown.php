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
  
   if (isset($_POST['submit0'])){
   $bid = $_POST['bid'];
   $bdesc = $_POST['bdesc'];
   $bdate = $_POST['bdate'];
   $oid = $_POST['oid'];
   $empid = $_POST['empid'];
   

   $sql = "INSERT INTO breakdown (bid, bdesc, bdate, oid, empid) VALUES (?,?,?,?,?)";
   $param = array($bid, $bdesc, $bdate, $oid, $empid);
   $stmt = sqlsrv_query($conn,$sql,$param);

    if( $stmt == false ) {
             echo "<script type='text/javascript'>alert('Error')</script>";
           }else
           {
             echo "<script type='text/javascript'>alert('Added Successfully!')</script>";
           }
   }
 


     if (isset($_POST['submit1'])){
       $bid = $_POST['edit1'];
   
   

       $sql = "DELETE FROM breakdown WHERE bid = '$bid'";
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
<style type="text/css">
  .view input[value="Add New"] {
  outline: none;
  height: 25px;
  width: 100px;
  background: #837D7C;
  color: white;
  font-size: 15px;
  margin-left: 72%
}
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
        
        <td><b></b></td>
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_breakdownDetails01 ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                  <form action="breakdown1.php" method="post">
                    <tr>
                  
                  <td style="background-color: white; height: 50px;"><?php echo $row["bid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["bdesc"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["bdate"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["oname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["ename"]; ?></td>
                   
                  <input type="hidden" name="edit" value="<?php echo $row["bid"]; ?>">
                  <td style="background-color: white; height: 50px;"><input type="submit" name="submit" value="Edit"></td>
                  </tr>
                  </form>
                  

               <?php
            }

                   

                    
        ?>
      
    </table><br><br><br>
    <a href="breakdown2.php"><input class="theme" type="submit" name="" value="Add New"></a>
    <br><br>
    <hr>
    
    
  </div>

</div>

</body>
</html>