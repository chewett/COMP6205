<?php

$pageRequiresLogin = true;
$pageTitle = 'Bank Account Overview';

require_once "inc/setup.php";

if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	header("Location: accountOverview.php");
}

if(!userHasPermission("view_bank_account")) {
    die("You cannot access this page");
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

<h1>Bank Overview - Account <?=$bankAccount->getName()?></h1>

<h2>Account ID: <?=$bankAccount->getIdBankaccount()?></h2>

<?php

if($allTransactions != null) {

	?>
	Here is a last of the last X transactions.

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


<?php
require_once 'inc/footer.php';
