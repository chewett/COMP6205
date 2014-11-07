<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

$pageTitle = 'View Statement X';
require_once 'inc/header.php';

?>

<h1>View statement - Month ???</h1>

Here is your statement for month ???.

<table class="table">
	<thead>
	<tr>
		<th>Date</th>
		<th>Reference</th>
		<th>Spent</th>
		<th>Recieved</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>1 Jan 2014</td>
		<td>Food</td>
		<td>£10</td>
		<td></td>
	</tr>
	<tr>
		<td>1 Jan 2013</td>
		<td>Company Paid you</td>
		<td></td>
		<td>£500</td>
	</tr>
	<tr>
		<td>1 Jan 2012</td>
		<td>Food</td>
		<td>£10</td>
		<td></td>
	</tr>
	</tbody>
</table>

<button class="button">PDF Print</button>

<?php
require_once 'inc/footer.php';
