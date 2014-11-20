<?php

$pageRequiresLogin = true;
$pageTitle = 'Bank Account Overview';

require_once "inc/setup.php";

if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	header("Location: accountOverview.php");
}

if(!userHasPermission("view_bank_account")) {
      redirectUnauthorized();
}


require_once 'inc/header.php';

/** @var Bankaccount $bankAccount */
$bankAccount = $em->getRepository("Bankaccount")->find((int)$_GET['id']);

if($bankAccount->getIdUser() != $user) {
	die('Cannot view other persons bank account');
}

$qb = $em->createQueryBuilder();
$qb->select("t")
	->from("Transaction", "t")
	->where("t.idBankaccountFrom = ?1 OR t.idBankaccountTo = ?1")
	->setParameter(1, $bankAccount->getIdBankaccount());
$query = $qb->getQuery();
/** @var Transaction[] $allTransactions */
$allTransactions = $query->getResult();

?>

<script>
	updateTransaction();
	setInterval(updateTransaction, 10000);

	function updateTransaction() {
		console.log("Loading transaction");
		$.getJSON("loadTransactions.php?id=<?=$bankAccount->getIdBankaccount()?>", '', replaceTransaction);
	}

	function replaceTransaction(data) {
		console.log("Processing transaction");
		var rows = '';

		for(var i = 0; i < data.length; i++) {
			var sent = '';
			var received = '';
			if(data[i].received) {
				received = '£' + data[i].amount;
			}else{
				sent = '£' + data[i].amount;
			}

			rows += "<tr>" +
			"<td>" + data[i].time.date + "</td>" +
			"<td>" + data[i].description + "</td>" +
			"<td>" + sent + "</td>" +
			"<td>" + received + "</td>" +
			"</tr>";
		}

		$('#transactionsBody').html(rows);
		console.log("Finished processing")
	}


</script>


<h1>Bank Overview - Account <?=$bankAccount->getName()?></h1>

<h2>Account ID: <?=$bankAccount->getIdBankaccount()?></h2>

View this months <a href="viewStatement.php?id=<?=$bankAccount->getIdBankaccount()?>&year=<?=date('Y')?>&month=<?=date('n')?>">statement</a>

Here is a list of transactions.

<table class="table">
	<thead>
	<tr>
		<th>Date</th>
		<th>Reference</th>
		<th>Spent</th>
		<th>Recieved</th>
	</tr>
	</thead>
	<tbody id="transactionsBody">
	</tbody>
</table>


<?php
require_once 'inc/footer.php';
