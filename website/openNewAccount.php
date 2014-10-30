<?php

$pageRequiresLogin = true;
require_once "setup.php";

$pageTitle = 'Open New Bank Account';
require_once 'inc/header.php';

?>

<form class="form-signin" role="form">
	<h3 class="form-signin-heading">Open a new bank account</h3>
	Since you are a customer you are permitted to open a new account. <br /><br />
	<input type="input" class="form-control" placeholder="Account Name" required autofocus>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Create new account</button>
</form>


<?php
require_once 'inc/footer.php';
