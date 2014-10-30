<?php

function generateHash($password) {
	$salt = '$2a$10$' . substr(md5(uniqid(rand(), true)), 0, 22);
	return crypt($password, $salt);
}

function getHash($pass, $hash) {
	return crypt($pass, $hash);
}

function verifyLoginPassword($pass, $hash) {
	return (getHash($pass, $hash) == $hash);
}