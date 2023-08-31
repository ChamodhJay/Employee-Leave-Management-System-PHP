<?php

session_start();
include('includes/config.php');



if (isset($_POST['signin'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM tblemployees where EmailId ='$username' AND Password ='$password'";
	$query = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if ($count > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			if ($row['role'] == 'Admin') {
				$_SESSION['alogin'] = $row['emp_id'];
				$_SESSION['arole'] = $row['Department'];
				echo "<script type='text/javascript'> document.location = 'admin/admin_dashboard.php'; </script>";
			} elseif ($row['role'] == 'Staff') {
				$_SESSION['alogin'] = $row['emp_id'];
				$_SESSION['arole'] = $row['Department'];
				echo "<script type='text/javascript'> document.location = 'staff/index.php'; </script>";
			} else {
				$_SESSION['alogin'] = $row['emp_id'];
				$_SESSION['arole'] = $row['Department'];
				echo "<script type='text/javascript'> document.location = 'heads/index.php'; </script>";
			}
		}

	} else {


		$errorMsg = "..Email or Password Incorrect. Please try again later...";

		echo '<div id="errorDiv" style="background-color: #f44336;display:flex-box; color: white;position: absolute; padding: 0px; text-align: center; margin-left: 35%; margin-right: 35%; opacity: 0; transform: translateY(-50%);">';
		echo '<span style="font-size: 18px;">:..Error..:</span>';
		echo '<p style="font-size: 17px; margin-top: 5px;">' . $errorMsg . '</p>';
		echo '</div>';

		echo '<style>';
		echo '@keyframes fadeIn {';
		echo '   0% { opacity: 0; transform: translateY(-50%); }';
		echo '   100% { opacity: 1; transform: translateY(0%); }';
		echo '}';

		echo '#errorDiv {';
		echo '   animation: fadeIn 0.9s ease-in-out forwards;';
		echo '}';
		echo '</style>';
	}


}


?>

<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Pulathisi Leave Manager</title>

	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/logo32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/logo16.png">
	<link rel="stylesheet" href="vendors/styles/stylev.css">
	<link rel="stylesheet" href="vendors/styles/button.css">

	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/valid.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/overwritecss.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/stylev.css">


	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>



</head>

<body>
	<img class="wave" src="Login-Form-master/img/wave.png">

	<img class="left" src="Login-Form-master/img/cons.svg">


	<div class="container">
		<div class="img">
			<img src="src/images/pulathisi.png">
		</div>

		<div class="login-content">
			<form name="signin" method="post" onsubmit="return validateForm();">
				<img src="Login-Form-master/img/profile pic.svg">
				<h2 class="name">welcome </h2>
				<div class="input-div one">
					<div class="i">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div class="div">
						<h5>Email id</h5>
						<input type="text" class="input" name="username" id="username">


					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password" id="password">

					</div>
				</div>
				<a href="otp code/index.php">Forgot Password?</a>
				<input type="submit" class="btn" name="signin" id="signin" value="Sign In">
				<div id="error-message" style="color: red;margin-left: 17%;"></div>
			</form>
		</div>
	</div>



	<script>
  // Function to validate the form
  function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Check if the username and password are empty
    if (username.trim() === '' && password.trim() === '') {
      showError('Please enter both your email id and password.');
      return false;
    }

    // Check if the username is empty
    if (username.trim() === '') {
      showError('Please enter your email id');
      return false;
    }

    // Check if the password is empty
    if (password.trim() === '') {
      showError('Please enter your password');
      return false;
    }

    // Check email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(username)) {
      showError('Please enter a valid email address.');
      return false;
    }
  }

  // Function to display error message
  function showError(message) {
    var errorDiv = document.getElementById('error-message');
    errorDiv.innerHTML = message;
    errorDiv.style.display = 'flex';
  }
</script>





	<!-- js -->
	<script src="Login-Form-master/js/main.js"></script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>

</body>

</html>