<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'inc/doctrine_setup.php';

return ConsoleRunner::createHelperSet($em);