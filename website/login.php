<?php

if(isset($_GET['logout']) && $_GET['logout'] == true) {
	session_start();
	session_destroy();
}

require_once 'setup.php';

require_once 'inc/auth.php';
$pageTitle = 'Login';
require_once 'inc/header.php';

if(isset($_POST['username'])) {

	$user = $em->getRepository('Users')->findOneBy(array("username" => $_POST['username']));

	if($user == NULL) {
		$errorMsg = "User or password invalid";
	}else {
		if(!verifyLoginPassword($_POST['password'], $user->getPassword())){
			$errorMsg = "User or password invalid";  
  		}else{
        	$_SESSION['id_user'] = $user->getIdUser();
			$_SESSION['logged_in'] = time();
			header("Location: accountOverview.php");
			die();
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
require_once 'inc/footer.php';
