<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!userHasPermission("view_statement")) {
     redirectUnauthorized();
}

if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	header("Location: accountOverview.php");
}

/** @var Bankaccount $bankAccount */
$bankAccount = $em->getRepository("Bankaccount")->find((int)$_GET['id']);

if(!isset($_GET['month']) || (int)$_GET['month'] == 0 || !isset($_GET['year']) || (int)$_GET['year'] == 0)  {
	header("Location: bankOverview.php?id={$bankAccount->getIdBankaccount()}");
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


$pageTitle = 'View Statement ' . $year . "-". $month;
require_once 'inc/header.php';

?>

<h1>View statement - <?=$year?>-<?=$month?></h1>

<h2>Bank Overview - Account <?=$bankAccount->getName()?></h2>

<h2>Account ID: <?=$bankAccount->getIdBankaccount()?></h2>

<div>
	<a class="btn btn-primary" href="viewStatement.php?id=<?=$bankAccount->getIdBankaccount()?>&year=<?=$pastMonth[1]?>&month=<?=$pastMonth[0]?>">View Previous statement</a>
	<a class="btn btn-primary" href="viewStatement.php?id=<?=$bankAccount->getIdBankaccount()?>&year=<?=$newPeriod[1]?>&month=<?=$newPeriod[0]?>">View Next statement</a>
</div>

<?php

if($allTransactions != null) {

	?>
	Here is the months transactions.

	<table class="table">
		<thead>
		<tr>
			<th>Date</th>
			<th>Reference</th>
			<th>Spent</th>
			<th>Recieved</th>
		</tr>
		</thead>
		<tbody>

		<?php
		foreach($allTransactions as $transaction) {
			$moneyTo = '';
			$moneyFrom = '';
			if($transaction->getIdBankaccountFrom() == $bankAccount) {
				$moneyFrom = "£" . $transaction->getAmount();
			}else{
				$moneyTo = "£" . $transaction->getAmount();
			}


			?>
			<tr>
				<td><?=$transaction->getTime()->format('Y-m-d H:i:s')?></td>
				<td><?=$transaction->getDescription()?></td>
				<td><?=$moneyFrom?></td>
				<td><?=$moneyTo?></td>
			</tr>
		<?php
		}
		?>

		</tbody>
	</table>

<?php
}else{
	?>
	There are no transactions
<?php
}


?>

<br />

<button class="button">PDF Print</button>

<?php
require_once 'inc/footer.php';
