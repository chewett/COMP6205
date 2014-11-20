<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	die();
}

/** @var Bankaccount $bankAccount */
$bankAccount = $em->getRepository("Bankaccount")->find((int)$_GET['id']);

if(!isset($_GET['month']) || (int)$_GET['month'] == 0 || !isset($_GET['year']) || (int)$_GET['year'] == 0)  {
	die();
}

$month = (int)$_GET['month'];
$year = (int)$_GET['year'];

$newPeriod = determineStartOfNextMonth($month, $year);
$pastMonth = determineStartOfPreviousMonth($month, $year);

$qb = $em->createQueryBuilder();
$qb->select("t")
	->from("Transaction", "t")
	->where("(t.idBankaccountFrom = ?1 OR t.idBankaccountTo = ?1) AND (t.time >= ?2 AND t.time < ?3)")
	->setParameter(1, $bankAccount->getIdBankaccount())
	->setParameter(2, $year . '-' . $month .'-01')
	->SetParameter(3, $newPeriod[1] .'-' . $newPeriod[0] . '-01');
$query = $qb->getQuery();
/** @var Transaction[] $allTransactions */
$allTransactions = $query->getResult();


makeStatement();

