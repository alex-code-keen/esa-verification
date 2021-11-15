<?php
require(dirname(__FILE__).'/../config/config.php');

//if(isset($_POST['submit'])){
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // $first_name =$_POST['first_name'];
  // $last_name  =$_POST['last_name'];
	$email      =$_POST['email'];
	$password   =$_POST['password'];  
	$status     =0;  
  $activation =md5($email.time());  
  
  // ****** Check Ontraport for email
  //echo "<script>alert('Registration successful, please verify $email in the registered Email-Id');</script>";
  //exit;

  // ****** There is an email in Ontraport

    // ****** Update MySQL Entry
    // ****** Send Activation Code    

  // ****** There is no email in Ontraport

    // ****** Make new Contact entry in OP
    // ****** Update MySQL Entry
    // ****** Send Activation Code

  //$query=mysql_query("insert into userregistration(name,email,password,mobile,activationcode,status) values('$name','$email','$password','$mobile','$activationcode','$status')");
  //$sql = "SELECT * FROM v_op_contacts_01 where contact_id=".$id;
  //$result = mysqli_query($link, $sql) or die('[{"Error":"Problem with executing query:' . mysqli_error($conn) . '"}]');

//	if($result){
  if($email){
   // $to=$email;
    $to='test-u3mmtwn1r@srv1.mail-tester.com';
    $msg= "Thanks for new Registration.";   
    $subject = "Email Verification";
    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";    
    //$headers .= 'From: Service <info@esa-apps.com>'."\r\n";
    $headers .= 'From: Alex <alex.code.keen@gmail.com>'."\r\n";
    $headers .= 'Reply-To:  Alex <alex.code.keen@gmail.com>'."\r\n";
    $headers .= 'To: Allex <test-u3mmtwn1r@srv1.mail-tester.com>'."\r\n";
    $headers .= "X-Mailer: PHP/" . PHP_VERSION."\r\n";
    
            
    $ms.="<html></body><div><div>Dear $email,</div></br></br>";
    $ms.="<div style='padding-top:8px;'>Your account information is successfully updated in our server. Please click the following link for verifying and activation your account.</div>
    <div style='padding-top:10px;'><a href='//104.248.191.131/demos/signup-form-email-verification/email_verification.php?code=$activationcode'>Click Here</a></div>
    <div style='padding-top:4px;'> powered by <a href='esa-apps.com'>esa-apps.com</a></div></div>
    </body></html>";

    $res = mail($to,$subject,$ms,$headers);

    echo "<script>alert('Registration successful with $res, please verify in the registered Email-Id');</script>";
    echo "<script>window.location = 'login.php';</script>";
	}
	else
	{
		echo "<script>alert('Data not inserted');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Support Pets</title>
    <!-- Styles and Fonts -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/materialize.min.css" />
    <link rel="stylesheet" href="./css/main.css" />
  </head>

  <body>
    <div class="container-fluid">
      <header class="login-header">
        <div class="login-header__top-line"></div>
        <div class=" container center-align login-header__logo-container">
          <img
            class="logo"
            src="./img/logo-form.png"
            alt="support pets members area"
          />
        </div>
      </header>
      <!-- LOGIN FORM SECTION -->
      <section class="center-align login-section">
        <div class="container">
          <div class="row">
            <div class="col m3"></div>
            <div class="col m6">
              <div class="login-section__right">
                <div class="center-align right-top">
                  <h5 class="right-top__heading">sign up</h5>
                  <p class="right-top__pre">                   
                    Enter Your Email / Login <br>to receive account Activation Code and<br>Password for initial system login.
                  </p>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="application/x-www-form-urlencoded" name="login-form" method="post" class="login-form">
                <!-- form action="" name="login-form" method="post" class="login-form" -->
                  <!-- div class="row login-form__row">
                    <div class="input-field col s12">
                      <input id="first_name" type="text" value="<?php echo $first_name; ?>" required/>
                      <label for="first_name">First Name</label>
                    </div>
                  </div>     
                  <div class="row login-form__row">
                    <div class="input-field col s12">
                      <input id="last_name" type="text" value="<?php echo $last_name; ?>" required/>
                      <label for="last_name">Last Name</label>
                    </div>
                  </div -->     
                  <div class="row login-form__row">
                    <div class="input-field col s12">
                      <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        class="validate"                         
                        required/>
                      <label for="loginEmail">Email</label>
                    </div>
                  </div>                              
                  <div class="row login-form__row">
                    <div class="input-field col s12">
                      <input
                        id="password"
                        name="password"
                        type="password"
                        class="validate"
                        required />
                      <label for="loginPassword">Password</label>
                    </div>
                    <div class="input-field col s12">
                      <!--input class="btn btn-large btn-register waves-effect waves-light" id="verify" type="submit" value="Sign In" -->
                      <button
                        class="btn btn-large btn-register waves-effect waves-light"
                        type="submit"
                        name="submit"                        
                      >
                      Sign Up
                      </button>
                    </div>
                  </div>
                  <!-- div class="login-form__socials">
                    <div class="border-or"><span>OR</span></div>
                    <a href="#" class="social-fcb">Log in with Facebook</a>
                    <a href="#" class="social-psw">Forgot password ?</a>
                  </div -->
                </form>
              </div>
              <!-- div class="center-align signin-block">
                Don't have an account?
                <a class="signin-link" href="./dashboard.html">Sign Up</a>
              </div -->
            </div>
            <div class="col m3"></div>
          </div>
        </div>
      </section>

      <!-- FOOTER -->
      <footer class="footer">
        <div class="container">
          <div class="row row-revert">
            <div class="col s12 m6 center-align">
              <div class="footer__rights">
                © 2020 - Support Pets - All rights reserved
              </div>
            </div>
            <div class="col s12 m6 center-align">
              <div class="footer__links">
                <a href="#" class="link">Terms & Conditions</a>
                <a href="#" class="link">Privacy Policy</a>
                <a href="#" class="link">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Scripts  -->
    <script src="js/min-jquery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>