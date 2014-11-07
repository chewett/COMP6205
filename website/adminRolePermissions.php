<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!userHasPermission("admin_view_permission")) {
    die("You cannot access this page");
}

$pageTitle = 'Admin Role Permissions';
require_once 'inc/header.php';

$allRoles = $em->getRepository("Role")->findAll();

?>
<h1>Admin - Role Permissions</h1>

This allows you to change what permissions different roles have.

<table class="table">
	<thead>
		<tr>
			<th>Role ID</th>
			<th>Role Name</th>
			<th>Role Description</th>
		</tr>
	</thead>
	<tbody>
	<?php
	/** @var $role Role */
	foreach($allRoles as $role) {
		?>
		<tr>
			<td><?=$role->getIdRole()?></td>
			<td><?=$role->getRolename()?></td>
			<td><?=$role->getDescription()?></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>


<?php
require_once 'inc/footer.php';
