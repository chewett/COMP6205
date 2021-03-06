<?php

$pageRequiresLogin = true;
$pageTitle = 'Admin Role Permissions';
require_once "inc/setup.php";

if(!userHasPermission("admin_view_permission")) {
      redirectUnauthorized();
}


require_once 'inc/header.php';

$allRoles = $em->getRepository("Role")->findAll();

?>
<h1>Admin - Role Permissions</h1>

This allows you to change what permissions different roles have.

<div class="alert alert-info" role="alert">On the fully implemented website you would be able to change these permissions</div>

<table class="table">
	<thead>
		<tr>
			<th>Role ID</th>
			<th>Role Name</th>
			<th>Role Description</th>
			<th></th>
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
			<td><a>Change</a></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>


<?php
require_once 'inc/footer.php';
