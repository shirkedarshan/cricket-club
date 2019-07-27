<?php

session_start();

$status=$_REQUEST['status'];

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error($con));

//select database
mysqli_select_db($con,'cricket') or die(mysqli_error($con)); 

echo $status;
if( $status==1){
	$user_name=	$_SESSION['user_name'];
	$user_id = $_SESSION['user_id'];
	$fb_descp=$_REQUEST['feedback'];
	
	$fb_descp=mysqli_real_escape_string($con,$_REQUEST['feedback']);
	
	//insert query
	$sql = "INSERT INTO feedback(user_id,user_name,fb_descp)
	VALUES('$user_id','$user_name','$fb_descp')";
	
	mysqli_query($con,$sql) or die(mysqli_error($con));//query connect
	
	header('location:user_fb.php?status=sent');
	

}else{
if( $status==3){
	
	$fb_id=$_REQUEST['fb_id'];
	
	$query="delete from feedback where fb_id='$fb_id'";
	$res=mysqli_query($con,$query) or die(mysqli_error($con));
	
	header('location:check_fb.php');	
}else{
if( $status==4){
	
	$user_id = $_REQUEST['user_id'];
	$fb_id= $_REQUEST['fb_id'];
	$fb_descp= $_REQUEST['fb_descp'];
	$fb_reply= $_REQUEST['fb_reply'];
	
	$fb_reply=mysqli_real_escape_string($con,$_REQUEST['fb_reply']);
	
	//insert query
	$sql = "INSERT INTO fb_inbox(user_id,fb_id,fb_reply,fb_descp)
	VALUES('$user_id','$fb_id','$fb_reply','$fb_descp')";
	
	mysqli_query($con,$sql) or die(mysqli_error($con));//query connect
	echo $status;
	header('location:check_fb.php');	
}
}
}

?>