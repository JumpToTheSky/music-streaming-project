<div id="header">
	<?php include("includes/login.php")?>
	<!-- <div id="openPopup" class="myPopup show">
		<div>
			<a href="#close" title=" Close" class="close">X</a> 
			<h2>POPUP WINDOW</h2> 
			<p>Hello!</p>
			<p>Welcome to Wikitechy this is a popup window created using HTML and CSS</p>
		</div>
	</div> -->
		<ul id="nav">
			<li>
				<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
					<img src="assets/images/icons/logo.png">
				</span>
			</li>
			<li>
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Trang chủ
				</span>
			</li>
			<li>
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Nhạc của bạn
				</span>
			</li>
			<li >
				<span class ="navItemLink" style="display: inline-block;">Tiểu Mục</span>
				<ul class="subnav">
					<li><a href=""></a>mục 1</li>
					<li><a href=""></a>mục 2</li>
					<li><a href=""></a>mục 3</li>
				</ul>
			</li>


			<div class= "nar-right" style="position: absolute;">
				<li>
					<span role='link' tabindex='0' onclick="openPage('search.php')" class="navItemLink">
						Tìm kiếm
					<!-- <img src="assets/images/icons/search.png" class="icon" alt="Search"> -->
					</span>
				</li>
				<li>
					<a style="text-decoration: none; color:aliceblue" class="navItemLink"  href="#openPopup">Đăng nhập</a>		
				</li>
				<li>
					<span role='link' tabindex='0' onclick="openPage('register.php')" class="navItemLink">
						Đăng kí
					</span>
				</li>

				<li >
					<!-- <span class ="navItemLink" style="display: inline-block;">Tiểu Mục</span> -->
					
					<span role="link" tabindex="0"  class="logo " class ="navItemLink">
						<img class = "logo_w navItemLink" src="assets/images/icons/people.png">
					</span>
					
					<div class="#personal nav-account"style="position: absolute;">
						<ul class="subnav nav-account" > 
							<li>
								<span role="link" tabindex="0" onclick="openPage('updateDetails.php')" class="navItemLink">Cập nhật tài khoản
								</span>
							</li>
							<li>
								<!-- <span role="link" tabindex="0" onclick="logout()" class="navItemLink">Đăng xuất -->
								<span role="link" tabindex="0" onclick="logout()" class="navItemLink">Đăng xuất
								</span>
							</li>
						</ul>
					</div>
				</li>
			</div>

		</ul>
		

		<!-- <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			<img src="assets/images/icons/logo.png">
		</span>


		<div class="group">

			<div class="navItem">
				<span role='link' tabindex='0' 
					onclick="openPage('search.php')" class="navItemLink">
					Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browsed
				</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music
				</span>
			</div>

			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName(); ?>
				</span>
			</div>
		</div> -->

</div>



