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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />    
  <link rel="stylesheet" type="text/css" href="./css/styles.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <title>ESA Verification</title>
</head>

<body>
  
  <div class="container">
		<div class="row"><div class="col-xs-1"></div><div class="col-xs-10">

			<div class="heading">
			<p class="heading-label">ESA Verification</p>
			<img id="esa-logo" class="logo" src="./img/ESA_logo.PNG" alt="ESA logo" />
			</div>

		</div><div class="col-xs-1"></div></div>    

		<div class="row"><div class="col-xs-3"></div><div class="col-xs-6">
			
			<span id="forgotten">
				PASSWORD MUST BE:<br>
				- At least 8 and up to 32 characters long<br>
				- Should consist of a-z, A-Z, 0-9 and special characters (!@#$%^&*)<br>
				- Include 1 or more numbers<br>
				- Include 1 or more special characters <b>! @ # $ % ^ & *</b><br>				
			</span>		
			<p></p> 			
			<p></p>
			<p></p>

		<!-- /div><div class="col-xs-2"></div></div>

		<div class="row"><div class="col-xs-3"></div><div class="col-xs-6" -->
			<form 
				action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
				enctype="application/x-www-form-urlencoded" 
				name="login-form" 
				method="post" 
				class="needs-validation" 
				novalidate>
				
				
				<label>New Password:</label>
				<div class="input-group">
					
					<input 
						type="password" 
						class="form-control pwd has-error" 
						id="enter_pass" 
						placeholder="Enter new password" 
						name="enter_pass" 			
						required />

					<span id="reveal0" class="input-group-addon reveal">
						<i class="bi bi-eye-slash" id="togglePassword0"></i>					
					</span>
					<span id="helper0" class="help-block"></span>
				</div>	
				<br>		

				<label>Re-enter Password:</label>					
				<div class="input-group">

					<input 
						type="password"
						class="form-control pwd has-error"	
						id="reenter_pass"
						placeholder="Re-enter new password"
						name="reenter_pass"						
						required />

					<span id="reveal1" class="input-group-addon reveal">
						<!-- i class="glyphicon glyphicon-eye-close reveal-glyph"></i-->
						<i class="bi bi-eye-slash" id="togglePassword1"></i>
					</span>
					<span id="helper1" class="help-block"></span>
				</div>									
				<br>
				
				<div class="verify-wrap">																			
					<input id="verify" type="submit" class="btn btn-primary" value="Submit New Password">					
				</div>				

				<span id="forgotten">				
				</span>					

			</form>
			
		</div><div class="col-xs-3"></div></div>

  </div>
  <footer>
	<!-- div>
	  <img id="federal-laws-logos" class="logos" src="./img/Federal_Laws_logos.PNG" alr="Federal Laws logos" />
	</div -->
		<span class="rights-text">© 2021 ESA Verification</span>
  </footer>

	<script type="text/javascript" src="./js/reset_ok.js"></script>
</body>

</html>
