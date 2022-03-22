<?php
// Initialize the session
session_start();

if ( isset( $_COOKIE["old_site_first_visit"] )){
    header ( "location: login.php" );
}

// Check if the user is already logged in, if yes then redirect him to welcome page
if( isset( $_SESSION["loggedin"] ) && $_SESSION["loggedin"] === true ){
    header( "location: dashboard.php" );
    exit;
}

header('Expires: Tue, 01 Jan 2000 00:00:00 GMT');
header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache'); 
 
// Define variables and initialize with empty values
$username = "";  //$password = "";
$username_err = ""; //$password_err = "";
$customer_id = 0;
 
// Processing form data when form is submitted
// Check if data was POSTed
if( $_SERVER["REQUEST_METHOD"] == "POST" ){ 
      
  // Check if username is empty
  if( empty( trim( $_POST["username"] ))){
    $username_err = "Please enter email.";    
  } else{
    $username = trim( $_POST["username"] );
  }

  // check if email is 5 symbols long
  if( strlen( $username ) <= 5 ){
    $username_err = "Email should have more than 5 symbols.";    
  } 

  // Check if password is empty
  // if( empty( trim( $_POST["password"] ))){
  //     $password_err = "Please enter password.";
  // } else{
  //     $password = trim( $_POST["password"] );
  // }

  // Now we can include config file - $link or $sql originates there
  // require( dirname(__FILE__).'/../config/config.php' ); // <- $link
  // require( dirname(__FILE__).'/../config/config_klaviyo.php' );
  // require( dirname(__FILE__).'/../config/config.php' ); //  <- dev $link
  require( dirname(__FILE__).'/config/config_sql.php' ); // <- prod $link
  require( dirname(__FILE__).'/config/config_klaviyo.php' );
  
  // Validate credentials
  if( empty( $username_err )){ //  && empty( $password_err )){
    
    try {
      // Prepare a select statement
      // !!!!!!!!!!!!!
      // $username = 'alex.code.keen@gmail.com';
      // !!!!!!!!!!!!!
      $arr_types = "s";
      $sql = "SELECT fn_insert_pass_activation_code_by_email( ? ) as 'res';";
      $stmt = mysqli_prepare( $link, $sql );
    
      mysqli_stmt_bind_param( $stmt, $arr_types, $username ); 
      mysqli_stmt_execute( $stmt );
    
      $res = mysqli_stmt_get_result( $stmt );
      $row = mysqli_fetch_assoc( $res );
      $activation_code = $row['res'];
      // $obj_customer = new stdClass();
      // $obj_sql_customer = json_decode( $row['res'] );
      // $email = $obj_sql_customer->email;
      mysqli_stmt_close( $stmt );    
      // //free resources
      mysqli_free_result( $res );   
      
      if( $activation_code == '-1' ){

        // no customer found with such email
        $username_err = "Wrong email.";
        usleep( 500000 ); // .5 sec to make brute-force harder

      } else if ( $activation_code == '0' ) {

        // SQL SP execution failed
        $username_err = "Server error occured. Try again.";
        usleep( 500000 ); // .5 sec to make brute-force harder

      } else {                        

        // Send email with uuid
        // activation_code        

        $data = rawurlencode('{
          "token" : "'.$api_public.'",
          "event" : "Password Restoration Link",
          "customer_properties" : {
            "$email" : "'.$username.'"
          },
          "properties" : {
            "pass_url" : "'.$activation_code.'"
          }
        }');

        $url = "https://a.klaviyo.com/api/track";

        $curl = curl_init();

        curl_setopt_array( $curl, array(
          CURLOPT_URL             => $url,
          CURLOPT_RETURNTRANSFER  => true,
          CURLOPT_ENCODING        => "",
          CURLOPT_MAXREDIRS       => 10,
          CURLOPT_TIMEOUT         => 30,
          CURLOPT_FOLLOWLOCATION  => true,
          CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST   => "POST",          
          CURLOPT_POSTFIELDS      => "data=".$data,    // this are my post vars for Klaviyo
          CURLOPT_HTTPHEADER      => [
            "Accept: text/html",
            "Content-Type: application/x-www-form-urlencoded"
          ]
        ));

        $response = curl_exec($curl);

        // set cookie so old site redirect redirects to login page
        
        setcookie( "old_site_first_visit", true, time()+60*60*24*30, "/", "esaverification.org", 1);

        // Clean exit
        // $username_err = $response;
        $newURL = 'forgot-ty.php';
        header('Location: '.$newURL);
        exit();
      }
    } catch( Exception $e ) {

      $username_err = "Server error occured. Try again later.";
      
    } finally {

      mysqli_stmt_close( $stmt );
      mysqli_close( $link );

    } // try
   
  } // if( empty( $username_err ))
  
} // if( $_SERVER["REQUEST_METHOD"] == "POST" ){ 

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
      <!-- BEGIN PAGE CONTENT -->
      <main class="page-container">
          <!-- Begin Logo Section -->
          <section class="page-header-section">
              <h1 class="page-heading">ESA Verification</h1>
              <img id="esa-logo" class="logo" src="./img/ESA_logo.PNG" alt="ESA logo" />
              <h2 class="section-heading-small">Please enter the email used to receive your ESA 
                documents to reset your password. The email must match.</h2>
          </section>
          <!-- End Logo Section -->
          <!-- Begin Form Section -->
          <section class="form-wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
                  enctype="application/x-www-form-urlencoded" 
                  name="login-form" 
                  method="post" 
                  class="needs-validation" 
                  id="restore"
                  novalidate>

              <div class="form-group">
                <label for="username">Email to restore password</label>
                <input type="text" 
                       class="form-control" id="username" 
                       name="username" 
                       value="<?php echo $username; ?>" 
                       required>
                <span class="help-block"><?php echo $username_err; ?></span>
              </div>       

              <div class="verify-wrap">
                  <input id="verify" type="submit" class="btn btn-primary btn-large" value="Submit">
              </div>
            </form>
          </section>
        <!-- End Form Section -->
      </main>
      <!-- END PAGE CONTENT -->
      <!-- BEGIN FOOTER -->
      <footer>
          <span class="rights-text">© 2022 ESA Verification</span>
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







