<?php
/**
 * Created by PhpStorm.
 * User: cjh1e11
 * Date: 29/10/14
 * Time: 15:42
 */

use Doctrine\ORM\EntityManager;
use Role;


echo "TEST";

require_once 'bootstrap.php';

$em = $entityManager;

$a = new Role();

$a->setRolename("Admin");
$a->setDescription("The highest level user");


$em->persist($a);


