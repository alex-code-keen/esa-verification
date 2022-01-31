<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;	
}

// require( dirname(__FILE__).'/../config/config.php' ); //  <- dev $link
require( dirname(__FILE__).'/config/config_sql.php' ); // <- prod $link

header('Expires: Tue, 01 Jan 2000 00:00:00 GMT');
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache'); 

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="./img/favicon.png">
	<title>ESA Verification</title>
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
					ESA Access
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
						<li><a href="reset_password.php">Reset Password</a></li>
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
			<div class="letter-space message-wrapper">

				<p><b>Dear <?php echo $jsonObj->firstname." ".$jsonObj->lastname; ?>,</b></p>

				<p>Congratulations on your ESA approval.</p>
				<p>Use the link below to access your ESA documentation along with a personal note from 
					the approving health professional. <b>Be sure to read the additional information</b> listed 
					on this page to better understand how federal laws protect your rights with an Emotional Support Animal.
				</p>				
				<p>We've also given you access to receive custom ESA forms for landlord requests. when you need 
					them follow the instructions below to submit those requests.
				</p>

				<?php if ( empty($esa_docs) || (float)$esa_docs == 0) {  ?>
					<p><b>Your ESA documents have not been approved yet or they are expired.</b></p>
				<?php } else { ?>
					<p><a href="https://drive.google.com/open?id=<?php echo $esa_docs; ?>">
						Click Here to view and print your ESA Documents
					</a></p>
				<?php }; ?>

				<p>Your ESA Verification number is: <b>ESA369<?php echo $jsonObj->op_id; ?></b></p>

				<p>We think it is important for our customers to be armed with the facts on how ESA laws work, so
					 you know that you're fully protected under all federal housing laws.
				</p>
				<p>If any landlord attempt to give you push back, be sure to let them know you understand 
					your rights and are fully covered to have your Emotional Support Animal(s) with you.
				</p>
				<!-- p><b>View the federal laws on the link below.</b></p>
				<p>1.  Housing HUD Laws <a href="">click here</a></p -->
				<p><b>Planning to move? We've got you covered!</b></p>
				<p>As a customer of "Support Pets" <b>you now have exclusive access</b>
					to the first of its kind system that makes getting custom Landlord forms signed by the health professional a breeze.
				</p>
				<p>If your landlord or management has a custom ESA verification form that 
					needs to be signed by the health professional not a problem. Use the link below to submit your request form.
				</p>
				<p><b>Please note:</b>  Our health professionals will provide the completed 
					mental health portion of the form. Some landlords may also request that your 
					veterinarian signs off that your pet's shots are up to date so plan ahead.
				</p>

				<p>To submit your landlord request form click the link below:</p>				
				<a href="landlordrequest.php">Click here to request a custom landlord form</a>
				<br>
				<p><br><b class="underline">Get The Most From Your ESA!</b>
					<br>
					<a href="https://secure.supportpets.com/Official-ESA-Vest">Click Here</a> to 
					Order The <b>Official ESA ™ Vest</b><br>				
					<a href="https://secure.supportpets.com/clearance-sale-esa-id-cards-with-free-certificate-renewal">Click Here</a> to 
					Order The <b>Official ESA ™ ID Card (Free Certificate Included)</b>
				</p>

				<p>Refer friends and family that are in need of our services. We'll take great care of them, 
					And you"ll receive <b>$20 Amazon.com Gift Card</b> for every friend you refer!
				</p>				

				<p><a href="https://www.supportpets.com/refer-a-friend-esa-portal-simple-email/">Click Here</a> 
					to Refer & Earn $20 Amazon.com Gift Card
				</p>

				<p>Lastly, as you know ESA approval is based on your current emotional needs which may change over time.</p>
				<p>We all go through rough periods in our life where we have more stress and anxiety than usual. 
					ESA requests can only be provided for a maximum of up to one year.
				</p>
				<p>Your ESA documents are valid for the maximum time - Before the year is 
					up we'll contact you to renew your ESA at a discounted rate as a valued customer.
				</p>

				<p class="m-end-0">Have any questions? Email our support team for
					assistance: <a href="mailto:info@supportpets.com" target="">info@supportpets.com</a>				
				</p>

			</div>
		</div>
	</section>
	<!-- END DASHBOARD SECTION -->
	<!-- BEGIN FOOTER -->
	<footer class="dashboard-footer">
		<p class="m-b-15">In Accordance with Federal Laws</p>
		<img class="footer-logo m-b-15" src="./img/dashboard-footer-logo.JPG" alt="logo">
		<p class="m-b-15">&copy; 2022 ESA Verification</p>
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