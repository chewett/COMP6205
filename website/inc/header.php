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

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
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
			<a class="navbar-brand active" href="login.php">Login</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">

				<?php
					//display the Account Overview tab only if user is logged in
					if(isset($_SESSION['id_user']) && $_SESSION['id_user']){
						echo '<li><a class="navbar-brand active" href="accountOverview.php">Account Overview</a></li>';
					}
				?>

				<?php
					//display the transfer money tab only if user is logged in
					if(isset($_SESSION['id_user']) && $_SESSION['id_user']){
						echo '<li><a class="navbar-brand active" href="transferMoney.php">Transfer Money</a></li>';
					}
				?>
				
				
				<?php
					//display the admin tab only if user is logged in and has at least one of the roles below
					if(isset($_SESSION['id_user']) && $_SESSION['id_user']){
						if((userHasPermission("admin_users_assign") ||
						userHasPermission("admin_view_roles") ||
						userHasPermission("admin_view_permission") ||
						userHasPermission("admin_view_concerns") ||
						userHasPermission("admin_site_options"))) {
							echo '<li><a class="navbar-brand active" href="admin.php">Admin</a></li>';
						}
					}
					
				?>
				<li><a class="navbar-brand active" href="aboutUs.php">About Us</a></li>
				<?php
				//display the transfer money tab only if user is logged in
				if(isset($_SESSION['id_user']) && $_SESSION['id_user']){
					echo '<li><a class="navbar-brand active" href="login.php?logout=true&token=' . generateLogoutToken() .'">Logout</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>

<div class="container">
	<div class="main_content">

		<?php
		if(isset($user)) {
			?>
			<div class="user-details alert alert-info">Welcome <?=$user->getFirstname();?> <?=$user->getLastname()?> </div>
		<?php } ?>
