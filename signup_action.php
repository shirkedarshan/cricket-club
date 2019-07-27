<?php

session_start();

	if($_POST){


	// Retrieve details from HTMl files , like this : 
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$email=$_REQUEST['email'];



	// check len of the pwd 
		if(strlen($password)<6)
		{
		unset($_SESSION['vercode']);
		session_destroy();
		header('location: signup.php?status=pass_error');
		}
		else{
		if($_POST["code"]!=$_SESSION['vercode'])
		{
		unset($_SESSION['vercode']);
		session_destroy();
		header('location: signup.php?status=cap_error');
		}
		else
			{
				unset($_SESSION['vercode']);
				session_destroy();
			
				// to save in DB perform following steps					
				
				//connect to the DB
					$con= mysqli_connect('localhost','root','')	or die("<b>Sorry, cannot connect to your localhost.</b>");           
					
				//select one DB out of many DBs
					mysqli_select_db($con,'cricket') or die("<b>Sorry, cart DB not found.</b>");
					
	            //insert value into user table				
					$sql = "Insert into tbl_users VALUES('','$username','$email','$password','')";	
					
			    //fire query over user_info table		
					$result = mysqli_query($con,$sql) or die(mysqli_error($con));
					
				header('location: signup.php?status=success');
		
					mysqli_close($con);									
		    }    
		 }		
    }
?>
