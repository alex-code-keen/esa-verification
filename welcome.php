<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;	
}

$userid = 101;
if(!isset( $_SESSION["userid"]) || $_SESSION["userid"] !== true){
	$userid= $_SESSION["userid"];
}

$uuid = "some weird num";
if(!isset( $_SESSION["uuid"]) || $_SESSION["uuid"] !== true){
	$uuid= $_SESSION["uuid"];
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>    
	<title>Welcome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
	<!-- Optional theme -->
	<!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" -->
	<!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" -->
	<!-- DataTables -->
	<!--link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"-->

	<!--link rel="stylesheet" type="text/css" href="basic.css"-->
	<link rel="stylesheet" type="text/css" href="./css/welcome.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  

</head>
<body>

<nav class="navbar navbar-custom navbar-fixed-top">
	<div class="container-fluid navbar-custom">            
		<div class="navbar-custom navbar-header">
			<a class="navbar-custom navbar-brand" href="">Your ESA partner</a>
		</div>        
		<ul class="nav navbar-custom navbar-nav">
			<li class="navbar-custom active"><a href="">Home</a></li>
			<!-- li class="navbar-custom"><a href="pets.php">Pets</a></li>                
			<li class="navbar-custom dropdown">
				<a class="navbar-custom dropdown-toggle" data-toggle="dropdown" href="">Documents
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="">House</a></li>
					<li><a href="">Travel</a></li>
					<li><a href="airline.php">Airlines</a></li>
					<li><a href="">Custom</a></li>
				</ul>
			</li>                
			<li class="navbar-custom dropdown">
				<a class="navbar-custom dropdown-toggle" data-toggle="dropdown" href="">Gallery
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="gallery.php">View</a></li>
					<li><a href="upload.php">Upload</a></li>
				</ul>
			</li--> 
			<li class="navbar-custom"><a href="">Messages</a></li>
		</ul>
		<ul class="nav navbar-custom navbar-nav navbar-right">
			<li class="navbar-custom dropdown">
				<a class="navbar-custom dropdown-toggle" data-toggle="dropdown" href="">
				<span class="glyphicon glyphicon-user"></span>  Profile <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<!-- li><a href="">User info</a></li -->
					<li><a href="reset-password.php">Reset Password</a></li>
				</ul>
			</li>
			<li class="navbar-custom"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  SignOut</a></li>
		</ul><br>
	</div>
</nav>

<div class="container">
  <h3>Any welcome message header</h3>
  <p>.. more like excavation site here</p>
  <p><?php echo 'userid -> '.$userid; ?></p>
  <p><?php echo 'uuid -> '.$uuid; ?></p>
	<br>
	<a href="index.html">Main ESA Verification (non-secure version)</a><br>
	<a href="landlordrequest.html">Landlord Request (non-secure version)</a><br>
	<a href="landlordrequestty.html">Landlord Request Thank You(non-secure version)</a><br>
</div>



</body>
</html>