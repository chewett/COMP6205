<?php

session_start();

if(!isset($pageRequiresLogin)) {
	$pageRequiresLogin = false;
}

if(!isset($_SESSION['id_user']) && $pageRequiresLogin) {
	header("Location: login.php");
	die();
}

if(isset($_SESSION['id_user'])) {
	$user = $em->getRepository("Users")->find($_SESSION['id_user']);
	if(!$user) {
		session_destroy();
		header("Location: login.php");
		die();
	}
}

