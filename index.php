<?php
include("include/header.php");
include("include/footer.php");
include("php/db_function.php");

if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>AddressBook</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Footer Style -->  
	<link rel="stylesheet" type="text/css" href="css/footer-distributed.css">

	<!-- Panel Style -->
	<link rel="stylesheet" type="text/css" href="css/main.css"> 

	<!-- Log In form style-->
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
	<script src="https://use.fontawesome.com/b3e68927bc.js"></script>


</head>

<body>

<?php 
	head("", "pages/contacts.php", "pages/logout.php");
?>

<section class="homebody">

	<div class="container">
		<div class="row">
			<div class="col col-md-8 intro">
				<h2>Online Address Book</h2>
				
			</div>
			<?php

			if(!isset($_SESSION['username'])){
					printf('<div class="col col-md-4">
						
						            <div class="account-wall">
						                <h1 class="text-center login-title">Sign in </h1>
						                <form class="form-signin" action="pages/login.php" method="post">
						                <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
						                <input type="password" class="form-control" name="password" placeholder="Password" required>
						                <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">
						                    Sign in</button>
						                <label class="checkbox pull-left">
						                    <input type="checkbox" value="remember-me">
						                    Remember me
						                </label>
						                <a href="https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=what+is+online+address+book" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
						                </form>
						                <a href="pages/createaccount.php" class="text-center new-account">Create an account </a>
						            </div>
						            
					</div>');
		      }
		 ?>
		</div>
	</div>

</section>




 <?php
 	foot("", "pages/contacts.php");
 ?>


</body>
</html>