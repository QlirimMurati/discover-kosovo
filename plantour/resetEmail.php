<?php
	session_start();
	if (isset($_SESSION['uemail'])) {
		header("Location: planatour.php");
		exit();
	}
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
    <script src="../sweetalert.js"></script>
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
		<div id="resetEmailFrame" class="accountForm">
		<form id="signup" method="post" action="resetPassword.php">
			<h2>Reset Email</h2>
		  	<div class="input-group">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			    <input  type="text" class="form-control" name="emailReset" placeholder="Email">
		  	</div>
		  	<div class="input-group" id="buttonBlock">
			    <input type="submit" class="form-control" name="createAccount" value="Reset">
		  	</div>
		  	<div class="input-group error">
		  		<?php if (isset($_GET['login'])) {
		  			if ($_GET['login']=="empty") {
		  				echo "<p>Empty fields left!</p>";
		  			}
		  			elseif($_GET['login']=="error"){
		  				echo "<p>Wrong email!</p>";
		  			}
		  			elseif ($_GET['login']=="success") {
		  				echo "<script>";
						echo "swal('Success!', 'Check your email for reseting password', 'success');";
						echo "</script>";
		  			}
		  			else{
		  				echo "<p>This account doesn't exist!</p>";
		  			}
		  		}?>
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