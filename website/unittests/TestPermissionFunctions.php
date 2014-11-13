<?php
require_once '../inc/functions.php';

class TestPermissionFunctions extends PHPUnit_Framework_TestCase {

	public function testNotInArray() {
		$array = array("a", "b", "c");
		$this->assertFalse(permissionInPermissions($array, "d"));
	}

	public function testInArray() {
		$array = array("a", "b", "c");
		$this->assertTrue(permissionInPermissions($array, "a"));
		$this->assertTrue(permissionInPermissions($array, "b"));
		$this->assertTrue(permissionInPermissions($array, "c"));
	}

	public function testEmptyArray() {
		$array = array("a", "b", "c");
		$notInArray = "";

		$this->assertFalse(permissionInPermissions($array, $notInArray));
		$this->assertFalse(permissionInPermissions($array, null));
	}

}
 