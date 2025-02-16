<?php
session_start();
$c = mysqli_connect('localhost','root','','maru');
$err = '';

if(isset($_POST["btnReg"])){
    $fn = $_POST["name"];
    $p = $_POST["password"];
    $rp = $_POST["re_password"];
    $m = $_POST["mail"];
    $ph = $_POST["phone"];
    $a = $_POST["address"];

	$s = "SELECT * FROM customers where mail = '$m'";
	$r = mysqli_query($c,$s);
	$n = mysqli_num_rows($r);
	if ($n != 0) {
		$err = "*Your email is existed!";
	} else {
		$ep = sha1($p);
		$s = "INSERT into customers(cus_name,mail,password,phone,address) values ('$fn','$m','$ep','$ph','$a')";
		mysqli_query($c,$s);
		setcookie('mail',$m,time()+3600);

		header('Location:index.php');
		

	}	
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="shortcut icon" type="image/png" href="image/system_img/favicon.png"/>

	<title>Register</title>
</head>

<body class="body_login">
<?php
    include('header.php');
    ?>
	<div class="limiter">
		<div class="container-regist100">
			<div class="wrap-regist100">
				<form method = "POST" class = "login100-form">
					<span class="login100-form-title">
						Member Register
					</span>
					<div class="error">
						<?=$err?>
					</div>
					<br>
					<div class="wrap-input100">
						<label>Full Name<sup class = "required_mark">*</sup>:</label>	
						<input class="input100" type="text" name="name" placeholder="Ex: Anya Forger" required>
						<span class="focus-input100"></span>
						
					</div>
					<div class="wrap-input100">
						<label>Password<sup class = "required_mark">*</sup>:</label>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<label>Password Rewrite<sup class = "required_mark">*</sup>:</label>
						<input class="input100" type="password" name="re_password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<label>Email<sup class = "required_mark">*</sup>:</label>	
						<input class="input100" type="email" name="mail" placeholder="anya_forger@gmail.com" 
						required >
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<label>Phone<sup class = "required_mark">*</sup>:</label>	
						<input class="input100" type="text" name="phone" placeholder="090-123-4567" required pattern="(\+84|0)\d{9,10}">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<label>Address<sup class = "required_mark">*</sup>:</label>	
						<input class="input100" type="text" name="address" placeholder="1-1-2 Sky Street, Ha Noi." required>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button name = "btnReg" class="login100-form-btn">
							Register
						</button>
					</div>
					
					<br><br><br>
					<div style="text-align: center;">
					    Already a member? Click <a class="txt2" href="login.php">here</a> to login
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="footer" style="position: relative; top: 300px;">
	<?php
    include('footer.php');
    ?>
	</div>
</body>

</html>