<?php

$status=$_REQUEST['status'];

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error($con));

//select database
mysqli_select_db($con,'cricket') or die(mysqli_error($con)); 

if( $status==1){
	
	$user_name = $_REQUEST['user_name'];
	$user_msg= $_REQUEST['message'];

	$user_msg=mysqli_real_escape_string($con,$_REQUEST['message']);
	
	$sql1 = "select user_id from tbl_users where name= '$user_name' ";
	$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));//query connect
	
	while( $row=mysqli_fetch_assoc($res1) )

	$user_id=$row['user_id'];
	echo 'User Id'.$user_id;

	//insert query
	$sql = "INSERT INTO user_inbox(user_id,user_msg)
	VALUES('$user_id','$user_msg')";
	
	mysqli_query($con,$sql) or die(mysqli_error($con));//query connect
	echo $status;
	header('location:send_msg.php?status=sent');
	
}else{
	header('location:adminpanel.php');
}

?>