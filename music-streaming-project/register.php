<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Slotify!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>ĐĂNG NHẬP</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Tên đăng nhập</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Mật khẩu</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">Đăng nhập</button>

					<div class="hasAccountText">
						<span id="hideLogin">Bạn chưa có tài khoản? Đăng kí ngay.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Tạo tài khoản miễn phí</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Tên đăng nhập</label>
						<input id="username" name="username" type="text" placeholder="e.g. vu am cac" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">Họ</label>
						<input id="firstName" name="firstName" type="text" placeholder="e.g. Vu" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Tên</label>
						<input id="lastName" name="lastName" type="text" placeholder="e.g. Am" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. milo@gmail.com" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Nhập lại email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. milo@gmail.com" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">mật khẩu</label>
						<input id="password" name="password" type="password" placeholder="mật khẩu của bạn" required>
					</p>

					<p>
						<label for="password2">Nhập lại mật khẩu</label>
						<input id="password2" name="password2" type="password" placeholder="Mật khẩu của bạn" required>
					</p>

					<button type="submit" name="registerButton">Đăng kí</button>

					<div class="hasAccountText">
						<span id="hideRegister">Bạn đã có tài khoản? Đăng nhập ở đây.</span>
					</div>
					
				</form>


			</div>

			<div id="loginText">
				<h1>VŨ ÂM CÁC - THẾ GIỚI ÂM NHẠC</h1>
				<h2>Nghe nhạc miễn phí</h2>
				<ul>
					<li>Âm nhạc quyến rũ, chất lượng cao</li>
					<li>Tạo playlist là quá đễ dàng</li>
					<li>Giao diện đẹp, dễ gần</li>
				</ul>
			</div>

		</div>
	</div>

</body>
</html>