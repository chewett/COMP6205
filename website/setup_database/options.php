<?php

require_once '../inc/doctrine_setup.php';
require_once '../inc/auth.php';

$mainMode = new Options;
$mainMode->setKeyname("maintenance_mode");
$mainMode->setValue("false");

$em->persist($mainMode);
$em->flush();

echo "If there are no errors then this was setup properly";
