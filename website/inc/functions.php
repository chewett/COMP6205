<?php

require_once 'doctrine_setup.php';

function permissionInPermissions($permissions, $permissionName) {
	return in_array($permissionName, $permissions);
}

function createBankAccount($name, $type, $user) {
	global $em;

	$account = new Bankaccount();
	$account->setBalance(0); //lol
	$account->setName($name);
	$account->setIdAccounttype($type);
	$account->setIdUser($user);

	$em->persist($account);
	$em->flush();

}

