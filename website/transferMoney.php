<?php

$pageRequiresLogin = true;
$pageTitle = 'Transfer Money';
require_once "inc/setup.php";

require_once 'inc/header.php';



if(!userHasPermission("transfer_money")) {
    redirectUnauthorized();
}

$bankAccounts=$em->getRepository("Bankaccount")->findBy(array("idUser"=>$user)); //get all bank account of logged in user

if(isset($_POST['submit'])) {
	//if all form fields are set and different from 0
	if(isset($_POST['sourceAccountId']) && isset($_POST['destinationAccountId']) && isset($_POST['amount']) &&  isset($_POST['description']) &&
		$_POST['sourceAccountId']!='' && $_POST['destinationAccountId'] != '' && $_POST['amount'] != '' && $_POST['description'] != '') {

		$moneyToTransfer=$_POST['amount'];

		$srcAcc=$em->getRepository("Bankaccount")->find($_POST['sourceAccountId']);
		if($srcAcc==null){
			$err="Source Account does not exist";
		}

		$dstAcc=$em->getRepository("Bankaccount")->find($_POST['destinationAccountId']);
		if($dstAcc==null){
			$err="Destination Account does not exist";
		}

		if(!(is_numeric($moneyToTransfer) && $moneyToTransfer>0)){
			$err="Amount should be positive number";
		}

		if($srcAcc->getBalance()<$moneyToTransfer){
				$err="Balance in source account is not enough";
		}

		if(!isset($err)){
			transferMoney($srcAcc, $dstAcc, $_POST['amount'], $_POST['description']);
			header("Location: accountOverview.php");
			die();
		}

	}else{
		$err="Payee, Amount or Desciption not set";
	}
}



?>

<h1>Transfer Money</h1>




<form class="form-signin" role="form" id="transferMoney" method="post">
	
	Enter the account details of the account you want to transfer money to and a description. <br /><br />


	<?php 
	//print the error
	if(isset($err)){
		echo "<div class='alert alert-danger' role='alert'>$err</div>";
		//echo "<p>" . $err . "</p>";
	}
	?>

	 <select class="form-control" placeholder="From Account" required autofocus name="sourceAccountId">

	 	<?php
	 	foreach ($bankAccounts as $account){
	 		echo "<option value='{$account->getIdBankaccount()}'>{$account->getName()} : {$account->getIdBankaccount()}</option>";
	 	}
	 	?>
	</select> 


	<input type="number" class="form-control" placeholder="To Account" required autofocus name="destinationAccountId">
	<input type="number" class="form-control" placeholder="Amount" required name="amount">
	<input type="input" class="form-control" placeholder="Description" required name="description"> <br />
	<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sent Payment</button>
</form>


<?php
require_once 'inc/footer.php';
