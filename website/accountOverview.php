<?php

require_once 'setup.php';

$pageTitle = 'Account Overview';
require_once 'inc.header.php';


if(isset($_SESSION['id_user'])) {
	echo $_SESSION['id_user'];
}

?>

<h1>Account Overview</h1>

<p>Here is a list of accounts that you own</p>

<p>If there is an issue with your account you should <a href="reportAnIssue.php">report an issue</a></p>

<table class="table">
	<thead>
	<tr>
		<th>Account ID</th>
		<th>Account name</th>
		<th>Account Balance</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>1</td>
		<td>Main</td>
		<td>£-1000</td>
	</tr>
	<tr>
		<td>2</td>
		<td>Other</td>
		<td>£20</td>
	</tr>
	<tr>
		<td>3</td>
		<td>checking</td>
		<td>£50</td>
	</tr>
	</tbody>
</table>


<?php
require_once 'inc.footer.php';
