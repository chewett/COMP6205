<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	die();
}

/** @var Bankaccount $bankAccount */
$bankAccount = $em->getRepository("Bankaccount")->find((int)$_GET['id']);

if($bankAccount->getIdUser() != $user) {
	die();
}

$qb = $em->createQueryBuilder();
$qb->select("t")
	->from("Transaction", "t")
	->where("t.idBankaccountFrom = ?1 OR t.idBankaccountTo = ?1")
	->setParameter(1, $bankAccount->getIdBankaccount());
$query = $qb->getQuery();
/** @var Transaction[] $allTransactions */
$allTransactions = $query->getResult();

$jsonData = array();

foreach($allTransactions as $transaction) {
	$data = array(
		"amount" => $transaction->getAmount(),
		"idTransaction" => $transaction->getIdTransaction(),
		"description" => $transaction->getDescription(),
		"time" => $transaction->getTime(),
		"received" => ($transaction->getIdBankaccountTo() === $bankAccount)
	);

	$jsonData[] = $data;
}

echo json_encode($jsonData);


