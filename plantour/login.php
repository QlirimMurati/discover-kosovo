<?php
	include 'config.php';
	if (isset($_SESSION['uemail'])) {
		header("Location: planatour.php");
		exit();
	}
	else if (isset($_COOKIE['email'])) {
		header("Location: loginVerify.php");
		exit();
	}


	$redirectURL="http://localhost/discover-kosovo-master/plantour/login.php/fb-callback.php";
	$permissions=['email'];
	$loginURL=$helper->getLoginUrl($redirectURL,$permissions);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kosovo Nature</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="profileStyle.css">
	<link rel="stylesheet" href="../menu.css">
	<link rel="stylesheet" href="../scroll-up-button.css">
    <script src="../scroll-up.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
    </style>
</head>
<body>
<header class="mainheader ">	
	<nav>
	 	<div class="simg">
            <a  href="mailto:qlirimmurati@gmail.com">
              <img id="secureEmail" src="../images/menu/gmail.png" alt="gmail">
             </a>
            <a href="https://facebook.com">
              <img src="../images/menu/facebook.png"  alt="facebook">
           </a>
           <a href="https://twitter.com/">
               <img src="../images/menu/twitter.png"  alt="twitter">
           </a>
        </div>
			<ul>
				<li><a href="../index.html"> HOME</a></li>
					<li><a href="../about/about-kosovo.html"> ABOUT KOSOVO</a></li>
					<li> <a href="../discover/discover.html"> DISCOVER</a>
						<ul>
							<li><a href="nature.html">DESTINATIONS</a></li>
                            <li><a href="../discover/activities/activities.php">ACTIVITIES</a></li>
						</ul>
					</li>
					<li class="active"><a href="login.php">PLAN A TOUR</a></li>
					<li><a href="../contact/contact.php">CONTACT US</a></li>
			</ul>

    </nav>
</header>

       <!-- Butoni per scroll up -->
	<button onclick="topFunction()" id="Btn"  title="Go to top"><p></p></button>

	<div id="container">
		<div id="loginFrame" class="accountForm">
		<form id="signup" method="post" action="loginVerify.php">
			<h2>Sign In</h2>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			    <input  type="text" class="form-control" name="email" placeholder="Email">
		  	</div>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			    <input type="password" class="form-control" name="password" placeholder="Password">
		  	</div>
		  	<div class="input-group" id="textBlock">
		  		<input type="checkbox" name="remember"><label>Remember Me</label>
			    <p><a href="resetEmail.php">Forgot Password?</a></p>
		  	</div>
		  	<div class="input-group" id="buttonBlock">
			    <input type="submit" class="form-control" name="createAccount" value="Login">
			</div>
			<div class="input-group" id="buttonBlock">
				<p style="text-align: center;">OR</p>
			    <input id="fbButton" type="button" class="form-control" name="facebookLogin" value="Login with Facebook" onclick="window.location='<?php echo $loginURL ?>'">
			</div>			
		  	<div class="input-group error">
		  		<?php if (isset($_GET['login'])) {
		  			if ($_GET['login']=="empty") {
		  				echo "<p>Empty fields left!</p>";
		  			}
		  			else{
		  				echo "<p>Wrong email or password!</p>";
		  			}
		  		}?>
		  	</div>
		  	<div class="input-group" style="margin-top: -20px;">
		  		<hr>
			    <p style="text-align: center">Don't have an account? <b><a href="signup.php">REGISTER HERE</a></b></p>
		  	</div>
		</form>
		</div>
	</div>

<div class="footer ">
	<p> Copyright &copy  2017-2018. All Rights Reserved </p>
</div>

<script type="text/javascript" src="showdetails.js"></script>
</body>
</html>