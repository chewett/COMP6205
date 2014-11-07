<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

function addPermissionToRole(Role $role, Permission $permission) {
    global $em;

    $newRoleHasPermission = new Rolehaspermission;
    $newRoleHasPermission->setIdPermission($permission);
    $newRoleHasPermission->setIdRole($role);
    $em->persist($newRoleHasPermission);
    $em->flush();
}

$rolesRepo = $em->getRepository("Role");
$permissionsRepo = $em->getRepository("Permission");

//get all roles
$user = $rolesRepo->findOneBy(array("rolename" => "user"));
$clerk = $rolesRepo->findOneBy(array("rolename" => "clerk"));
$bankManager = $rolesRepo->findOneBy(array("rolename" => "bank manager"));
$admin = $rolesRepo->findOneBy(array("rolename" => "admin"));


$login = $permissionsRepo->findOneBy(array("name" => "login"));
addPermissionToRole($user, $login);
addPermissionToRole($clerk, $login);
addPermissionToRole($bankManager, $login);
addPermissionToRole($admin, $login);

$viewAccount = $permissionsRepo->findOneBy(array("name" => "view_account"));
addPermissionToRole($user, $viewAccount);
addPermissionToRole($clerk, $viewAccount);
addPermissionToRole($bankManager, $viewAccount);
addPermissionToRole($admin, $viewAccount);

$viewBankAccount = $permissionsRepo->findOneBy(array("name" => "view_bank_account"));
addPermissionToRole($user, $viewBankAccount);
addPermissionToRole($clerk, $viewBankAccount);
addPermissionToRole($bankManager, $viewBankAccount);
addPermissionToRole($admin, $viewBankAccount);


$openBankAccount = $permissionsRepo->findOneBy(array("name" => "open_bank_account"));
addPermissionToRole($user, $openBankAccount);
addPermissionToRole($clerk, $openBankAccount);
addPermissionToRole($bankManager, $openBankAccount);
addPermissionToRole($admin, $openBankAccount);


$transferMoney = $permissionsRepo->findOneBy(array("name" => "transfer_money"));
addPermissionToRole($user, $transferMoney);
addPermissionToRole($clerk, $transferMoney);
addPermissionToRole($bankManager, $transferMoney);
addPermissionToRole($admin, $transferMoney);


$viewStatement = $permissionsRepo->findOneBy(array("name" => "view_statement"));
addPermissionToRole($user, $viewStatement);
addPermissionToRole($clerk, $viewStatement);
addPermissionToRole($bankManager, $viewStatement);
addPermissionToRole($admin, $viewStatement);


$assignUsers = $permissionsRepo->findOneBy(array("name" => "admin_users_assign"));
addPermissionToRole($bankManager, $assignUsers);
addPermissionToRole($admin, $assignUsers);


$viewRoles = $permissionsRepo->findOneBy(array("name" => "admin_view_roles"));
addPermissionToRole($bankManager, $viewRoles);
addPermissionToRole($admin, $viewRoles);


$viewPermissions = $permissionsRepo->findOneBy(array("name" => "admin_view_permission"));
addPermissionToRole($bankManager, $viewPermissions);
addPermissionToRole($admin, $viewPermissions);


$viewConcerns = $permissionsRepo->findOneBy(array("name" => "admin_view_concerns"));
addPermissionToRole($clerk, $viewConcerns);
addPermissionToRole($bankManager, $viewConcerns);
addPermissionToRole($admin, $viewConcerns);


echo "If there are no errors then this was setup properly";
