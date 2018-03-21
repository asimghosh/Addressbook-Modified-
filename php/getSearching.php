<?php
include_once('db_function.php');
include_once('contactBody.php');

    if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

    $str = strtolower($_REQUEST['q']);

	$email = $_SESSION['username'];

    $result = getAllContacts($email);

	return getBody($str, $result);
	        			      			
?>