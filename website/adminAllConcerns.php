<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!userHasPermission("admin_view_concerns")) {
    die("You cannot access this page");
}

$pageTitle = 'View All Concerns';
require_once 'inc/header.php';

?>

<h1>Admin - View all Concerns</h1>

This allows you to view all concerns

<h2>Open Concerns</h2>

<table class="table">
	<thead>
	<tr>
		<th>Concern ID</th>
		<th>User Reported</th>
		<th>Title</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>1</td>
		<td>Bob</td>
		<td>All my money has gone</td>
		<td><a>View</a></td>
	</tr>
	<tr>
		<td>2</td>
		<td>Dave</td>
		<td>I sent money to the wrong account</td>
		<td><a>View</a></td>
	</tr>
	<tr>
		<td>3</td>
		<td>Mike</td>
		<td>I dont know how to use this</td>
		<td><a>View</a></td>
	</tr>
	</tbody>
</table>

<h2>Resolved Concerns</h2>

Similar table above

<?php
require_once 'inc/footer.php';
