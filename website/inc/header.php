<?php 

//This file is used as the template header in all pages

//Settable Variables:
//$pageTitle = "title of the page in header

if(!isset($pageTitle)) {
    $pageTitle = "Unset, needs to be set";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<title><?=$pageTitle?> - Our Bank</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- CSS for the assignment Brief -->
	<link href="css/website.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand active" href="login.php">Main Page</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a class="navbar-brand active" href="accountOverview.php">Account Overview</a></li>
				<li><a class="navbar-brand active" href="transferMoney.php">Transfer Money</a></li>
				<li><a class="navbar-brand active" href="aboutUs.php">About Us</a></li>
				<li><a class="navbar-brand active" href="admin.php">Admin</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container">
	<div class="main_content">

		<?php
		if(isset($user)) {
			?>
			<div class="user-details">User Details: <?=$user->getUsername();?><br />
				<a href="login.php?logout=true">Logout</a> </div>
		<?php } ?>
