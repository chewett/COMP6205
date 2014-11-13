<?php
/**
 * Created by PhpStorm.
 * User: chewett
 * Date: 13/11/14
 * Time: 12:12
 */

class HeaderFooterTest extends PHPUnit_Framework_TestCase {

	/**
	 * This checks if the header file is at its correct location
	 */
	public function testHeaderFilePresent() {
		$this->assertTrue(is_file('../inc/header.php'));
	}

	/**
	 * This checks if the footer file is at its correct location
	 */
	public function testFooterFilePresent() {
		$this->assertTrue(is_file('../inc/footer.php'));
	}

}
 