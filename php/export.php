<?php
include_once('db_function.php');

$email = $_REQUEST['q'];

return exportContact($email);

?>