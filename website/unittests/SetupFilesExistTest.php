<?php
/**
 * Created by PhpStorm.
 * User: chewett
 * Date: 13/11/14
 * Time: 12:14
 */

class SetupFilesExistTest extends PHPUnit_Framework_TestCase {

	public function testFunctionsFilePresent() {
		$this->assertTrue(is_file('../inc/functions.php'));
	}

	public function testDoctrineSetupFilePresent() {
		$this->assertTrue(is_file('../inc/doctrine_setup.php'));
	}

	public function testSessionFilePresent() {
		$this->assertTrue(is_file('../inc/session.php'));
	}

	public function testOptionsFilePresent() {
		$this->assertTrue(is_file('../inc/load_options.php'));
	}



}


/**
 *
 *
require_once 'functions.php';
require_once 'doctrine_setup.php';
require_once 'session.php';
require_once 'load_options.php';
 *
 */