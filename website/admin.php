<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

$pageTitle = 'Admin Page';
require_once 'inc/header.php';

?>

<h1>Admin Page</h1>

This is the admin page that lets you do a number of admin related functions

<h2>Assign Users</h2>

To assign users new roles go <a href="adminUserRoles.php">here</a>

<h2>Change Permissions</h2>

To change the permissions roles have access to, go <a href="adminRolePermissions.php">here</a>

<h2>View All Concerns</h2>

To see all concerns go to <a href="adminAllConcerns.php">the concerns list</a>

<?php
require_once 'inc/footer.php';
