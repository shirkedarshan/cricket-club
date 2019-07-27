<html>
<head>
<title>FEEDBACK</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg.jpg" class="bg"/>

</head>

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
	die(header("location:index.php"));
}

//.......................................NAVBAR...............................

echo'<div class="navbar" >

	<a href="index.php">Home</a>
	<a href="user_inbox.php">Inbox</a>
	<a href="event.php">Events</a>
	<a href="product.php">Kit Store</a>
	<a href="teams.php">Teams</a>
	<a href="user_booking.php">Ground Booking</a>
	<a href="club.php">Club Affiliations</a>
	<a href="booking.php">Booking Status</a>
	<a href="user_fb.php">Feedback</a>
	
</div>';

	// <a href="delete_acc.php">Delete Account</a>
	
echo '<hr>';

///////////////////////////////// CHECK FEEDBACK ///////////////////////////	

echo '<center><div class="in_form">';
echo '<div class="box">';
echo'<center><b><font size=5>Write A Feedback</font></b></center><hr>';

 
echo '<form method="post" action="userfb_action.php" >';

	echo "<br>";
	echo '<font size=5><b>Feedback : </font></b><input type="text" name ="feedback"/>';

	echo '<br><br>';
	echo "&nbsp &nbsp &nbsp &nbsp &nbsp ";
	echo "&nbsp &nbsp &nbsp &nbsp &nbsp ";

	echo '<input type="hidden" name="status" value="1"/>';

	echo '<input type="submit" value="Send FEEDBACK"/>';

echo '</form>';

@$status=$_REQUEST['status'];
if( $status== 'sent'){
echo'<hr><center><font size=4><b>Feedback Sent</b></font></center>';
}

echo '</div></div></center>';
?>
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