<?php
	include("includes/config.php");
	include("includes/classes/User.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
	include("includes/classes/Playlist.php");
	// include("includes/login.php");


//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
	$username = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn = '$username';</script>";
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Vũ Âm Các</title>
	<link rel="icon" href="../assets/images/icons/play.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="../assets/images/icons/play.png" type="image/x-icon"/>

	<link rel="stylesheet" type="text/css" href="./assets/css/style.css?v=2">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>

	<meta charset="UTF-8">

	<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet"> 
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">