<?php
// this file is called by the AJAX object
 
$name=$_REQUEST['name'];

//connect database

$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;  


//Note : we have allready created database called state_city

	$sql="select * from tbl_users where name='$name'";
	
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));
	
	if(mysqli_num_rows($res)>0)
		{	
			echo'<b>Email.</b>';

			while($row=mysqli_fetch_assoc($res))
			{
				echo'<input type=email value="'.$row['email'].'" name='.$row['email'].' disabled/>'; 
				
			}
		echo '</select>';
		}
		else
		{
			echo "Wrong Choice";
		}

?>