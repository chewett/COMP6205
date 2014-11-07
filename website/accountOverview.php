<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

$pageTitle = 'Account Overview';
require_once 'inc/header.php';

$bankAccounts = $em->getRepository("Bankaccount")->findBy(array("idUser" => $user->getIdUser()));

?>

<h1>Account Overview</h1>

<p>Here is a list of accounts that you own. If there is an issue with your account you should <a href="reportAnIssue.php">report an issue</a></p>

<?php

if($bankAccounts) {

	?>
<h2>Bank Accounts</h2>

	<table class="table">
		<thead>
		<tr>
			<th>Account ID</th>
			<th>Account Name</th>
			<th>Account Type</th>
			<th>Account Balance</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($bankAccounts as $bank) {
			?>
			<tr>
				<td><?=$bank->getIdBankaccount()?></td>
				<td><?=$bank->getType()?></td>
				<td><?=$bank->getName()?></td>
				<td>£<?=$bank->getBalance()?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

<?php

}else{ ?>
	<strong>You have no bank accounts</strong>
	<?php
}
?>

<h2>Open an account</h2>

<p>If you wish to open a web account you can <a href="openNewAccount.php">open an account</a>.</p>



<?php


require_once 'inc/footer.php';
