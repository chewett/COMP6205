<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$login = new Permission;
$login->setName("login");
$login->setDescription("Allow a user to login");
$em->persist($login);

$viewAccount = new Permission;
$viewAccount->setName("view_account");
$viewAccount->setDescription("Allow a user to view their account");
$em->persist($viewAccount);

$viewBankAccount = new Permission;
$viewBankAccount->setName("view_bank_account");
$viewBankAccount->setDescription("Allow a user to their bank account");
$em->persist($viewBankAccount);

$openBankAccount = new Permission;
$openBankAccount->setName("open_bank_account");
$openBankAccount->setDescription("Allow a user to open a bank account");
$em->persist($openBankAccount);

$transferMoney = new Permission;
$transferMoney->setName("transfer_money");
$transferMoney->setDescription("Allow a user transfer money");
$em->persist($transferMoney);

$viewStatement = new Permission;
$viewStatement->setName("view_statement");
$viewStatement->setDescription("Allow a user to view their statement");
$em->persist($viewStatement);

$assignUsers = new Permission;
$assignUsers->setName("admin_users_assign");
$assignUsers->setDescription("Allow a user to assign users a different role");
$em->persist($assignUsers);

$viewRoles = new Permission;
$viewRoles->setName("admin_view_roles");
$viewRoles->setDescription("Allow a user to view the roles list");
$em->persist($viewRoles);

$viewPermissions = new Permission;
$viewPermissions->setName("admin_view_permission");
$viewPermissions->setDescription("Allow a user to view the permissions list");
$em->persist($viewPermissions);

$viewConcerns = new Permission;
$viewConcerns->setName("admin_view_concerns");
$viewConcerns->setDescription("Allow a user to view concerns");
$em->persist($viewConcerns);

$siteOptions = new Permission;
$siteOptions->setName("admin_site_options");
$siteOptions->setDescription("Allow a user to edit site options");
$em->persist($siteOptions);

$em->flush();

echo "If there are no errors then this was setup properly";
