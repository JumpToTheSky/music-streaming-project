<?php

include("includes/includedFiles.php");
if(!isset($_SESSION['userLoggedIn'])) {
	header("Location: register.php");
}

?>

<div class="userDetails">
	<div class="container borderBottom">
		
		<div class="detailusername">
			<h1 class="username">
				<?php echo $userLoggedIn->getFirstAndLastName(); ?>
			</h1>
		</div>
		<div class='hightline2' style="margin: 0 380px 0px 380px;"></div>
		<div class="updateEmail">
			<h2>Cập nhật email: </h2>
			<input type="text" class="email" name="email" placeholder="Địa chỉ email..." value="<?php echo $userLoggedIn->getEmail(); ?>">
			<span class="message"></span>
		</div>
		
		<button class="button" onclick="updateEmail('email')">SAVE</button>
	</div>

	<div class="container">
		<h2>Cập nhật mật khẩu</h2>
		<input type="password" class="oldPassword" name="oldPassword" placeholder="Mật khẩu hiện tại">
		<input type="password" class="newPassword1" name="newPassword1" placeholder="Mật khẩu mới">
		<input type="password" class="newPassword2" name="newPassword2" placeholder="Nhập lại mật khẩu">
		<span class="message"></span>
		<button class="button" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">SAVE</button>
	</div>
</div>