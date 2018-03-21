<?php

include_once('db_function.php');
include_once('contactBody.php');

if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}



$cid  = strtolower($_REQUEST['q']);
$email = $_SESSION['username'];

if(deleteContact($cid)){

	$result = getAllContacts($email);

    return getBody("", $result);
}
else{
	return "Sorry !! A query error occured, try again.";
}

?>