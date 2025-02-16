<?php
session_start();
$c = mysqli_connect("localhost", "root", "", "maru");
$err = '';
if (isset($_POST["login"])) {
	$m = $_POST["email"];
	$p = $_POST["password"];
	$s = "SELECT * FROM customers where mail='$m'";
	$r = mysqli_query($c, $s);
	$n = mysqli_num_rows($r);
	if ($n == 0) {
		$err = "* Email does not exist!";
	} else {
		$password = mysqli_fetch_assoc($r)['password'];
		if ($password != sha1($p)) {
			$err = "* Password is wrong!";
		} else {
			$expirationTime = time() + (3600);
			setcookie("mail", $m, $expirationTime);

			header('Location:index.php');
			
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="shortcut icon" type="image/png" href="image/favicon.png"/>

	<title>Login</title>
</head>

<body class="body_login">
<?php
    include('header.php');
    ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<form method="post">
					<span class="login100-form-title">
						Member Login
					</span>
					<div class="error">
						<?= $err ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button name="login" class="login100-form-btn">
							Login
						</button>
					</div>

					<!-- <div style="text-align: center;">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Password?
						</a>
					</div> -->
					<br><br><br>
					<div style="text-align: center;">
						<a class="txt2" href="register.php">
							Create your Account
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="footer" style="position: relative; top: 100px;">
	<?php
    include('footer.php');
    ?>
	</div>

</body>

</html>