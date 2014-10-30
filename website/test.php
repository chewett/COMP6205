<?php

require_once 'doctrine_setup.php';

$a = new Role();

$a->setRolename("Admin");
$a->setDescription("The highest level user");


$em->persist($a);
$em->flush();

