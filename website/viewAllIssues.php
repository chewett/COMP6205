`<?php

$pageRequiresLogin = true;
$pageTitle = 'View All Issues';

require_once "inc/setup.php";

if(!userHasPermission("admin_view_issues")) {
      redirectUnauthorized();
}

/** @var Issue[] $openIssues */
$openIssues = $em->getRepository("Issue")->findBy(array("status" => 1));
/** @var Issue[] $closedIssues */
$closedIssues = $em->getRepository("Issue")->findBy(array("status" => 1));

require_once 'inc/header.php';

?>

<h1>Admin - View all Issues</h1>

This allows you to view all issues

<h2>Open Issues</h2>

<?php
if($openIssues) {
	?>
	<table class="table">
		<thead>
		<tr>
			<th>Issue ID</th>
			<th>User Reported</th>
			<th>Title</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach($openIssues as $issue) {
			?>
			<tr>
				<td><?=$issue->getIdIssue()?></td>
				<td><?=$issue->getIdUser()->getUsername()?></td>
				<td><?=$issue->getTitle()?></td>
				<td><a href="viewIssue.php?id=<?=$issue->getIdIssue()?>">View</a></td>
			</tr>
			<?php
		}
		?>

		</tbody>
	</table>
	<?php
}
?>


<h2>Resolved Issues</h2>


<?php
if($closedIssues) {
	?>
	<table class="table">
		<thead>
		<tr>
			<th>Issue ID</th>
			<th>User Reported</th>
			<th>Title</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach($closedIssues as $issue) {
			?>
			<tr>
				<td><?=$issue->getIdIssue()?></td>
				<td><?=$issue->getIdUser()->getUsername()?></td>
				<td><?=$issue->getTitle()?></td>
				<td><a href="viewIssue.php?id=<?=$issue->getIdIssue()?>">View</a></td>
			</tr>
		<?php
		}
		?>

		</tbody>
	</table>
<?php
}
?>

<?php
require_once 'inc/footer.php';
