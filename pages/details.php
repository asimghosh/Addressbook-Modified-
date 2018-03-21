<?php
include("../include/header.php");
include("../include/footer.php");
include("../php/db_function.php");

if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
 $details;
 $name="Details";

if(isset($_SESSION['username'])){

$details = getDetails($_GET['id']);


if($details!=false){
$name = $details['Name'];
}

}


?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name?></title>


	
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
			    <h3>Contact Details</h3>
			   
			       <?php
			          if(isset($details)){
				          printf('<table class="table ">

						   	<thead>
						   		<tr>
						   			<th>#</th>
						   			<th>Details</th>
						   		</tr>
						   	</thead>
						   	<tbody>
					   		<tr>
					   			<th>Name</th>
					   			<td>%s</td>
					   		</tr>
					   		<tr>
					   			<th>Email</th>
					   			<td>%s</td>
					   		</tr>
					   		<tr>
					   			<th>Phone Number</th>
					   			<td>%s</td>
					   		</tr>

					   		<tr>
					   			<th>Date Of Birth</th>
					   			<td> 
				 					%s
					   			 </td>
					   		</tr>

					   		<tr>
					   			<th>Address</th>
					   			<td> 
					   			        <address> 
					   					 House No : %s<br>
					   					 Road No : %s<br>
					   					 City : %s<br>
					   					  
					   					</address>
					   			 </td>
					   		</tr>

					   		
					   		</tbody>
			              </table>', $name, $details['Email'], $details['P_Number'],  $details['Dob'],  $details['House_no'],  $details['Road_no'],  $details['City']);

			             }

			           ?>
		   	</div>
   	
   </div>


<div class="footer navbar-static-bottom">
   <?php
 		foot('../', 'contacts.php');
	    ?>
</div>
</body>


</html>