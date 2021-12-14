<?php
// Initialize the session



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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="./img/favicon.png">
	<title>ESA LandLord Request</title>
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
					Your ESA partner
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
	</header>
	<!-- END NAVBAR -->
	<!-- BEGIN DASHBOARD SECTION -->
	<section class="dashboard-section">
		<div class="container content-center">
            <img class="dashboard-inner-logo" src="img/support-pets.jpg" alt="support-pets">
            <h1 class="page-heading">Submit Custom ESA Housing Request</h1>
            <img class="dashboard-img" src="img/home.jpg" alt="home">
            <div class="max-width-small">
                <p class="body-copy">To get started with your custom landlord and management company ESA request check the box below.</p>
                <div class="checkbox-wrapper">
                    <label class="checkbox-container">Check to Start Your Request
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="button-group full-width">
                    <button class="btn btn-primary full-width">Submit and continue to next step</button>
                    <button class="btn btn-neutral full-width">I don't need it. Take me back</button>
                </div>
            </div>
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