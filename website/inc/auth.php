<?php

/**
 * Used to generate a salt and hash when someone creates an account
 * @param $password Password to hash
 * @return string Resulting hash
 */
function generateHash($password) {
	$salt = '$2y$10$' . substr(md5(uniqid(rand(), true)), 0, 22);
	return crypt($password, $salt);
}

/**
 * This is used to get the hash given a password and a hash
 * @param $pass Password to hash
 * @param $hash Salt and hash method
 * @return string Resulting hash
 */
function getHash($pass, $hash) {
	return crypt($pass, $hash);
}

/**
 * Checks to see if a given password is correct to generate the hash
 * @param $pass Password to hash
 * @param $hash Salt and hash method
 * @return bool true if password valid to generate hash
 */
function verifyLoginPassword($pass, $hash) {
	return (getHash($pass, $hash) == $hash);
}