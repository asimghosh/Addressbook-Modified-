<?php
include("../php/db_function.php");
include("../include/header.php");
include("../include/footer.php");

if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

$info="";

if(isset($_POST['add'])){
	 $ret = insertNewContact($_SESSION['username'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['dob'], $_POST['house'], $_POST['road'], $_POST['city']);
	 if($ret==5){
	 	 $info = "Contacts not saved, Query error!";
	 }
	 else if($ret==1){
	 	$info = "User not found !!";
	 }
	 else if($ret==2){
	 	$info = "Contact ID can't be retrived!!!";
	 }
	 else if($ret==3){
	 	$info="Email and Phone no not set !!";
	 }
	 else if($ret==4){
	 	$info="Phone no not set !!";
	 }

else if($ret==10){
	$info="Insertion to address table failed!!";
}
	 else{
	 	//$info="Contact Added !!";
	 	header('Location: contacts.php');
	 }
	
}




  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Error</title>


  	    <!-- Latest compiled and minified CSS -->
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	    
  	    <!-- Footer Style -->  
  		<link rel="stylesheet" type="text/css" href="../css/footer-distributed.css">

  		<!-- Panel Style -->
  		<link rel="stylesheet" type="text/css" href="../css/main.css"> 

  		<!-- Log In form style-->
  		<link rel="stylesheet" type="text/css" href="../css/details.css">

  		<!-- Animate -->
  		<link rel="stylesheet" type="text/css" href="../css/animate.css">


  		<!-- Latest compiled and minified JavaScript -->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	    <!-- Font Awesome -->
  		<script src="https://use.fontawesome.com/b3e68927bc.js"></script>


  </head>
  <body>
    <?php 
	  	head('../', 'contacts.php', 'logout.php');
	  ?>

  <div class="container">
  	<div class="jumbotron">
  		<span style="text-align: center;"><?php echo $info ; ?></span>
  	</div>
  </div>



  <div class="footer navbar-fixed-bottom">
   <?php
 		foot('../', 'contacts.php');
	    ?>
</div>
  </body>
  </html>