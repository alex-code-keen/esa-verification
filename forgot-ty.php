<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if( isset( $_SESSION["loggedin"] ) && $_SESSION["loggedin"] === true ){
//     header( "location: dashboard.php" );
//     exit;
// }

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

  <div class="row"><div class="col-xs-2"></div><div class="col-xs-8">

    <h4>Your password restore request was sent.</h4>
    <p></p>
    <h4>Please, check your email for further instructions. It may take up to a few minutes to show up.</h4>
    <p></p>
    <h4><b>Tip</b>: If you can't see email in Incoming folder - try to Refresh your email or search in Spam folder before requesting again.</h4>
    
  </div><div class="col-xs-2"></div></div>

    <footer>
      <!-- div>
        <img id="federal-laws-logos" class="logos" src="./img/Federal_Laws_logos.PNG" alr="Federal Laws logos" />
      </div -->
      <span class="rights-text">© 2021 ESA Verification</span>
    </footer>
  </div>
</body>

</html>
