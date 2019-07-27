<?php

session_start();

if($_POST["code"]!=$_SESSION['vercode'])
		{
		unset($_SESSION['vercode']);
		session_destroy();
		header('location: login.php?status=cap_error');
		}
else{		

unset($_SESSION['vercode']);

$con=mysqli_connect('localhost','root','');
if(!$con) die("Check connection parameters");

mysqli_select_db($con,'cricket') or die("Check DB Exists or Not?");

$password=$_REQUEST['pwd'];
$name=$_REQUEST['name'];

$password=mysqli_real_escape_string($con,$_REQUEST['pwd']);
$name=mysqli_real_escape_string($con,$_REQUEST['name']);

$sql="Select * from tbl_users where name='$name' AND pwd='$password' ";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));


$sql1="Select * from tbl_users where name='$name' AND pwd='$password' AND admin='1' ";
$result1=mysqli_query($con,$sql1) or die(mysqli_error($con));

if(mysqli_num_rows($result1)>0){
		////
		
	session_start();
	
	$row=mysqli_fetch_assoc($result);
	
	$text=session_id();
	$_SESSION["session_id"]=$text;
	
	$_SESSION['user_status']='logged_in';
	$_SESSION['user_name']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['admin']=$row['admin'];
	mysqli_close($con);
		
		////
		header('location: index.php');
	}
else{
if(mysqli_num_rows($result)>0){
	//user_exist
	session_start();
	$row=mysqli_fetch_assoc($result);
	
	$text=session_id();
	$_SESSION["session_id"]=$text;
	
	$_SESSION['user_status']='logged_in';
	$_SESSION['user_name']=$row['name'];
	$_SESSION['email']=$row['email'];
	$_SESSION['user_id']=$row['user_id'];
	echo"Welcome ".$_SESSION['user_name']."<br>";
	mysqli_close($con);
	header('location: index.php');
}
else{
		header('location: login.php?status=error');
}}}
	?>