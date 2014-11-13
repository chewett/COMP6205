<?php
require_once '../inc/functions.php';

class PermissionFunctionTest extends PHPUnit_Framework_TestCase {

	/**
	 * This checks if the permission check will fail if its given data not in the array
	 */
	public function testNotInArray() {
		$array = array("a", "b", "c");
		$this->assertFalse(permissionInPermissions($array, "d"));
	}

	/**
	 * This checks if the permission check will pass if its given all the data in its array
	 */
	public function testInArray() {
		$array = array("a", "b", "c");
		$this->assertTrue(permissionInPermissions($array, "a"));
		$this->assertTrue(permissionInPermissions($array, "b"));
		$this->assertTrue(permissionInPermissions($array, "c"));
	}

	/**
	 * This tests if given an empty array the permission check will work correctly
	 */
	public function testEmptyArray() {
		$array = array("a", "b", "c");
		$notInArray = "";

		$this->assertFalse(permissionInPermissions($array, $notInArray));
		$this->assertFalse(permissionInPermissions($array, null));
	}

}
 