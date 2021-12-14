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
		<!-- Begin Password Criteria -->
		<section class="content-center">
			<h2 class="section-heading-small">Create a Password to Access your ESA Documents</h2>
			<div class="snippet">
				<label class="snippet-heading">PASSWORD MUST BE</label>
				<div class="snippet-body">
					<ul>
						<li>At least 8 and up to 32 characters long</li>
						<li>Should consist of a-z, A-Z, 0-9 and special characters (!@#$%^&*)</li>
						<li>Include 1 or more numbers</li>
						<li>Include 1 or more special characters <b>! @ # $ % ^ & *</b></li>
					</ul>
				</div>
			</div>
		</section>
		<!-- End Password Criteria -->
		<!-- Begin Form -->
		<section class="form-wrapper m-t-30">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
					enctype="application/x-www-form-urlencoded" 
					name="login-form" 
					method="post" 
					class="needs-validation" 
					novalidate>
					<div class="form-group form-input-group">
						<label>New Password</label>
						<div class="input-group">
							<input 
								type="password" 
								class="form-control pwd has-error" 
								id="enter_pass" 
								name="enter_pass" 			
								required />
							<span id="reveal0" class="input-group-addon reveal">
								<i class="bi bi-eye-slash" id="togglePassword0"></i>					
							</span>
							<span id="helper0" class="help-block"></span>
						</div>
					</div>
					<div class="form-group  form-input-group">
						<label>Re-enter Password</label>					
						<div class="input-group">
							<input 
								type="password"
								class="form-control pwd has-error"	
								id="reenter_pass"
								name="reenter_pass"						
								required />
							<span id="reveal1" class="input-group-addon reveal">
								<i class="bi bi-eye-slash" id="togglePassword1"></i>
							</span>
							<span id="helper1" class="help-block"></span>
						</div>	
					</div>
					<div class="verify-wrap">																			
						<input id="verify" type="submit" class="btn btn-primary btn-large" value="Submit New Password">					
					</div>				
				</form>
			</section>
		<!-- End Form -->
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
	<script type="text/javascript" src="./js/reset_ok.js"></script>
    <!-- END SCRIPTS -->
</body>

</html>











