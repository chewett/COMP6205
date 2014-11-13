<?php
require_once '../inc/auth.php';

class HashingFunctionTest extends PHPUnit_Framework_TestCase {

	/**
	 * This tests the generatehas function
	 * @return array The list of hashes generated
	 */
	public function testGenerateHashIsUnique() {
		$hashs = array();

		for($i = 0; $i < 100; $i++) {
			$password = generateHash("Easy_Password");
			$this->assertNotNull($password);
			$this->assertFalse(in_array($password, $hashs));
			$hashs[] = $password;
		}

		return $hashs;
	}

	/**
	 * This tests the getHash function
	 * @depends testGenerateHashIsUnique
	 * @param $hashs
	 */
	public function testGetHashSame($hashs) {
		foreach($hashs as $hash) {
			$newHash = getHash("Easy_Password", $hash);
			$this->assertNotNull($newHash);
			$this->assertEquals($newHash, $hash);
		}
	}

	/**
	 * This tests the verifyLoginPassword function
	 * @depends testGenerateHashIsUnique
	 * @param $hashs
	 */
	public function testValidLogin($hashs) {
		foreach($hashs as $hash) {
			$this->assertTrue(verifyLoginPassword("Easy_Password", $hash));
			$this->assertFalse(verifyLoginPassword("Wrong_Password", $hash));
		}

	}

}
 