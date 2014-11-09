<?php

session_start();

//This stores the permissions the user has access to
$permissions = array();

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

    $qb = $em->createQueryBuilder();
    $qb->select("perm")
        ->from("Rolehaspermission", "perm")
        ->where("perm.idRole = ?1")
        ->setParameter(1, $user->getIdRole());
    $query = $qb->getQuery();
    /** @var Rolehaspermission[] $permissions */
    $permissionsObjects = $query->getResult();

    foreach($permissionsObjects as $permission) {
        $permissions[] = $permission->getIdPermission()->getName();
    }

}

function userHasPermission($permissionName) {
    global $permissions;
    return in_array($permissionName, $permissions);
}

function redirectUnauthorized(){
    require_once(__DIR__ . '/../unauthorized.php');
    die();
}