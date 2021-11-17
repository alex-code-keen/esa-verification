<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if( isset( $_SESSION["loggedin"] ) && $_SESSION["loggedin"] === true ){
    header( "location: dashboard.php" );
    exit;
}
 
// Include config file - $link or $sql originates there
//  require_once "config.php";
require( dirname(__FILE__).'/../config/config.php' );
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
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

        // Prepare a select statement
        $sql = ""; //"SELECT id, login, psswd FROM v_doctors_www_01 WHERE login = ?";        
        if( $stmt = mysqli_prepare( $link, $sql )){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param( $stmt, "s", $param_username );
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if( mysqli_stmt_execute( $stmt )){
                // Store result
                mysqli_stmt_store_result( $stmt );
                
                // Check if username exists, if yes then verify password
                if( mysqli_stmt_num_rows( $stmt ) == 1 ){                    
                    // Bind result variables
                    mysqli_stmt_bind_result( $stmt, $id, $username, $hashed_password );
                    if( mysqli_stmt_fetch( $stmt )){
                        //if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION[ "loggedin" ] = true;
                            $_SESSION[ "userid" ] = $id;
                            $_SESSION[ "username" ] = $username;                            
                            
                            // Redirect user to welcome page
                            header( "location: dashboard.php" );
                        //} else{
                        //    // Display an error message if password is not valid
                        //    $password_err = "The password you entered was not valid.";
                        //}
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "The account you entered was not valid.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close( $stmt );
    }
    
    // Close connection
    mysqli_close( $link );
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="shortcut icon" href="./img/favicon.png">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,700&display=swap">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" type="text/css" href="./css/styles.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="./js/login.js"></script>

  <title>ESA Verification</title>
</head>

<body>
  
  <div class="container">
    <div class="row"><div class="col-xs-4"></div><div class="col-xs-4">

      <div class="heading">
        <p class="heading-label">ESA Verification</p>
        <img id="esa-logo" class="logo" src="./img/ESA_logo.PNG" alt="ESA logo" />
      </div>

    </div><div class="col-xs-4"></div></div>    

    <div class="row"><div class="col-xs-4"></div><div class="col-xs-4">
      
        <form 
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
          enctype="application/x-www-form-urlencoded" 
          name="login-form" 
          method="post" 
          class="needs-validation" 
          novalidate>
          
          <div class="form-group">
            <label for="username">Email:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter email" name="username" value="<?php echo $username; ?>" required>
          </div>
    
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control has-error" id="pwd" placeholder="Enter password" name="pswd" required>
          </div>    
    
          <div class="verify-wrap">
            <input id="verify" type="submit" class="btn btn-primary" value="Submit To Verify">
          </div>
        </form>
      

    </div><div class="col-xs-4"></div></div>
    
    <div class="row"><div class="col-xs-4"></div><div class="col-xs-4">    
      <div id="forgotten"><a href="forgot.php">Forgot password?</a></div>        
    </div><div class="col-xs-4"></div></div>    

  </div>
  <footer>
    <!-- div>
      <img id="federal-laws-logos" class="logos" src="./img/Federal_Laws_logos.PNG" alr="Federal Laws logos" />
    </div -->
    <span class="rights-text">© 2021 ESA Verification</span>
  </footer>

</body>

</html>
