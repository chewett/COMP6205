<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$rolesRepo = $em->getRepository("Role");
$user = $rolesRepo->findOneBy(array("rolename" => "user"));
$admin = $rolesRepo->findOneBy(array("rolename" => "admin"));

$bob = new Users();
$bob->setFirstname("Joe");
$bob->setPassword(generateHash("bob"));
$bob->setLastname("Bloggs");
$bob->setUsername("bob");
$bob->setIdRole($user);

$bob2 = new Users();
$bob2->setFirstname("John");
$bob2->setPassword(generateHash("bob2"));
$bob2->setLastname("Smith");
$bob2->setUsername("bob2");
$bob2->setIdRole($admin);



$em->persist($bob);
$em->persist($bob2);
$em->flush();

echo "If there are no errors then this was setup properly";
