<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//Class autoloading script (required for doctrine entities)
require_once __DIR__ ."/../vendor/autoload.php";

$paths = array(__DIR__."/../Entity");
$isDevMode = true;

require_once __DIR__ .'/../inc/config.php';

//We use PHP annotations to define the structure of the data
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);

function getEntityManager() {
	global $em;
	return $em;
}
