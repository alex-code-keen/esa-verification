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
			
			<div style="text-align:left;">
				<h4>System message:</h4>
        <br>        
        <div style="text-align:center;"><?php echo $err_msg; ?></div>
      </div>
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
