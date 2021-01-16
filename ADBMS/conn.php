<?php

   $serverName = "DESKTOP-4IAPDQC";

   $connectionInfo = array("Database"=>"adbms");
   $conn = sqlsrv_connect($serverName, $connectionInfo);
/*
   if($conn) {
      echo "success. <br/>";
   }else {

    echo "failed.<br/>";
    die(print_r(sqlsrv_error(), true));
}*/

   

    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

    $sql = "SELECT * FROM admin WHERE uname='$uname' AND pword='$pword'";
    $params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$stmt = sqlsrv_query( $conn, $sql , $params, $options );
    
    $count = sqlsrv_num_rows( $stmt );

    if ($count==1) {
            header("location: admin.php");
           }
           else{
    echo "<script type='text/javascript'>alert('Invalid Login Username & Password')</script>";
    //echo "Invalid Login Credentials";
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>
	.body {
	margin: 0;
	padding: 0;
	background-color: #000;
	background-size: cover;
	background-position: center;
	font-family: sans-serif;
}
.loginbox {
	width: 400px;
	height: 500px;
	background: #191030;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px;
}
</style>

</head>
<body class="body">
	<div class="loginbox">
		<img src="admin.jpg" class="avatar">
		  <h1>Login </h1>

		  <form action="conn.php" method="POST">
		  	<p>Username</p>
		  	<input type="text" name="uname" placeholder="Enter Username">

		  	<p>Password</p>
		  	<input type="Password" name="pword" placeholder="Enter Password">
		  	<input type="submit" name="log" value="Login">
		  </form>
	</div>

</body>
</html>