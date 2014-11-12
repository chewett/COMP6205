<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$current = new Accounttype();
$current->setName("Current Account");
$em->persist($current);

$personal = new Accounttype();
$personal->setName("Personal Account");
$em->persist($personal);

$savings = new Accounttype();
$savings->setName("Savings Account");
$em->persist($savings);

$loan = new Accounttype();
$loan->setName("Loan Account");
$em->persist($loan);

$joint = new Accounttype();
$joint->setName("Joint Account");
$em->persist($joint);

$em->flush();

echo "If there are no errors then this was setup properly";
