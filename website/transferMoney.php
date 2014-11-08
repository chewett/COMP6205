<?php

require_once "inc/setup.php";
$pageTitle = 'Transfer Money';
require_once 'inc/header.php';

$pageRequiresLogin = true;


if(!userHasPermission("transfer_money")) {
    die("You cannot access this page");
}

//if all form fields are set and different from 0
if(isset($_POST['sourceAccountId']) && isset($_POST['destinationAccountId']) && isset($_POST['amount']) &&  isset($_POST['description']) &&
	$_POST['sourceAccountId']!='' && $_POST['destinationAccountId'] != '' && $_POST['amount'] != '' && $_POST['description'] != '') {

	$srcAcc=$em->getRepository("Bankaccount")->find($_POST['sourceAccountId']);
	if($srcAcc==null){
		$err="Source Account does not exist";
	}

	$dstAcc=$em->getRepository("Bankaccount")->find($_POST['destinationAccountId']);
	if($srcAcc==null){
		$err="Destination Account does not exist";
	}

	if(!(is_numeric($_POST['amount']) && $_POST['amount']>0)){
		$err="Amount should be positive number";
	}

	if(!isset($err)){
		$transaction= new Transaction;
		$transaction->setIdBankaccountFrom($srcAcc);
		$transaction->setIdBankaccountTo($dstAcc);
		$transaction->setDescription($_POST['description']);
		$transaction->setAmount($_POST['amount']);
		$transaction->setTime(new DateTime("now"));

		//increase payee's balance 
		//$em->getRepository("Users");

		

		$em->persist($transaction);
		$em->flush();
		header("Location: accountOverview.php");
		die();
	}


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
<form class="form-signin" role="form" id="transferMoney" method="post">
	<h3 class="form-signin-heading">Transfer Money</h3>
	Enter the account details of the account you want to transfer money to and a description. <br /><br />
	<input type="number" class="form-control" placeholder="From Account" required autofocus name="sourceAccountId">
	<input type="number" class="form-control" placeholder="To Account" required autofocus name="destinationAccountId">
	<input type="number" class="form-control" placeholder="Amount" required name="amount">
	<input type="input" class="form-control" placeholder="Description" required name="description"> <br />
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sent Payment</button>
</form>


<?php
require_once 'inc/footer.php';
