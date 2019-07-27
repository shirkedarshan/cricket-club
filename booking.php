<html>
	<head>
		<title>Ground Booking</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg12.jpg" class="bg"/>
					<!-- Here Write Latest Highlights-->

<?php

$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; // DB Selected

$notice = "SELECT * FROM notice";
$notice_res = mysqli_query($con,$notice);

echo '<marquee>';

while($row=mysqli_fetch_assoc($notice_res)){

echo $row['notice_descp'];

echo '&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
}
echo  '</marquee>';

?>

		<!-- Highlights End -->
		<hr>

		</head>

<body>

<?php

session_start();

if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id'])) 
	{
	echo'<div class="title"><center> Terna Cricket Club 
	
	<span class="innertitle">';
	
	if(isset( $_SESSION['admin']) )
	{
		echo "<a href='adminpanel.php' style='text-decoration:none;'>Admin Panel</a>";
		echo '&nbsp &nbsp';
	}
			
	echo '<a href="logout.php" style="text-decoration:none">Logout</a>
			
	</span></div>
	
	</center><hr>';	
}
else{
	
	echo"<div class='title'><center> Terna Cricket Club 
	
	<span class='innertitle'>
	
	<a href='login.php' style='text-decoration:none'>Login</a>&nbsp &nbsp
	<a href='signup.php' style='text-decoration:none'>Signup</a> 
	
	</span></div>
	
	</center><hr>";
}

//.......................................NAVBAR...............................

echo'<div class="navbar" >

	<a href="index.php">Home</a>';

	if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id'])) 
	{
	echo'<a href="user_inbox.php">Inbox</a>';
	}

echo'
	<a href="event.php">Events</a>
	<a href="product.php">Kit Store</a>
	<a href="teams.php">Teams</a>
	<a href="user_booking.php">Ground Booking</a>
	<a href="club.php">Club Affiliations</a>
	<a href="booking.php">Booking Status</a>';

	if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id'])) 
	{
	echo'<a href="user_fb.php">Feedback</a>';
	}
	
	// <a href="delete_acc.php">Delete Account</a>
	
echo'</div>';


echo '<hr>';

$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;  
		

if(isset( $_SESSION['session_id']) AND isset( $_SESSION['user_id']))  /**/
	{
	
	$user_id=$_SESSION['user_id'];
	$sql1="select * from booking WHERE user_id='$user_id' ";
		
		$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
$count=0;
/*
echo'test';echo'<br>';
echo $user_id;echo'<br>';
echo $status;echo'<br>';
echo mysqli_num_rows($res1);	*/

	if(mysqli_num_rows($res1)>0)
		{	
echo '<div class="box">';

	echo "<table>";		
	echo"<center><b><h2>Your Booking Inbox As Follows</h2></b></center><hr>";

	while($row1=mysqli_fetch_assoc($res1))
	{
	echo "<td>";

	echo'<div class="colwidth_200">';
	
	$start_date=$row1['start_date'];
	$end_date=$row1['end_date'];

	$start_date = date('d-m-Y', strtotime($start_date));
	$end_date=date('d-m-Y', strtotime($end_date));

	echo '<b>Purpose</b> &nbsp: '.$row1['purpose'].'<br><br>';
	
	echo '<b>From</b> &nbsp: '.$start_date.'<br><br>';
	//echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	
	echo '<b>To</b> &nbsp &nbsp &nbsp : '.$end_date.'<br><br>';
	
	echo '<b>Cost</b> &nbsp &nbsp: '.$row1['cost'].'<br><br>';
	
	if ($row1['status']==1){
		echo 'Approved';
	}else{
		if ($row1['status']==2){
	echo 'Rejected';
	echo '&nbsp &nbsp';
	
	echo '<a href="addbooking_action.php?status=3&booking_id='.$row1['booking_id'].'">';
	echo 'Delete Notice</a>';
		
	}else
	{
		echo 'Waiting';
		echo '&nbsp &nbsp';
			
		echo '<a href="addbooking_action.php?status=3&booking_id='.$row1['booking_id'].'">';
		echo 'Cancel Request</a>';
		}
	}
		
		echo '</div>';
		
			
		echo "</td>";

		$count++;
		if($count==4){
		$count=0;
		echo "</tr>";
			}
		}
	echo '</table>';
	echo '</div>';
	
	}else{
	echo '<div class="box">';
	echo '<br><br>';
	echo '<center ><font size="5"><b>Your Booking Inbox Is Empty</b></font><center>';
	echo '<br><br>';
	echo '</div>';
	}
}


///////////////////////////////// COMMON INBOX ///////////////////////////		
	$sql="select * from booking WHERE status='1'";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$count=0;
		
	if(mysqli_num_rows($res)>0)
		{
	echo '<div class="box">';
	echo"<center><b><h2>Booked Dates Are As Follows</h2></b></center><hr>";
	echo "<table>";	
	
	while($row=mysqli_fetch_assoc($res))
	{
	
	echo "<td>";

	echo'<div class="colwidth_200">';
	
	//Para Testing Para Testing Para Testing

	$booking_id=$row['booking_id'];
	
	$start_date=$row['start_date'];
	$end_date=$row['end_date'];

	$start_date = date('d-m-Y', strtotime($start_date));
	$end_date=date('d-m-Y', strtotime($end_date));
	
	echo '<br>';
	
	echo '<b>From</b> &nbsp: '.$start_date;
	
	echo '<br><br>';
	//echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	
	echo '<b>To</b> &nbsp &nbsp &nbsp : '.$end_date.'<br>';
	echo'<br>';
			
			
		echo '</div>';
		
			
		echo "</td>";

		$count++;
		if($count==4){
		$count=0;
		echo "</tr>";
			}
		}
	echo "</table>";
	echo '</div>';
	}else{
	echo '<div class="box">';
	echo '<br><br>';
	echo '<center><font size="5"><b>No Current Bookings Present </b></font></center>';
	echo '<br><br>';
	echo '</div>';
	}

?>
</body>
							<!-- Footer Section -->
<footer>

<div class="footer">

<!--opacity: 0.75;-->

<div class="f1" style="float:left">

CONTACT US <br><br>

Plot No. 12, Sector-22, Opp. Nerul Railway Station, Phase-II, Nerul (W), Navi Mumbai 400706.<br> 
Ph: 022-61115444 <br>
Fax: 022-61115400 <br>
Email: info@ternaengg.ac.in <br>

</div>


<div class="f1" style="float:right ;" >

FOLLOW US ON <br><br>

<a target="_blank" href="https://www.facebook.com/ternanerul"><img src="pics/logo/logo1.png" width="40"></a>

<a target="_blank" href="https://twitter.com/terna_college"><img src="pics/logo/logo2.png" width="39"></a>

<a target="_blank" href="https://www.linkedin.com/school/terna-engineering-college/about/"><img src="pics/logo/logo3.png" width="40"></a>

<a target="_blank" href="https://www.youtube.com/user/TEC2016" ><img src="pics/logo/logo4.png" width="40"></a>

</div>

</div>

</footer>