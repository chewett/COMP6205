<?php

session_start();

//This stores the permissions the user has access to
$permissions = array();
$siteOptions = array();

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

	/** @var Options[] $optionsObjects */
	$optionsObjects = $em->getRepository("Options")->findAll();
	foreach($optionsObjects as $option) {
		$siteOptions[$option->getKeyname()] = $option->getValue();
	}

	if(!isset($siteOptions['maintenance_mode'])) {
		die('warning maintenance_mode not present in the database');
	}else if($siteOptions['maintenance_mode'] == 'true' && !userHasPermission('maintenance_mode')){
		die('Site in maintenance_mode, you cannot access it currently');
	}

}

function userHasPermission($permissionName) {
    global $permissions;
    return in_array($permissionName, $permissions);
}