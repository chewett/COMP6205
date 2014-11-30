<?php

$pageRequiresLogin = true;
$pageTitle = 'Admin User Roles';

require_once "inc/setup.php";

if(!userHasPermission("admin_view_roles")) {
    redirectUnauthorized();
}

require_once 'inc/header.php';

?>

<h1>Admin - User Roles</h1>

This allows you to change what roles a user has. E.g. promoting a user from a normal user to a bank clerk.

<div class="alert alert-info" role="alert">On the fully implemented website you would be able to change these roles</div>


<table class="table">
	<thead>
	<tr>
		<th>User ID</th>
		<th>Username</th>
		<th>Role</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>1</td>
		<td>Bob</td>
		<td>Admin</td>
		<td><a>Change</a></td>
	</tr>
	<tr>
		<td>2</td>
		<td>Dave</td>
		<td>User</td>
		<td><a>Change</a></td>
	</tr>
	<tr>
		<td>3</td>
		<td>Mike</td>
		<td>User</td>
		<td><a>Change</a></td>
	</tr>
	</tbody>
</table>



<?php
require_once 'inc/footer.php';
