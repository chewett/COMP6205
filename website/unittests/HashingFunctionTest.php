<?php
require_once '../inc/auth.php';

class HashingFunctionTest extends PHPUnit_Framework_TestCase {
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
	 * @depends testGenerateHashIsUnique
	 */
	public function testGetHashSame($hashs) {
		foreach($hashs as $hash) {
			$newHash = getHash("Easy_Password", $hash);
			$this->assertNotNull($newHash);
			$this->assertEquals($newHash, $hash);
		}
	}

	/**
	 * @depends testGenerateHashIsUnique
	 */
	public function testValidLogin($hashs) {
		foreach($hashs as $hash) {
			$this->assertTrue(verifyLoginPassword("Easy_Password", $hash));
			$this->assertFalse(verifyLoginPassword("Wrong_Password", $hash));
		}

	}

	/**
	 * function generateHash($password) {
	$salt = '$2a$10$' . substr(md5(uniqid(rand(), true)), 0, 22);
	return crypt($password, $salt);
	}

	function getHash($pass, $hash) {
	return crypt($pass, $hash);
	}

	function verifyLoginPassword($pass, $hash) {
	return (getHash($pass, $hash) == $hash);
	}
	 */

}
 