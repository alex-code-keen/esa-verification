<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if( isset( $_SESSION["loggedin"] ) && $_SESSION["loggedin"] === true ){
  header( "location: welcome.php" );
  exit;
}

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

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $err_msg = "";
 
// Processing form data when form is submitted
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
  
  // Check if username is empty
  if( empty( trim( $_POST["username"] ))){
      $username_err = "Please enter email.";
  } else{
      $username = trim( $_POST["username"] );
  }
    
  // Check if password is empty
  if( empty( trim( $_POST["password"] ))){
      $password_err = "Please enter password.";
  } else{
      $password = trim( $_POST["password"] );
  }

  // Validate credentials
  if( empty( $username_err ) && empty( $password_err )){

    try {
           
			// *** *** *** 			
			$arr_types = "s";
			// $pass_hash = password_hash( $enter_pass, PASSWORD_DEFAULT ); // Creates a password hash

			$sql = "SELECT fn_get_contact_login_by_email( ? ) as 'res';";
			$stmt = mysqli_prepare( $link, $sql );
			mysqli_stmt_bind_param( $stmt, $arr_types, $username ); 
			mysqli_stmt_execute( $stmt );
	
			$res = mysqli_stmt_get_result( $stmt );
			$row = mysqli_fetch_assoc( $res );

			//echo $row['res'];

      $userid           = strstr( $row['res'], '|' , true);
      $hashed_password  = substr( strstr( $row['res'], '|' ), 1 );
      // echo $userid;
      // echo $hashed_password;

      // userid = 0 - no contact_id for email
      // userid = 1 - password is null
      // userid = XXX - there is  auser and a password
      if ( empty( $userid )){ $err_msg = "Server error occured. Try again later. 1"; }
      if ( $userid == 0 ){ $err_msg = $username_err = "The email you entered was not valid. 2"; }
			if ( $userid == 1 ){ $err_msg = "Password was not set. Try resetting it. 3";  }
		
      // Free stored results
      clearStoredResults( $link );
      $res->free();
      $res->close();
      $link->next_result();
      // *** *** *** 

      if ( $err_msg == '' ){
        // compare passwords
        // if ( $password == $hashed_password ){
        if ( password_verify( $password, $hashed_password )){
          
          // Password is correct, so start a new session
          session_start();

          // Store data in session variables
          $_SESSION["loggedin"] = true;
          $_SESSION["userid"] = $userid;
          // $_SESSION["username"] = $username;                            
          
          // Redirect user to welcome page
          header("location: welcome.php");

        } else{   

          usleep( 500000 ); // wait for .5 sec to make brute-force harder          
          $password_err = $err_msg=  "The password you entered was not valid. 5";

        }
      } else {

        usleep( 500000 ); // wait for .5 sec to make brute-force harder

      }

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
      // echo $err_msg ;
		
		} // try

		// if ( $err_msg == '' ){
		// 	$_SESSION[ "loggedin" ] = true;
		// 	$_SESSION[ "userid" ] 	= $userid;
		// 	// 
		// 	header( "location: welcome.php" );
		// 	exit;
		// }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="./img/favicon.png">
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,700&display=swap">
      <!-- Icons -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />  
      <!-- Styles -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="./css/styles.css">
      <title>ESA Verification</title>
  </head>

  <body>
      <!-- BEGIN PAGE CONTENT -->
      <main class="page-container">

        <!-- Begin Logo Section -->
        <section class="page-header-section">
          <h1 class="page-heading">ESA Verification</h1>
          <img id="esa-logo" class="logo" src="./img/ESA_logo.PNG" alt="ESA logo" />
        </section>
        <!-- End Logo Section -->

        <!-- Begin Form Section -->
        <section class="form-wrapper">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
                enctype="application/x-www-form-urlencoded" 
                name="login-form" 
                method="post" 
                class="needs-validation" 
                novalidate>

            <div class="form-group">
              <label for="username">Email</label>
              <input  type="text" 
                      class="form-control" 
                      id="username" 
                      name="username" 
                      value="<?php echo $username; ?>" 
                      required>                      
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group form-input-group">
              <label for="password">Password</label>
              <div class="input-group">
                <input type="password" 
                      class="form-control has-error" 
                      id="password" 
                      name="password" 
                      required />
                <span id="reveal" class="input-group-addon reveal">
                  <i class="bi bi-eye-slash" id="togglePassword"></i>					
                </span>
              </div>
              <span class="help-block"><?php echo $password_err; ?></span>              
            </div>    

            <div class="verify-wrap">
              <input id="verify" type="submit" class="btn btn-primary btn-large" value="Submit To Verify">
            </div>
            
          </form>
          <!-- Forgot Password -->
          <div id="forgotten"><a class="link-primary" href="forgot.php">Forgot password?</a></div>      
        </section>
        <!-- End Form Section -->
        
      </main>
      <!-- END PAGE CONTENT -->

      <!-- BEGIN FOOTER -->
      <footer>
          <span class="rights-text">© 2021 ESA Verification</span>
      </footer>
      <!-- END FOOTER -->

      <!-- BEGIN SCRIPTS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <!-- Page Specific Scripts -->
      <script type="text/javascript" src="./js/login.js"></script>
      <!-- END SCRIPTS -->
  </body>

</html>