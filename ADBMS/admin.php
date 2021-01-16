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
  .table {
    background-color: #EBEEE5;
    
    
  }
  .table td {
   
    font-family: Helvetica, sans-serif;
    color: black;
    background-color: #EBEEE5;
  }

  

  .date {
    padding-left: 700px;

  }
  div.content {
  margin-left: 200px;
  padding: 1px 2px;
  height: 1500px;
  background-color: #DCDCD0;
}

.t1 tr {
   height: 80px;
   width: 300px;
   color: white;
   padding-right: 30px;
}
</style>
</head>
<body>
   
  

<div class="sidebar">
  <a style="background-color: #909B69;" href="#home"><b>ABC Pvt Ltd</b></a>
  <a class="active" href="#">Dashboard</a>
  <a href="employee.php">Employees</a>
  <a href="breakdown.php">Breakdown<br> &nbsp&nbsp Maintanance</a>
  <a href="schedule.php">Schedule<br> &nbsp&nbsp Maintanance</a>
  <a href="orders.php">Orders</a>
  <a href="invoice.php">Invoices</a>
  <a href="suppliers.php">Suppliers</a>
</div>

<div class="content">
    

<div class="topnav">
  <a href="#"><img class="image" src="business.jpg">Business</a>
  <a href="users.php"><img class="image" src="user.jpg">Users</a>
  <a href="#"><img class="image" src="support.jpg">Support</a>
  <a href="conn.php"><img class="image" src="Logout.png">Logout</a>
  <b class="date">Date : 
           <?php
         
        
        echo date("M,d,Y ") . "<br>"; 
        
     

      ?>
  </b>
</div>

  <div class="view">
  	<h2>Dashboard</h2><hr>
    <br>
    <b>Short Term Maintanance</b><hr>
    <table class="table">
      <tr>
        
        <td style="background-color: #EFEEA7;"><b>Name</b></td>
        <td style="background-color: #EFEEA7;"><b>Frequency<br>(weeks)</b></td>
        <td style="background-color: #EFEEA7;"><b>Check<br>(last date)</b></td>
        
        <td style="background-color: #EFEEA7;"><b></b></td>
      </tr>
      
        <?php
            $query = "SELECT * FROM dbo.v_scheduleDetails WHERE freq < 5";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                <form action="schedule1.php" method="post"> 

                  <tr> 
                  <td ><?php echo $row["sdesc"]; ?></td>
                  <td ><?php echo $row["freq"]; ?></td> 
                  <td ><?php echo $row["sdate"]; ?></td>
                  <input type="hidden" name="edit" value="<?php echo $row["sid"]; ?>">
                  <td style=" height: 50px;"><input type="submit" name="submit" value="view"></td>
                  </tr>
                </form>
               <?php
            }

                                       
        ?>
      
    </table>
    <br><hr><br>
     <b>Payments</b><hr>
     <table class="t1">
       <tr style="background-color: #131D77;">
         <td style="width: 150px;"><b>No. of Invoices :</b></td>
         <td style="width: 50px;">
           <b>
             <?php
           $sql = "SELECT * FROM dbo.v_invoiceDetails";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $stmt = sqlsrv_query( $conn, $sql , $params, $options );

            $row_count = sqlsrv_num_rows( $stmt );
               
            if ($row_count === false)
               echo "Error in retrieveing row count.";
            else
               echo $row_count;

                    
            ?>
           </b>
         </td>
       </tr>
     </table><br><br><hr>
    
   
    <b>Orders</b><hr>
    <table class="table">
      <tr style="height: 30px;">
        <td style="background-color: #EFEEA7;"><b>No. of Orders :</b>
        
           <b>
            <?php
           $sql = "SELECT * FROM dbo.v_orderDetails";
            $params = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $stmt = sqlsrv_query( $conn, $sql , $params, $options );

            $row_count = sqlsrv_num_rows( $stmt );
               
            if ($row_count === false)
               echo "Error in retrieveing row count.";
            else
               echo $row_count;

                    
            ?>
          </b>
        </td>
        <td style="background-color: #EFEEA7;"><b></b></td>
        <td style="background-color: #EFEEA7;"><b></b></td>
      </tr>
      <tr>
        <td style="background-color: #EFEEA7;"><b>Order Name</b></td>
        <td style="background-color: #EFEEA7;"><b>Qty</b></td>
        <td style="background-color: #EFEEA7;"><b>Supplier Name</b></td>
      </tr>
      <?php
            $query = "SELECT * FROM dbo.v_orderDetails";
            $stmt = sqlsrv_query($conn,$query);
            while ($row=sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC)) {
              
            ?>
                 

                  <tr style="height: 40px;"> 
                  <td>&nbsp&nbsp<?php echo $row["oname"]; ?></td>
                  <td>&nbsp&nbsp<?php echo $row["qty"]; ?></td>
                  <td>&nbsp&nbsp<?php echo $row["spname"]; ?></td>
                  </tr>
               
               <?php
            }

                                       
        ?>

    </table><br>
   
  
    
  </div>

</div>

</body>
</html>
