<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'doctrine_setup.php';

return ConsoleRunner::createHelperSet($em);