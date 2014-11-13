<?php

require_once 'datetimeset.php';
require_once 'doctrine_setup.php';

function permissionInPermissions($permissions, $permissionName) {
	return in_array($permissionName, $permissions);
}

function createBankAccount($name, $type, $user) {
	$em = getEntityManager();

	$account = new Bankaccount();
	$account->setBalance(0);
	$account->setName($name);
	$account->setIdAccounttype($type);
	$account->setIdUser($user);

	$em->persist($account);
	$em->flush();

	return $account;
}

function createNewIssue($accountId, $title, $description, $user)
{
	$em = getEntityManager();
	$issue = new Issue;
	$issue->setIdBankaccount($accountId);
	$issue->setTitle($title);
	$issue->setDescription($description);
	$issue->setIdUser($user);
	$issue->setStatus(0); //unresolved by default

	$em->persist($issue);
	$em->flush();

	return $issue;
}

function transferMoney($from, $to, $amount, $description) {
	$em = getEntityManager();

	$transaction= new Transaction;
	$transaction->setIdBankaccountFrom($from);
	$transaction->setIdBankaccountTo($to);
	$transaction->setDescription($description);
	$transaction->setAmount($amount);
	$transaction->setTime(new DateTime("now"));

	//modify balances
	$from->setBalance($from->getBalance()-$amount);
	$to->setBalance($to->getBalance()+$amount);

	$em->persist($transaction);
	$em->flush();

	return $transaction;
}

function closeIssue($issue) {
	$em = getEntityManager();
	$issue->setStatus(1); //resolve issue
	$em->flush();
}
