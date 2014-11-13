<?php

//Kills the page if maintenance mode is on.

/** @var Options $maintenanceMode */
$maintenanceMode = $em->getRepository("Options")->findOneBy(array("keyname" => "maintenance_mode"));

if($maintenanceMode != null && $maintenanceMode->getValue() === 'true') {
    die("Maintenance Mode on");
}