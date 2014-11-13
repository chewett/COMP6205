<?php
/**
 * Created by PhpStorm.
 * User: chewett
 * Date: 13/11/14
 * Time: 12:14
 */

class SetupFilesExistTest extends PHPUnit_Framework_TestCase {

	/**
	 * This checks if the functions file is in the correct place
	 */
	public function testFunctionsFilePresent() {
		$this->assertTrue(is_file('../inc/functions.php'));
	}

	/**
	 * This checks if the doctrine_setup file is in the correct place
	 */
	public function testDoctrineSetupFilePresent() {
		$this->assertTrue(is_file('../inc/doctrine_setup.php'));
	}

	/**
	 * This checks if the session file is in the correct place
	 */
	public function testSessionFilePresent() {
		$this->assertTrue(is_file('../inc/session.php'));
	}

	/**
	 * This checks if the load_options file is in the correct place
	 */
	public function testOptionsFilePresent() {
		$this->assertTrue(is_file('../inc/load_options.php'));
	}

}
