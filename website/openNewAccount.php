<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!userHasPermission("open_bank_account")) {
    die("You cannot access this page");
}

$pageTitle = 'Open New Account';
require_once 'inc/header.php';

if(isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['accountType']) && $_POST['accountType'] != '') {
	$account= new Bankaccount();
	$account->setBalance(0); //lol
	$account->setName($_POST['name']);
	$account->setType($_POST['accountType']);
	$account->setIdUser($user);

	$em->persist($account);
	$em->flush();

	header("Location: accountOverview.php");
	die();

} else{
	$err="Account Name or Type not set";
}


?>

<h1>Open New Account</h1>
<?php 
	if(isset($err)){
		echo "<p>$err</p>";
		//echo "<p>" . $err . "</p>";
	}
?>


<form id="openAccount" method="post">
	Account Name: <input type="text" name="name"> <br />
	Account Type: <select name="accountType">
						<option value="current">Current Account</option>
						<option value="personal">Personal Account</option>
						<option value="savings">Savings Account</option>
						<option value="loan">Loan Account</option>
						<option value="joint">Joint Account</option>
					</select> <br />
	<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
</form>


<?php
require_once 'inc/footer.php';
