<?php


  function addUser($fname, $lname, $email, $password){
  	$db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());

    $query = "SELECT * FROM users WHERE Email='$email'";

    $result = mysqli_query($db, $query);
    $password = sha1($password);

    if(mysqli_num_rows($result)==0){

  	$query = "INSERT INTO users (First_Name, Last_Name, Email, Password) VALUES ('$fname', '$lname', '$email', '$password')";

  	if(mysqli_query($db, $query)){
  		mysqli_close($db);
  		return "User Added !!";
  	}
  	else{
  		mysqli_close($db);
  		return "Problem creating new profile ! Please try again !";
  	}

   }
   else{
   	mysqli_close($db);
   	return "User already exist with this email .";
   }

  } 


  function isValidUser($email, $password){
  	$db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());
  	 $query = "SELECT * FROM  users WHERE Email='$email' and Password=sha1('$password')";

     $result = mysqli_query($db, $query);

     if(mysqli_num_rows($result)==1){
     	mysqli_close($db);
     	return true;
     }
     mysqli_close($db);
     return false;
  }
 


  function getAllContacts($email){
 	$db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());

 	$query = "SELECT 
 	u.ID,
 	c.CID,
 	c.Name,
 	e.EID,
 	e.Email,
 	p.PID,
 	p.P_Number,
 	a.AID,
 	a.Dob,
 	a.Road_no,
 	a.House_no,
 	a.City
 	FROM users AS u left outer join contacts AS c 
 	on u.ID=c.User_ID 
 	left outer join email AS e 
 	on c.CID=e.C_ID 
 	left outer join phone AS p
 	on c.CID=p.C_ID 
 	left outer join address AS a
 	on c.CID=a.C_ID
 	WHERE u.Email='$email'";

 	$r = mysqli_query($db, $query);

 	$ret = array();

    if($r){

        while ($row = mysqli_fetch_assoc($r) ) {
        	$ret[] =  $row;
        }
        mysqli_close($db);
        return $ret;
    }

    else {
    	mysqli_close($db);
    	return false;
    }

  }

  function insertNewContact($user, $name, $email, $contactn, $dob, $house, $road, $city){
  	$db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());

  	$query = "SELECT * FROM users WHERE Email='$user'";

  	$r = mysqli_query($db, $query);

  	    if($r){
			  		$row = mysqli_fetch_assoc($r);
			  		$userid = $row['ID'];

			  		$query = "INSERT INTO contacts (Name, User_ID) VALUES ('$name', '$userid')";
			  		if(mysqli_query($db, $query)){
			  			$query = "SELECT * FROM contacts WHERE User_ID='$userid' order by CID desc";
			  			$result = mysqli_query($db, $query);

			  			if($result){
			  			$row = mysqli_fetch_assoc($result);
			  			$CID = $row['CID'];

			  			$query1 = "INSERT INTO email (Email, C_ID) VALUES ('$email', '$CID')";
			  			$query2 = "INSERT INTO phone (P_Number, C_ID) VALUES ('$contactn', '$CID')";
			  			$query3 = "INSERT INTO address (City, Road_no, House_no, C_ID, Dob) VALUES ('$city', '$road', '$house', '$CID', '$dob')";
			  			if(mysqli_query($db, $query1)){
			                
			                if(mysqli_query($db, $query2)){

			                	if(!mysqli_query($db, $query3)){
			                		mysqli_close($db);
			                		return 10;
			                	 }
			                      
			                }

			                else{
			                	mysqli_close($db);
			                	return 4;     
			                	
			                }
			                 
			  			}
			  			else{
			  				mysqli_close($db);
			  				return 3;
			  			}
			          }
			  		
			  		else{
			  			mysqli_close($db);
			  			return 2;
			  		}
			  	 }
			  	 else{
			  	 	mysqli_close($db);
			  	 	return 5;
			  	 }
  	    }
  	    else{
  	    	mysqli_close($db);
  			return 1;
   		}
  }

  function deleteContact($cid){
  		$db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());
  		$query = "DELETE c,e,p,a FROM contacts c 
	 	LEFT JOIN email e 
	 	on c.CID=e.C_ID 
	 	LEFT JOIN phone p
	 	on c.CID=p.C_ID 
	 	LEFT JOIN address a
	 	on c.CID=a.C_ID
 	WHERE c.CID='$cid'";


    if(!mysqli_query($db, $query)){
    	mysqli_close($db);
    	return false;
    }
    mysqli_close($db);
  return true;

  }

  function editContact($cid, $name, $email, $phone, $dob, $house, $road, $city){
    $db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());

    $query1 = "UPDATE contacts SET Name='$name' WHERE CID='$cid'";
    $query2 = "UPDATE email SET Email='$email' WHERE C_ID='$cid'";
    $query3 = "UPDATE phone SET Phone='$phone' WHERE C_ID='$cid'";
    $query4 = "UPDATE contacts SET Dob='$dob', House_no='$house', Road_no='$road', City='$city' WHERE C_ID='$cid'";

   $q1=mysqli_query($db, $query1);
    $q2=mysqli_query($db, $query2);
    $q3=mysqli_query($db, $query3);
    $q4=mysqli_query($db, $query4);

    $q5=mysqli_close($db);

    if(!$q1 || !$q1 || !$q1 || !$q1 || !$q1)
    return false;

    return true;
    
  }

 function getDetails($cid){
 	$db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());

 	$query = "SELECT
 	c.Name,
  e.Email,
  p.P_Number,
 	a.City,
 	a.Road_no,
 	a.House_no,
 	a.Dob
  FROM contacts AS c left outer join 
  email AS e on c.CID=e.C_ID
  left outer join phone AS p ON c.CID=p.C_ID 
  left outer join address AS a ON c.CID=a.C_ID 
  WHERE c.CID='$cid'";

   $r=mysqli_query($db, $query);
 
   if($r){
   	mysqli_close($db);
   	return mysqli_fetch_assoc($r);
   }
   else{
   	mysqli_close($db);
   	return false;
   }

 }


 function exportContact($email){

  $db = mysqli_connect("localhost", 'root', '', 'cbook') or die('Could not connect !'.mysqli_connect_error());

  $query = "SELECT 
  u.ID,
  c.CID,
  c.Name,
  e.EID,
  e.Email,
  p.PID,
  p.P_Number,
  a.AID,
  a.Dob,
  a.Road_no,
  a.House_no,
  a.City
  INTO OUTFILE 'result.csv'
  FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '*'
  LINES TERMINATED BY '\n'

  FROM users AS u left outer join contacts AS c 
  on u.ID=c.User_ID 
  left outer join email AS e 
  on c.CID=e.C_ID 
  left outer join phone AS p
  on c.CID=p.C_ID 
  left outer join address AS a
  on c.CID=a.C_ID
  WHERE u.Email='$email'";

  if(mysqli_query($db, $query)){
    return "Export Completed !!";
  }
  else{
    return "Export failed, please try again !!";
  }

 }


?>