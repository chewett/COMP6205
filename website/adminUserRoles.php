<?php

$pageTitle = 'Admin User Roles';
require_once 'inc.header.php';

?>

<h1>Admin - User Roles</h1>

This allows you to change what roles a user has. E.g. promoting a user from a normal user to a bank clerk.


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
require_once 'inc.footer.php';
