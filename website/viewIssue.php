<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

$pageTitle = 'View Issue X';
require_once 'inc/header.php';

if(!userHasPermission("view_statement")) {
     redirectUnauthorized();
}

?>

<h1>View Issue - Issue Number X</h1>

<h2>Issue Title</h2>

<p>Description of issue</p>

<form class="form-signin" role="form">
	<h3 class="form-signin-heading">Add comment</h3>
	<textarea class="form-control" rows="9" placeholder="Full description of problem"></textarea>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Add Comment</button>
</form>

<?php
require_once 'inc/footer.php';
