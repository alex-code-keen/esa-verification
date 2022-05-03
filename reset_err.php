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
	<!-- Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />  
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
		<!-- Begin Error Message -->
		<section class="content-center">
			<div class="snippet snippet-error">
				<label class="snippet-heading">System Message</label>
				<div class="snippet-body">
					<?php echo $err_msg; ?>
				</div>
                <div class="snippet-body">
                    <a class="link-primary" href="login.php">Login</a>
                </div>
                <div class="snippet-body">
                    <a class="link-primary" href="forgot.php">Forgot password?</a>
                </div>
			</div>
		</section>
		<!-- End Error Message -->
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
	<script type="text/javascript" src="./js/reset_ok.js"></script>
    <!-- END SCRIPTS -->
</body>

</html>












