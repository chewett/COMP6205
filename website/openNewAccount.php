<?php

$pageRequiresLogin = true;
require_once "setup.php";

$pageTitle = 'Open New Account';
require_once 'inc/header.php';

?>

<h1>Open New Account</h1>

<form id="openAccount" method="post">
	Account Name: <input type="text" name="name"> <br />
	Account Type: <select name="accountType">
						<option value="current">Current Account</option>
						<option value="personal">Personal Account</option>
						<option value="savings">Savings Account</option>
						<option value="loan">Loan Account</option>
						<option value="joint">Joint Account</option>
					</select> <br />
	<input type="submit" value="Submit" / >
</form>


<?php
require_once 'inc/footer.php';
