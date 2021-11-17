<?php

// Initialize the session
session_start();

// make include here
require( dirname(__FILE__).'/../config/config.php' ); //  <- $link

#------------------------------------------
function clearStoredResults($mysqli_link){
#------------------------------------------
	while($mysqli_link->next_result()){
		if($l_result = $mysqli_link->store_result()){
			$l_result->free();
		}
	}
}

// declares
$uuid = $err_msg = '';
//$page_url = '/members/reset.php';

// // Check if the user is already logged in, if yes then redirect him to welcome page
// // if( isset( $_SESSION["loggedin"] ) && $_SESSION["loggedin"] === true ){

// Processing form data when form is submitted
if( $_SERVER[ "REQUEST_METHOD" ] == "POST" ){

	// Check if enter_pass is empty
	if( empty( trim( $_POST[ "enter_pass" ]))){
		$err_msg = "Something was wrong. Try again later, please. 0";
	} else {
		$enter_pass = trim( $_POST[ "enter_pass" ]);
	}
	
	// Check if reenter_pass is empty
	if( empty( trim( $_POST[ "reenter_pass" ]))){
		$err_msg = "Something was wrong. Try again later, please. 1";
	} else{
		$reenter_pass = trim( $_POST[ "reenter_pass" ]);
	}

	// check if enter_pass and reenter_pass match
	if ( $enter_pass != $reenter_pass ) {
		$err_msg = "Somehow entered passwords fields do not match. Try again. 2";
	}
	
	// check if userid is still with us
	// if( empty( trim( $_SESSION[ "userid" ]))){
	// 	$err_msg = "Something was wrong. Try again later, please.";
	// } else {
	// 	$userid = $_SESSION[ "userid" ];
	// }

	// check if uuid is still with us
	if( empty( trim( $_SESSION[ "uuid" ]))){
		$err_msg = "Something was wrong. Try again later, please. 3";
	} else {
		$uuid = $_SESSION[ "uuid" ];
	}

	// hopefully we've checked everything

	// start some action
	if( $err_msg == '' ){
		
		try{

			// *** *** *** 
			// let's set the pass for uuid
			$arr_types = "ss";
			$pass_hash = password_hash( $enter_pass, PASSWORD_DEFAULT ); // Creates a password hash

			$sql = "SELECT fn_set_contact_password_by_uuid( ?, ? ) as 'res';";
			$stmt = mysqli_prepare( $link, $sql );
			mysqli_stmt_bind_param( $stmt, $arr_types, $uuid, $pass_hash ); 
			mysqli_stmt_execute( $stmt );
	
			$res = mysqli_stmt_get_result( $stmt );
			$row = mysqli_fetch_assoc( $res );
			// print_r($row);		
	
			$userid = $row['res'];

			
			// XXX - contact_id - "activation_code" match and "is_active"=1 and "password" is null and within 48 hours		
			// 1 - "activation_code" match but password was already set
			// 2 - "activation_code" match but not within 48 hours expired
			// 3 - "activation_code" match not expired but a newer was requested
			// 0 - default - some other case.
			if ( $userid == 0 ){ $err_msg = "Something was wrong. Try again later, please.";  }
			if ( $userid == 1 ){ $err_msg = "Congratulations! Your password was already set.";  }
			if ( $userid == 2 ){ $err_msg = "Sorry, but activation code is only active within 48 hours.";  }
			if ( $userid == 3 ){ $err_msg = "Sorry, but there was a newer password requested.";  }
		
			// Free stored results
			clearStoredResults( $link );
			$res->free();
			$res->close();
			$link->next_result();
			// *** *** *** 
		
		} catch( Exception $e ) {
	
			$err_msg = "Server error occured. Try again later. 10";
			mysqli_stmt_close( $stmt );
			mysqli_close( $link );
			// !!!!!
			// header( "location: logout.php" );
			// exit;
			
		} finally {
	
			mysqli_stmt_close( $stmt );
			mysqli_close( $link );		
		
		} // try

		if ( $err_msg == '' ){
			$_SESSION[ "loggedin" ] = true;
			$_SESSION[ "userid" ] 	= $userid;
			// 
			header( "location: welcome.php" );
			exit;
		}

	}


} elseif ( isset( $_GET["uuid"] ) && !empty( trim( $_GET["uuid"] ))) {
	// we've got an email reset scenario
	$uuid = mysqli_real_escape_string( $link, $_GET['uuid'] );
	//$enter_pass_err = $uuid;
	// $userid = $_SESSION["userid"];
	
	try{

		// *** *** *** 
		// let's find out contact we've got from uuid
		$arr_types = "s";
		$sql = "SELECT fn_get_contact_id_by_activation_code( ? ) as 'res';";
		$stmt = mysqli_prepare( $link, $sql );
		mysqli_stmt_bind_param( $stmt, $arr_types, $uuid ); 
		mysqli_stmt_execute( $stmt );

		$res = mysqli_stmt_get_result( $stmt );
		$row = mysqli_fetch_assoc( $res );
		// print_r($row);		

		$userid = $row['res'];
		// echo $userid;
		
		// XXX - contact_id - "activation_code" match and "is_active"=1 and "password" is null and within 48 hours		
		// 1 - "activation_code" match but password was already set
		// 2 - "activation_code" match but not within 48 hours expired
		// 3 - "activation_code" match not expired but a newer was requested
		// 0 - default - some other case.
		if ( $userid == 0 ){ $err_msg = "Something was wrong. Try again later, please.";  }
		if ( $userid == 1 ){ $err_msg = "Congratulations! Your password was already set.";  }
		if ( $userid == 2 ){ $err_msg = "Sorry, but activation code is only active within 48 hours.";  }
		if ( $userid == 3 ){ $err_msg = "Sorry, but there was a newer password requested.";  }

		if ( $err_msg == '' ){
			$_SESSION[ "userid" ] = $userid;
			$_SESSION[ "uuid" ]   = $uuid;
			// echo $userid.'<br>';
			// echo $uuid;
		}
		
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
		header( "location: logout.php" );
		exit;
		
	} finally {

		mysqli_stmt_close( $stmt );
		mysqli_close( $link );		

	} // try
	
} else {
	
	// not a legit user
	header( "location: logout.php" );
	exit;

}

if (  $err_msg == '' ) {
  include ('reset_ok.php');
	// echo 'ok';
} else {
  include ('reset_err.php');
	//echo $err_msg;
}
 
?>
 