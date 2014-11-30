<?php

$pageTitle = 'All Site Options';
$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!userHasPermission("admin_site_options")) {
     redirectUnauthorized();
}

require_once 'inc/header.php';

/** @var Options[] $roles */
$options = $em->getRepository("Options")->findAll();

?>

<h1>All Site Options</h1>

<p>
    Here is a list of options.
</p>

<div class="alert alert-info" role="alert">On the fully implemented website you would be able to change these options</div>


<?php

if($options) {
    ?>
    <table class="table">
        <thead>
        <tr>
            <th>Keyname</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($options as $option) {
            ?>
            <tr>
                <td><?=$option->getKeyname()?></td>
                <td><?=$option->getValue()?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php

}else{ ?>
    <strong>There are no options in the system</strong>
<?php
}
?>

<?php


require_once 'inc/footer.php';
