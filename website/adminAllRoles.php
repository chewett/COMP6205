<?php

$pageRequiresLogin = true;
$pageTitle = 'All Roles';
require_once "inc/setup.php";

if(!userHasPermission("admin_view_roles")) {
    die("You cannot access this page");
}


require_once 'inc/header.php';

/** @var Role[] $roles */
$roles = $em->getRepository("Role")->findAll();

?>

<h1>All Roles</h1>

<p>
    Here is a list of roles currently available to assign users.
</p>

<?php

if($roles) {

    ?>

    <table class="table">
        <thead>
        <tr>
            <th>Role ID</th>
            <th>Role name</th>
            <th>Role Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($roles as $role) {
            ?>
            <tr>
                <td><?=$role->getIdRole()?></td>
                <td><?=$role->getRolename()?></td>
                <td><?=$role->getDescription()?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php

}else{ ?>
    <strong>There are no roles in the system</strong>
<?php
}
?>

<?php


require_once 'inc/footer.php';
