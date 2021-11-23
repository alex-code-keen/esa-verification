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
    <title>ESA Verification</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,700&display=swap">
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
        </section>
        <!-- End Logo Section -->
        <!-- Begin Reset Message -->
        <section class="content-center">
          <h2 class="section-heading-small">Your password restore request was sent.</h4>
          <p class="body-copy">Please, check your email for further instructions. It may take up to a few minutes to show up.</p>
          <div class="snippet snippet-hint m-t-30">
              <div class="snippet-body">
                <p><span class="text-bold p-r-5">Tip:</span>If you can't see email in Incoming folder - try to Refresh your email or search in Spam folder before requesting again.</p>
              </div>
            </div>
        </section>
        <!-- End Reset Message -->
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
 






