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
   $uid = $_POST['uid'];
   $uname = $_POST['uname'];
   $cno = $_POST['cno'];
   $pword = $_POST['pword'];
   

   $sql = "INSERT INTO admin (aid,uname,contact,pword) VALUES (?,?,?,?)";
   $param = array($uid, $uname, $cno, $pword);
   $stmt = sqlsrv_query($conn,$sql,$param);

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
  <a href="breakdown.php">Breakdown<br> &nbsp&nbsp Maintanance</a>
  <a href="schedule.php">Schedule<br> &nbsp&nbsp Maintanance</a>
  <a href="orders.php">Orders</a>
  <a class="active" href="invoice.php">Invoices</a>
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
  	<h2>Users</h2><hr>
    <table class="table">
      <tr>
        <td><b>User ID</b></td>
        <td><b>User Name</b></td>
        <td><b>Contact NO.</b></td>
        
      </tr>
      
        <?php
            $query = "SELECT * FROM admin ";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                  
                    <tr>
                  
                  <td style="background-color: white; height: 50px;"><?php echo $row["aid"]; ?></td> 
                  <td style="background-color: white;"><?php echo $row["uname"]; ?></td>
                  <td style="background-color: white;"><?php echo $row["contact"]; ?></td>
                
                  </tr>
                  
                  

               <?php
            }

                   

                    
        ?>
      
    </table><br><br>
    
    <hr><br><br><br><br>
    <h2>Add User</h2><hr>
    <form action="users.php" method="post">
      <b>User ID</b><br>
    <input type="text" name="uid" required><br><br>

    <b>User Name</b><br>
    <input type="text" name="uname" required><br><br>

    <b>Contact No.</b><br>
    <input type="text" name="cno" required><br><br>

    <b>Password</b><br>
    <input type="text" name="pword" required><br><br>

    <input type="submit" name="submit" value="Add">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="reset" name="clear" value="clear">
    </form>

  </div>

</div>

</body>
</html>