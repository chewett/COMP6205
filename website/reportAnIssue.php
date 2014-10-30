<?php

$pageRequiresLogin = true;
require_once "setup.php";

$pageTitle = 'Report an issue';
require_once 'inc/header.php';

?>

<form class="form-signin" role="form">
	<h3 class="form-signin-heading">Report a concern</h3>
	To report a concern with your account you should fill out this form and we will get back to you. <br /><br />
	<input type="input" class="form-control" placeholder="Account ID" required autofocus>
	<input type="input" class="form-control" placeholder="Short Description" required>
	<textarea class="form-control" rows="9" placeholder="Full description of problem"></textarea>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Send report</button>
</form>


<?php
require_once 'inc/footer.php';
