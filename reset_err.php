<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toggle Password Visibility</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body>
    <div class="container">
      <h1>Sign In</h1>
      <form method="post">
        <p>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username">
        </p>
        <p>
          <label for="password0">Password:</label>
          <input type="password" name="password0" id="password0" />
          <i class="bi bi-eye-slash" id="togglePassword0"></i>
        </p>
        <button type="submit" id="submit" class="submit">Log In</button>
      </form>
    </div>
    <script type="text/javascript" src="./js/reset_ok.js"></script>
  </body>
</html>