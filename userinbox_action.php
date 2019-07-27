<?php

$status=$_REQUEST['status'];
$msg_type=$_REQUEST['msg_type'];

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error($con));

//select database
mysqli_select_db($con,'cricket') or die(mysqli_error($con)); 

if($msg_type == 'fb'){
	if( $status==3){
		
		$fbinbox_id=$_REQUEST['fbinbox_id'];
		
		$query="delete from fb_inbox where fbinbox_id='$fbinbox_id'";
		$res=mysqli_query($con,$query) or die(mysqli_error($con));
		
		header('location:user_inbox.php');	
	}else{
			header('location:user_inbox.php');
	}
}

if($msg_type == 'user'){
	if( $status==3){
		
		$userinbox_id=$_REQUEST['userinbox_id'];
		
		$query=" delete from user_inbox where userinbox_id='$userinbox_id' ";
		$res=mysqli_query($con,$query) or die(mysqli_error($con));
		
		header('location:user_inbox.php');	
	}else{
			header('location:user_inbox.php');
	}
		
	}

?>