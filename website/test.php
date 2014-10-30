<?php

require_once 'doctrine_setup.php';

$a = new Role();

$a->setRolename("Admin");
$a->setDescription("The highest level user");


$em->persist($a); //tell doctrine to save this entitty (queue of items to be saved)
$em->flush(); // everythiung in the queue is saved to DB
 
