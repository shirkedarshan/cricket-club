<html>

<?php
session_start();

if(!isset( $_SESSION['session_id']) or !isset( $_SESSION['user_id'])){
		$message = "You Are Not Logged In";
		//echo "<script type='text/javascript'>";
		//echo"alert('')";
		echo $message;
		//echo"</script>";
}else{

$session_id= $_SESSION['session_id'];
$prod_id= $_REQUEST['prod_id'];
$user_id= $_SESSION['user_id'];

// to save in DB perform following steps					
				
				//connect to the DB
					$con= mysqli_connect('localhost','root','')	or die("<b>Sorry, cannot connect to your localhost</b>");           
					
				//select one DB out of many DBs
					mysqli_select_db($con,'cricket') or die("<b>Sorry, cart DB not found.</b>");

//////FOR ADD TO CART DUPLICATE ENTRY					
			$s="select prod_id from reference where prod_id='$prod_id' and user_id='$user_id'";
			$re = mysqli_query($con,$s) or die(mysqli_error($con));
			if(mysqli_num_rows($re)==0)
			{

					//insert value into user table				
					$sql = "Insert into reference VALUES('','$prod_id','$user_id')";	
					
					//fire query over user_info table		
					$result = mysqli_query($con,$sql) or die(mysqli_error($con));
					///
					$sql1="Select prod_id from reference where user_id='$user_id' ";
					$result1=mysqli_query($con,$sql1) or die(mysqli_error($con));
			}
			
	if(@mysqli_num_rows($result1)>0){
		$message = "Added To Cart Successfully.";
		//echo "<script type='text/javascript'>";
		//echo"alert('')";
		echo $message;
		//echo"</script>";
		}else
	{
				$message = "Added To Cart Already";
		//echo "<script type='text/javascript'>";
		//echo"alert('')";
		echo $message;
		//echo"</script>";

		}
}
?>
