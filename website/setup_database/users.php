<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$bob = new Users();
$bob->setFirstname("bob");
$bob->setPassword(generateHash("bob"));
$bob->setLastname("Bob");
$bob->setUsername("bob");

$bob2 = new Users();
$bob2->setFirstname("bob2");
$bob2->setPassword(generateHash("bob2"));
$bob2->setLastname("Bob2");
$bob2->setUsername("bob2");



$em->persist($bob);
$em->persist($bob2);
$em->flush();

echo "If there are no errors then this was setup properly";
