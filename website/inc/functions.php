<?php

require_once 'datetimeset.php';
require_once 'doctrine_setup.php';

/**
 * Given a set of permissions check to see if the permission you are looking for is in that set
 * @param $permissions A list of permissions
 * @param $permissionName The permission you are searching for
 * @return bool If the permission is in the given permission set
 */
function permissionInPermissions($permissions, $permissionName) {
	return in_array($permissionName, $permissions);
}

/**
 * Given a user, bank account type and name it will create a bank account in the database
 * @param $name The name of the bank account
 * @param Accounttype $type The type of the bank account
 * @param Users $user The user object who owns the bank account
 * @return Bankaccount The bank account object created
 */
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

/**
 * Given the account associated with it, it will create an issue with the given details
 * @param Bankaccount $accountId Account name associated
 * @param $title Title of the issue
 * @param $description The description of the problem
 * @param Users $user The user reporting the issue
 * @return Issue The issue object created
 */
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

/**
 * Given two bank accounts, an amount and description it will create a transaction and transfer the money
 * @param Bankaccount $from Account to transfer the money from
 * @param Bankaccount $to Account to transfer the money to
 * @param int $amount The amount to transfer
 * @param string $description The description of the transfer
 * @return Transaction The newly created transaction
 */
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

/**
 * Given the issue it will be closed
 * @param $issue The issue to be closed
 */
function closeIssue($issue) {
	$em = getEntityManager();
	$issue->setStatus(1); //resolve issue
	$em->flush();
}
