<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: logout.php");
  exit;	
}

header('Expires: Tue, 01 Jan 2000 00:00:00 GMT');
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache'); 

// ToDo: check / handle missing userid
// -- checking it later
// if( !isset( $_SESSION["userid"] )){
// 	$userid = "2240";	
// 	//   header("location: logout.php");
// 	//   exit;	
// } else {
// 	$user_id = $_SESSION["userid"];
// }

// make include here
// require( dirname(__FILE__).'/../config/config.php' ); //  <- dev $link
require( dirname(__FILE__).'/config/config_sql.php' ); // <- prod $link

#------------------------------------------
function clearStoredResults( $mysqli_link ){
#------------------------------------------
	while( $mysqli_link->next_result() ){
		if( $l_result = $mysqli_link->store_result() ){
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
	if( empty( trim( $_SESSION[ "userid" ]))){
		$err_msg = "Something was wrong. Try again later, please. 6";
	} else {
		$user_id = $_SESSION[ "userid" ];
	}

	// check if uuid is still with us
	// if( empty( trim( $_SESSION[ "uuid" ]))){
	// 	$err_msg = "Something was wrong. Try again later, please. 3";
	// } else {
	// 	$uuid = $_SESSION[ "uuid" ];
	// }

	// hopefully we've checked everything

	// start some action
	if( $err_msg == '' ){
		
		try{

			// *** *** *** 
			// let's set the pass for uuid
			$arr_types = "ss";
			$pass_hash = password_hash( $enter_pass, PASSWORD_DEFAULT ); // Creates a password hash

			$sql = "SELECT fn_set_contact_password_by_id( ?, ? ) as 'res';";
			$stmt = mysqli_prepare( $link, $sql );
			mysqli_stmt_bind_param( $stmt, $arr_types, $user_id, $pass_hash ); 
			mysqli_stmt_execute( $stmt );
	
			$res = mysqli_stmt_get_result( $stmt );
			$row = mysqli_fetch_assoc( $res );
			// print_r($row);		
	
			$result = $row['res'];

			// XXX - contact_id / user_id - "activation_code" match and "is_active"=1 and "password" is null and within 48 hours		
			// 0 - SQL function abnormal error
			// 1 - contact_id was not found			
			if ( $result == 0 ){ $err_msg = "Something was wrong. Try again later, please.";  }
			if ( $result == 1 ){ $err_msg = "Something was wrong. Try again later, please.";  }
			
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
			$_SESSION[ "userid" ] 	= $user_id;
			// 
			header( "location: esaverification.php" );
			exit;
		}

	}
	
} else {
	
	// first-time non-POST entry
	// header( "location: logout.php" );
	// exit;

}

if (  $err_msg == '' ) {
  include ('reset_password_ok.php');
	// echo 'ok';
} else {
  include ('reset_password_err.php');
	//echo $err_msg;
}
 
?>
 