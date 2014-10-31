<?php

session_start();

if(!isset($pageRequiresLogin)) {
	$pageRequiresLogin = false;
}

//if you are not logged in but the page does require login, then redirect to login page
if(!isset($_SESSION['id_user']) && $pageRequiresLogin) {
	header("Location: login.php");
	die();                        //die after redirect
}

//get user object and log them out if that user is not in the database
if(isset($_SESSION['id_user'])) {
	$user = $em->getRepository("Users")->find($_SESSION['id_user']);
	if(!$user) {
		session_destroy();
		header("Location: login.php");
		die();
	}
}

