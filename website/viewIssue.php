<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

//if you have the permission to view specific issue (same as the permission to view the whole list of issues)
if(!userHasPermission("admin_view_issues")) {
	redirectUnauthorized();
}


if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	header("Location: viewAllIssues.php");
}


/** @var Issue $issue */
$issue = $em->getRepository("Issue")->find((int)$_GET['id']);

$pageTitle = 'View Issue ' . $issue->getIdIssue();
require_once 'inc/header.php';

if(isset($_POST['submit']) && $_POST['submit']!='') {
	closeIssue($issue);
	$info="<div class='alert alert-success' role='alert'>You have reviewed and closed this issue</div>";
}
?>

<h1>View Issue - Issue Number <?=$issue->getIdIssue()?></h1>

<h2><?=$issue->getTitle()?></h2>

<p><?=$issue->getDescription()?></p>

<?php
if(!($issue->isStatus()==1)) { ?>
	<h2>Close Issue</h2>

	<p>If you have dealt with this issue you can close it</p>
	<p>
		<form class="form-signin" role="form" method="post">
			<button name="submit" class="btn btn-lg btn-primary" type="submit" name="close" value="true">Close issue</button>
		</form>

	</p>
<?php
}else {
	if(isset($info)){
		echo $info;
	}
}
?>

<?php
require_once 'inc/footer.php';

