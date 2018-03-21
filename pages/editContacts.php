<?php
include_once('../php/db_function.php');
include_once('../include/header.php');
include_once('../include/footer.php');
 
if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
 $row;
 $name="Contact";
 if(isset($_GET['id']) && isset($_SESSION['username']) ){
 $cid = $_GET['id'];
 
 if(isset($_POST['edit'])){


    
 	if(editContact($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['dob'], $_POST['house'], $_POST['road'], $_POST['city']))
       $message = "Contacts  Edited !!";

     else $message = "Something wrong, try again !!";
    
 }

//header('Location: '.$_SERVER['HTTP_REFERER']);

$row = getDetails($cid);

$name = $row['Name'];

}

?>


<!DOCTYPE html>

<html>

	<head>
		<title><?php echo "Edit - ".$name?></title>
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
		     <?php
		     if(isset($message)){
		     	echo "<span class='info'>".$message."</span>";
		     }
		     ?>
			  <h3 style="text-align: center;">Edit contact</h3>
			 <div style="width: 50%; margin-left: 25%">

			       
			 				 <?php

			 				 if(!empty($row)){
			 		   printf('
			 			<form action="editContacts.php?id=%s" method="post">
			 			    <input type="hidden" name="id" value="%s">
			 	        	<label for="name" >Name</label>
			 	        	<input class="form-control" type="text" name="name" id="name" value="%s" placeholder="Example">
			 	            <label for="Email" >Email</label>
			 	        	<input class="form-control" type="email" value="%s" name="email" id="Email" placeholder="Example@example.com">
			 	        	<label for="CNo" >Contact No</label>
			 	        	<input class="form-control" type="text" value="%s" name="phone" id="CNo" placeholder="01*********">
			 	        	<label for="CNo" >Date Of Birth</label>
			 	        	<input class="form-control" type="date" value="%s" name="dob" id="dob" placeholder="Date of birth">
			 	        	<label for="CNo" >House No</label>
			 	        	<input class="form-control" type="text" value="%s" name="house" id="house" placeholder="House No">
			 	        	<label for="CNo" >Road No</label>
			 	        	<input class="form-control" type="text" value="%s" name="road" id="road" placeholder="Road no">
			 	        	<label for="CNo" >City</label>
			 	        	<input class="form-control" type="text" value="%s" name="city" id="city" placeholder="City">
			 	        	<button name="edit"  type="submit" class="form-control btn btn-primary" style="margin-top:5px">Done</button>
			 	        </form>',$cid, $cid, $row['Name'], $row['Email'], $row['P_Number'], $row['Dob'], $row['House_no'], $row['Road_no'], $row['City']);
			 		     }

			 	        ?>
			 </div>
		</div>
	</div>


  
   <?php
   		foot('../', 'contacts.php');
   ?>
    
</body>
</html>