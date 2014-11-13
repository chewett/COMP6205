<?php

$pageRequiresLogin = true;
$pageTitle = 'Open New Account';

require_once "inc/setup.php";

if(!userHasPermission("open_bank_account")) {
    redirectUnauthorized();
}

/** @var Accounttype[] $accountTypes */
$accountTypes = $em->getRepository("Accounttype")->findAll();

require_once 'inc/header.php';

if(isset($_POST['submit'])) {

	if (isset($_POST['name']) && $_POST['name'] != '' && isset($_POST['accountType']) && (int)$_POST['accountType']) {

		$accountType = $em->getRepository("Accounttype")->find((int)$_POST['accountType']);

		if($accountType != null) {

			createBankAccount($_POST['name'], $accountType, $user);

			header("Location: accountOverview.php");
			die();
		}else{
			$err = "Unable to find account type";
		}


	} else {
		$err = "Account Name or Type not set";
	}
}

?>

<h1>Open New Account</h1>
<?php 
	if(isset($err)){
		echo "<div class='alert alert-danger' role='alert'>$err</div>";
	}
?>

<form role="form" id="openAccount" method="post">
    <div class="form-group">
        <label for="name">Account Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required autofocus>
    </div>
    <div class="form-group">
        <label for="accountType">Account Type</label>
        <select class="form-control" id="accountType" name="accountType">
	        <?php
	        foreach($accountTypes as $type) {
				?>
		        <option value="<?=$type->getIdAccounttype()?>"><?=$type->getName()?></option>
		        <?php
	        }
	        ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>


<?php
require_once 'inc/footer.php';
