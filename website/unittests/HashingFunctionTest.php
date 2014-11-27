<?php
require_once '../inc/auth.php';

class HashingFunctionTest extends PHPUnit_Framework_TestCase {

	/**
	 * This tests the generatehas function to ensure that it can generate hashes correctly
	 * @return array a list of hashes generated above with the password "Easy_Password"
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
	 * This tests the getHash function to see if it will be able to create the correct hash
	 * @depends testGenerateHashIsUnique
	 * @param $hashs a list of hashes generated above with the password "Easy_Password"
	 */
	public function testGetHashSame($hashs) {
		foreach($hashs as $hash) {
			$newHash = getHash("Easy_Password", $hash);
			$this->assertNotNull($newHash);
			$this->assertEquals($newHash, $hash);
		}
	}

	/**
	 * This tests the verifyLoginPassword function to see if it will verify valid and invalid passwords
	 * @depends testGenerateHashIsUnique
	 * @param $hashs a list of hashes generated above with the password "Easy_Password"
	 */
	public function testValidLogin($hashs) {
		foreach($hashs as $hash) {
			$this->assertTrue(verifyLoginPassword("Easy_Password", $hash));
			$this->assertFalse(verifyLoginPassword("Wrong_Password", $hash));
		}

	}

}
 