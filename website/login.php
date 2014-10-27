<?php

$pageTitle = 'Login';
require_once 'inc.header.php';

?>

	<form class="form-signin" role="form">
		<h3 class="form-signin-heading">Login page for Our Bank</h3>
		To access Our Bank services you will need to login with your provided username. <br /><br />
		<input type="email" class="form-control" placeholder="Username" required autofocus>
		<input type="password" class="form-control" placeholder="Password" required> <br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>


<?php
require_once 'inc.footer.php';
