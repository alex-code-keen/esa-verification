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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="./img/favicon.png">
	<title>Welcome</title>
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,700&display=swap">
	<!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>

<body>
	<!-- BEGIN NAVBAR -->
	<header>
		<nav class="navbar navbar-fixed-top dashboard-navbar">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<div class="navbar-logo-wrapper">
						<img src="./img/ESA_logo.PNG" class="navbar-logo" alt="ESA"/> 
					</div>
					<span>Your ESA partner</span>
				</a>
			</div> 
			<div class="navbar-menu-mobile"></div>       
			<ul class="nav navbar-nav navbar-right">
				<!-- <li class="active"><a href="">Home</a></li>
				<li class=""><a href="">Messages</a></li> -->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="">
					<span class="glyphicon glyphicon-user"></span>  Profile <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="reset-password.php">Reset Password</a></li>
					</ul>
				</li>
				<li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  SignOut</a></li>
			</ul>
		</nav>
	</header>
	<!-- END NAVBAR -->

	<!-- BEGIN DASHBOARD SECTION -->
	<section class="dashboard-section">
		<div class="container">
		<h3>Welcome!</h3>
		<p>.. more like excavation site here</p>
		<p><?php echo 'userid -> '.$userid; ?></p>
		<p><?php echo 'uuid -> '.$uuid; ?></p>
		<a class="nav-link" href="index.html">Main ESA Verification (non-secure version)</a>
		<a class="nav-link" href="landlordrequest.html">Landlord Request (non-secure version)</a>
		<a class="nav-link" href="landlordrequestty.html">Landlord Request Thank You(non-secure version)</a>
		</div>
	</section>
	<!-- END DASHBOARD SECTION -->

	<!-- BEGIN FOOTER -->
	<footer class="dashboard-footer">
		<p class="m-b-15">In Accordance with Federal Laws</p>
		<img class="footer-logo m-b-15" src="./img/dashboard-footer-logo.JPG" alt="logo">
		<p class="m-b-15">&copy; 2021 ESA Verification</p>
		<ul class="list-inline footer-list">
			<li><a href="#">Terms</a></li>
			<li><a href="#">Privacy</a></li>
			<li><a href="#">Doctors</a></li>
		</ul>
	</footer>
	<!-- END FOOTER -->
	
	<!-- BEGIN SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./js/navbar.js"></script>
	<!-- END SCRIPTS -->
</body>
</html>