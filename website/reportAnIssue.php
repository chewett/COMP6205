<?php

$pageRequiresLogin = true;
$pageTitle = 'Report an issue';
require_once "inc/setup.php";

if(!userHasPermission("report_issue")) {
    redirectUnauthorized();
}

require_once 'inc/header.php';

$bankAccounts=$em->getRepository("Bankaccount")->findBy(array("idUser"=>$user)); //get all bank account of logged in user

if(isset($_POST['account_id']) && $_POST['account_id'] != '' && 
   isset($_POST['title']) && $_POST['title'] != '' && 
   isset($_POST['description']) && $_POST['description'] != '') {
		
		$accountInt = (int)$_POST['account_id'];
		$accountId = $em->getRepository("Bankaccount")->find($accountInt);
		createNewIssue($accountId, $_POST['title'], $_POST['description']);
		header("Location: accountOverview.php");
		die();

}else{
	$err="Account ID, Problem Title or Description not completed";
}

?>

<form class="form-signin" role="form" method="post">
	<h3 class="form-signin-heading">Report a concern</h3>
	To report a concern with your account you should fill out this form and we will get back to you. <br /><br />
	<select class="form-control" placeholder="From Account" required autofocus name="account_id">

	 	<?php
	 	foreach ($bankAccounts as $account){
	 		echo "<option value='{$account->getIdBankaccount()}'>{$account->getName()} : {$account->getIdBankaccount()}</option>";
	 	}
	 	?>
	</select> 
	
	<input type="input" name = "title" class="form-control" placeholder="Problem Title" required>
	<textarea name="description" class="form-control" rows="9" placeholder="Full description of problem"></textarea>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Send report</button>
</form>


<?php
require_once 'inc/footer.php';
