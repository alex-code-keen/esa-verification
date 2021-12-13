<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//   header("location: login.php");
//   exit;	
// }

require( dirname(__FILE__).'/../config/config.php' ); // <- $link

#------------------------------------------
function clearStoredResults($mysqli_link){
#------------------------------------------
	while($mysqli_link->next_result()){
		if($l_result = $mysqli_link->store_result()){
			$l_result->free();
		}
	}
}

if( !isset( $_SESSION["userid"] )){
	$userid = "2240";	
} else {
	$userid = $_SESSION["userid"];
}
/*
try{
	// *** *** *** 
	// let's find out contact data
	
	$arr_types = "i";	
	$sql = "SELECT fn_get_json_contact_esa_doc_by_id( ? ) as 'res';";
	$stmt = mysqli_prepare( $link, $sql );
	mysqli_stmt_bind_param( $stmt, $arr_types, $userid ); 
	mysqli_stmt_execute( $stmt );

	$res = mysqli_stmt_get_result( $stmt );
	$row = mysqli_fetch_assoc( $res );
	// print_r($row);		

	$jsonObj = json_decode( $row['res'] );
	$esa_docs = $jsonObj->esa_docs;
	// {"op_id": 2240, "gender": 1, "esa_docs": null, "lastname": "Falcone", "firstname": "Alex", "parent_id": null, "is_over_18": 1, "email_prime": "alex.code.keen@gmail.com"}
	// echo $jsonObj;
	
	// Free stored results
	clearStoredResults( $link );
	$res->free();
	$res->close();
	$link->next_result();
	// *** *** *** 

} catch( Exception $e ) {

	// $username_err = "Server error occured. Try again later.";
	mysqli_stmt_close( $stmt );
	mysqli_close( $link );
	// 
	// header( "location: err_page.php" );
	exit;
	
} finally {

	mysqli_stmt_close( $stmt );
	mysqli_close( $link );		

} // try
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Focaloid">
	<meta name="keywords" content="Focaloid">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ESA LandLord Request</title>
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;700&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/style.css?ver=0.1">
	<!-- link rel="stylesheet" type="text/css" href="./css/styles.css" -->
</head>
<body>
	<!-- BEGIN NAVBAR -->
	<!-- header>
		<nav class="navbar navbar-fixed-top dashboard-navbar">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<div class="navbar-logo-wrapper">
						<img src="./img/ESA_logo.PNG" class="navbar-logo" alt="ESA"/> 
					</div>
					ESA Access
				</a>
			</div> 
			<div class="navbar-menu-mobile"></div>       
			<ul class="nav navbar-nav navbar-right">
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
	</header -->
	<!-- END NAVBAR -->
	<!-- BEGIN DASHBOARD SECTION -->
	<section class="landlordrequest">
		<div class="inner-container">
			<img class="logo" src="images/support-pets.jpg" alt="support-pets">
			<h1 class="title">Submit Custom ESA Housing Request</h1>
			<img class="center-img" src="images/home.jpg" alt="home">
			<p class="sub-title">To get started with your custom landlord and management company ESA request check the box below.</p>
			<label class="checkcontainer">Check to Start Your Request
				<input type="checkbox">
				<span class="checkmark"></span>
			</label>
			<button class="button-1 m-b-20">Submit and continue to next step</button>
			<button class="button-1">I don't need it. Take me back</button>
		</div>
	</section>
	<!-- END DASHBOARD SECTION -->
	<!-- BEGIN FOOTER -->
	<!-- footer class="dashboard-footer">
		<p class="m-b-15">In Accordance with Federal Laws</p>
		<img class="footer-logo m-b-15" src="./img/dashboard-footer-logo.JPG" alt="logo">
		<p class="m-b-15">&copy; 2021 ESA Verification</p>
		<ul class="list-inline footer-list">
			<li><a href="#">Terms</a></li>
			<li><a href="#">Privacy</a></li>
			<li><a href="#">Doctors</a></li>
		</ul>
	</footer -->
	<!-- END FOOTER -->
	<!-- BEGIN SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./js/navbar.js"></script>
	<!-- END SCRIPTS -->		
</body>
</html>