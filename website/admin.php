<?php

$pageRequiresLogin = true;
$pageTitle = 'Admin Page';

require_once "inc/setup.php";
require_once 'inc/header.php';

?>

<h1>Admin Page</h1>

This is the admin page that lets you do a number of admin related functions

<?php

if(userHasPermission("admin_users_assign")) {
    ?>
    <h2>Assign Users</h2>

    To assign users new roles go <a href="adminUserRoles.php">here</a>
<?php
}

if(userHasPermission("admin_view_roles")) {
    ?>
    <h2>View Roles</h2>

    To view all roles that are currently set up go <a href="adminAllRoles.php">here</a>.
    <?php
}

if(userHasPermission("admin_view_permission")) {
    ?>
    <h2>Change Permissions</h2>

    To change the permissions roles have access to, go <a href="adminRolePermissions.php">here</a>
    <?php
}

if(userHasPermission("admin_view_concerns")) {
    ?>
    <h2>View All Concerns</h2>

    To see all concerns go to <a href="adminAllConcerns.php">the concerns list</a>
    <?php
}


require_once 'inc/footer.php';
