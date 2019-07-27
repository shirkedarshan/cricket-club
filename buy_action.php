<?php

session_start();

if($_SESSION['vercode']){

	// Retrieve details from HTMl files , like this : 
	
	//s for shipping address
	//b for billing address

		$snumber=$_REQUEST['snumber'];
		$bnumber=$_REQUEST['bnumber'];
			
		$password=$_REQUEST['pass'];
		$cardno=$_REQUEST['cardno'];

	// check len of the pwd 
	if($_POST["code"]!=$_SESSION['vercode'])
		{
		unset($_SESSION['vercode']);
		header('location: buy.php?status=cap_error');
		}
	else{
	
	if(strlen($cardno)<16){
			header('location: buy.php?status=card_error');
		}
	else{
	
	if(strlen($password)<4)
			{
			header('location: buy.php?status=pin_error');
			}
	else{
			header('location: buy.php?status=success');
		    }    
		 }		
    }
}else{
	header('location: buy.php?status=error');
}
?>