<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$user = new Role;
$user->setRolename("user");
$user->setDescription("The user is the main role");
$em->persist($user);

$clerk = new Role;
$clerk->setRolename("clerk");
$clerk->setDescription("The clerk is the primary person you interact with in the bank");
$em->persist($clerk);

$bankManager = new Role;
$bankManager->setRolename("bank manager");
$bankManager->setDescription("The bank manager has more access than the clerk");
$em->persist($bankManager);

$admin = new Role;
$admin->setRolename("admin");
$admin->setDescription("The admin has all levels of access");
$em->persist($admin);

$em->flush();

echo "If there are no errors then this was setup properly";
