<?php

session_start();

//This stores the permissions the user has access to
$permissions = array();
$siteOptions = array();

//If the page doesnt say it needs login, define it as false
if(!isset($pageRequiresLogin)) {
	$pageRequiresLogin = false;
}

//if you are not logged in but the page does require login, then redirect to login page
if(!isset($_SESSION['id_user']) && $pageRequiresLogin) {
	header("Location: login.php?requirelogin=1&pagetitle=$pageTitle");
	die();                        //die after redirect
}

//get user object and log them out if that user is not in the database
if(isset($_SESSION['id_user'])) {
	/** @var Users $user */
	$user = $em->getRepository("Users")->find($_SESSION['id_user']);
	if(!$user) {
		session_destroy();
		header("Location: login.php");
		die();
	}

	//Get all the users permissions
    $qb = $em->createQueryBuilder();
    $qb->select("perm")
        ->from("Rolehaspermission", "perm")
        ->where("perm.idRole = ?1")
        ->setParameter(1, $user->getIdRole());
    $query = $qb->getQuery();
    /** @var Rolehaspermission[] $permissions */
    $permissionsObjects = $query->getResult();

	//Gets the names and stores them in a flat array
    foreach($permissionsObjects as $permission) {
        $permissions[] = $permission->getIdPermission()->getName();
    }

	/** @var Options[] $optionsObjects */
	$optionsObjects = $em->getRepository("Options")->findAll();
	foreach($optionsObjects as $option) {
		$siteOptions[$option->getKeyname()] = $option->getValue();
	}

	//If site is in maintenance mode or the variable isnt set
	if(!isset($siteOptions['maintenance_mode'])) {
		die('warning maintenance_mode not present in the database');
	}else if($siteOptions['maintenance_mode'] == 'true' && !userHasPermission('maintenance_mode')){
		die('Site in maintenance_mode, you cannot access it currently');
	}

}

/**
 * This checks the users permission array to see if the user has the given permission
 * @param $permissionName The permission you are checking to see if the user has
 * @return bool True if the user has the permission
 */
function userHasPermission($permissionName) {
    global $permissions;
    return permissionInPermissions($permissions, $permissionName);
}

/**
 * Displays the unauthorized page if the user cannot access the page
 */
function redirectUnauthorized(){
    require_once(__DIR__ . '/../unauthorized.php');
    die();
}