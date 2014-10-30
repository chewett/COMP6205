<?php

require_once 'doctrine_setup.php'; //default doctrine loader code
$pageTitle = 'Login';
require_once 'inc.header.php';

function generateBlowFishHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);   // 11 can be changed to make brute force slower, but that will make the hashing slow too
        return crypt($password, $salt);
    }
}

//Addition - hash the user input and compare that to the database hashed password
//Only if the two hashes are the same, the user can login (that means he had put valid passw)
function verifyLoginPassword($inputPassword, $hashedPassword) {
    return crypt($inputPassword, $hashedPassword) == $hashedPassword;
}


function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


if(isset($_POST['username'])) {

	$user = $em->getRepository('Users')->findOneBy(array("username" => $_POST['username']));

	if($user == NULL) {
		$errorMsg = "User or password invalid";
	}else{
		if(!verifyLoginPassword($_POST['password'], $user->getPassword())){
			$errorMsg = "User or password invalid";
        } 
        else{
        	//set session, do login
        }    	
	}


}

?>

	<form class="form-signin" role="form" method="post">
		<?php
			if(isset($errorMsg)){
				echo $errorMsg;
			}
		?>

		<h3 class="form-signin-heading">Login page for Our Bank</h3>
		To access Our Bank services you will need to login with your provided username. <br /><br />
		<input name="username" type="input" class="form-control" placeholder="Username" required autofocus>
		<input name="password" type="password" class="form-control" placeholder="Password" required> <br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>


<?php
require_once 'inc.footer.php';
