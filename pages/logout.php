<?php 

session_start();
unset($_SESSION['username']);
session_destroy();

header('Location: ' . $_SERVER['HTTP_REFERER']);

 ?>