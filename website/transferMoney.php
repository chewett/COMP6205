<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

$pageTitle = 'Transfer Money';
require_once 'inc/header.php';

?>

<form class="form-signin" role="form">
	<h3 class="form-signin-heading">Transfer Money</h3>
	Enter the account details of the account you want to transfer money to and a description. <br /><br />
	<input type="number" class="form-control" placeholder="Account ID" required autofocus>
	<input type="number" class="form-control" placeholder="Amount" required>
	<input type="input" class="form-control" placeholder="Description" required> <br />
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sent Payment</button>
</form>


<?php
require_once 'inc/footer.php';
