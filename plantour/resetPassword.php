<?php
	if (isset($_POST['emailReset'])) {
		if (empty($_POST['emailReset'])) {
			header("Location: resetEmail.php?login=empty");
			exit();
		}
		else if (!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $_POST['emailReset'])) {
			$error= "<p><b>Please type a valid email address</b></p>";
			header("Location: resetEmail.php?login=error");
			exit();
		}
		else{
			include("dbConnect.php");
			$email=fixInput($_POST['emailReset']);
			$db->select_db('discoverkosovo');
			$queryInsert="select uemail,upassword from users where uemail='".$email."'";
			$result=$db->query($queryInsert);

			if($result->num_rows){
				$row=$result->fetch_assoc();
				$email_from = "discover-kosovo.tk";
            	$email_subject = "Password Reset - Discover Kosovo";
            	$email_body = "Copy and paste the above code to the url ".$row['upassword'];

       			$to = $_POST['emailReset'];
        		$headers = "From: discover-kosovo@noreply.com \r\n";

		
				mail($to,$email_subject,$email_body,$headers);
				header("Location: resetEmail.php?login=success");
				exit();
			}
			else{
				header("Location: resetEmail.php?login=error2");
				exit();
			}
		}
	}

	elseif (isset($_POST['resetPassword'])) {
		if (!isset($_POST['password']) or !isset($_POST['passwordC'])) {
			header("Location: resetEmail.php?login=empty");
			exit();
		}
		elseif ($_POST['password']!=$_POST['passwordC']) {
			header("Location: resetEmail.php?login=error");
			exit();
		}
		else {
			$newPassword=sha1($_POST['password']);
			$queryUpdate="update users set upassword='".$newPassword."'where upassword='".$code."'";
			$updateResult=$db->query($queryUpdate);
			if($db->affected_rows){
				echo "<script>";
				echo "swal('Success!', 'Your password has been reseted', 'success');";
				echo "</script>";
				header( "refresh:5;url=login.php"); //automatic redirect
			}
			else{
				echo "<script>";
				echo "swal('Failure!', 'Please try again to reset password', 'error');";
				echo "</script>";
				header( "refresh:5;url=login.php"); //automatic redirect
			}
		}
	}
		
	else{
		header("Location: login.php");
		exit();
	}

?>