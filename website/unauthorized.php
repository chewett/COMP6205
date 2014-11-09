<?php

require_once 'inc/header.php';

?>


<h1>Cannot access page</h1>
<?php
	$errorMsg= "<div class='alert alert-warning' role='alert'>You are not authorized to view $pageTitle/div>";
	echo $errorMsg;
?>

<?php
require_once 'inc/footer.php';
