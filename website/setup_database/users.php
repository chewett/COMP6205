<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$bob = new Users();
$bob->setFirstname("bob");
$bob->setPassword(generateHash("bob"));
$bob->setLastname("Bob");
$bob->setUsername("bob");



$em->persist($bob);
$em->flush();
