<?php
include("../include/footer.php");
include("../php/db_function.php");

if(session_id()=='' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

$isok=true;
$error="";

if(isset($_POST['login']) ){

	 
	if(empty($_POST['email']))
		$error="Please enter your email !!";
	else if(empty($_POST['password']))
		$error="Please enter your password !!";

 else{
	$isok = isValidUser($_POST['email'], $_POST['password']);

	if($isok){
 		$_SESSION['username'] = $_POST['email'];
 		
 		header('Location: contacts.php');
 	}
 	 
 		unset($_POST['login']);
 		 
 	 
 	}
 	 	 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Footer Style -->  
	<link rel="stylesheet" type="text/css" href="../css/footer-distributed.css">

	<!-- Panel Style -->
	<link rel="stylesheet" type="text/css" href="../css/main.css"> 

	<!-- Log In form style-->
	<link rel="stylesheet" type="text/css" href="../css/login.css">

	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="../css/animate.css">


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
	<script src="https://use.fontawesome.com/b3e68927bc.js"></script>


</head>

<body>

 <header>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">

	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>

	      <i class="fa fa-address-book fa-3x" aria-hidden="true"></i>


	    </div>
	    
	    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li id="home"><a href="../">Home</a></li>
	        <li id="blog"><a href="contacts.php">My Contact</a></li>
	         
	      </ul>
	       
	    </div>
	  </div>
	</nav>

</header>
 


<div class="container">
       <?php 
          if(strcmp($error, "")){
          	printf('<div class="alert alert-info" style="text-align:center">
			  <strong>%s</strong>
			</div>', $error);
          }
           else if($isok==false){
           	printf('<div class="alert alert-info" style="text-align:center">
			  <strong>Wrong Email or Password !! Try again with valid email and password !</strong>
			</div>');

           }
        ?>
	<div class="jumbotron">
		<div class="account-wall">
		    <h3 class="text-center login-title">Sign in </h3>

		    <form class="form-signin" action="login.php" method="post">

			    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
			    <input type="password" class="form-control" name="password" placeholder="Password" required>
			    <button  name="login" class="btn btn-lg btn-primary btn-block" type="submit">
			        Sign in</button>
			    <label class="checkbox pull-left">
			    <input type="checkbox" value="remember-me">Remember me</label>

			    <a href="https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=what+is+online+address+book" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
		    </form>

		    <a href="createaccount.php" class="text-center new-account">Create an account </a>
		</div>
	</div>
	
</div>



 <?php
 	foot("../", "contacts.php");
 ?>


</body>
</html>