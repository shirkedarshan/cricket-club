<?php

$status=$_REQUEST['status'];

echo $status;

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error());

//select database
mysqli_select_db($con,'cricket') or die(mysqli_error($con));  


if( $status==1){
	
	$notice_descp = $_REQUEST['notice'];
	
	$notice_descp=mysqli_real_escape_string($con,$_REQUEST['notice']);
	
	$sql = "INSERT into notice(notice_descp)VALUES('$notice_descp')";
	mysqli_query($con,$sql) or die(mysqli_error($con));//query connect
	header('location:notice_section.php');
	

}else{
if( $status==3){
	
	$notice_id=$_REQUEST['notice_id'];
	
	$query="delete from notice where notice_id='$notice_id'";
	$res=mysqli_query($con,$query) or die(mysqli_error($con));
	
	header('location:notice_section.php');	
}
}
?>