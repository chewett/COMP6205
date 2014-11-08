<?php

require_once "inc/setup.php";
require_once 'inc/header.php';

$pageTitle = 'Transfer Money';
$pageRequiresLogin = true;


if(!userHasPermission("transfer_money")) {
    die("You cannot access this page");
}

if(isset($_POST['destinationAccountId']) && isset($_POST['amount']) &&  isset($_POST['description'])
	$_POST['destinationAccountId'] != '' && $_POST['amount'] != '' && $_POST['description'] != '') {

	$transaction= new Transaction();
	$transaction->setIdBankaccountTo($_POST['destinationAccountId']);
	$transaction->setDescription($_POST['description']);

	if(is_numeric($_POST['amount']) && $_POST['amount']>0){
		$transaction->setAmount($_POST['amount']);
	}

	$em->persist($transaction);
	$em->flush();

	header("Location: accountOverview.php");
	die();

}else{
	$err="Payee, Amount or Desciption not set";
}
?>

<h1>Transfer Money</h1>
<?php 
	if(isset($err)){
		echo "<p>$err</p>";
		//echo "<p>" . $err . "</p>";
	}
?>
<form class="form-signin" role="form">
	<h3 class="form-signin-heading">Transfer Money</h3>
	Enter the account details of the account you want to transfer money to and a description. <br /><br />
	<input type="number" class="form-control" placeholder="Payee" required autofocus id="destinationAccountId">
	<input type="number" class="form-control" placeholder="Amount" required id="amount">
	<input type="input" class="form-control" placeholder="Description" required id="description"> <br />
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sent Payment</button>
</form>


<?php
require_once 'inc/footer.php';
