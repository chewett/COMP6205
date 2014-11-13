<?php
/**
 * Created by PhpStorm.
 * User: chewett
 * Date: 13/11/14
 * Time: 12:12
 */

class HeaderFooterTest extends PHPUnit_Framework_TestCase {

	public function testHeaderFilePresent() {
		$this->assertTrue(is_file('../inc/header.php'));
	}

	public function testFooterFilePresent() {
		$this->assertTrue(is_file('../inc/footer.php'));
	}

}
 