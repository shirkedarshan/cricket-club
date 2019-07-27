<html>
	<head>
		<title>Inbox</title>
			
<link rel="stylesheet" href="style.css">
<img src="pics/bg17.jpg" class="bg"/>
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

echo '	<hr>
		</head>
		<body>';

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
///////////////////////////////////////////  FOR BOTH INBOX
$user_id=$_SESSION['user_id'];

///////////////////////////////////////////          USER INBOX

	$sql="select * from user_inbox where user_id='$user_id' ";
	$res=mysqli_query($con,$sql) or die(mysqli_error($con));

$count=0;

	echo '<div class="box">';
		
	if(mysqli_num_rows($res)>0)
		{	
	echo "<table>";		
	echo"<center><b><h2>INBOX</h2></b></center><hr>";
		
	while($row=mysqli_fetch_assoc($res))
	{

	echo "<td>";
	echo'<div class="colwidth_200">';
	
	//Para Testing Para Testing Para Testing
	
	$userinbox_id=$row['userinbox_id'];
	$user_msg=$row['user_msg'];

	//echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	
	echo $user_msg;
		
	echo '<br><br>';
		
	echo '<a href="userinbox_action.php?status=3&userinbox_id='.$userinbox_id.'&msg_type=user">';
			echo 'Delete </a>';
	
	echo '</div>';
		
			
		echo "</td>";

		$count++;
		if($count==4){
		$count=0;
		echo "</tr>";
			}

		}
		echo "</table>";
	}
else{
	echo '<br><br>';
	echo '<center ><font size="5"><b>Your Inbox Is Empty</b></font><center>';
	echo '<br><br>';
	}
	echo '</div>';
	
///////////////////////////////////////////       FEEDBACK REPLY INBOX

	$sql1="select * from fb_inbox where user_id='$user_id'"; /////FEEDBACK Reply Query
	$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));

$count=0;
		
	if(mysqli_num_rows($res1)>0)
		{	
	
	echo '<div class="box">';
	
	echo "<table>";		
	echo"<center><b><h2>FEEDBACK INBOX</h2></b></center><hr>";
	
	while($row1=mysqli_fetch_assoc($res1))
	{
	
	///////////////Finding A message on which admin replied sql2 query
	
	$fb_id=$row1['fb_id'];
	
	/////////////Getting Our FeebBack
	$fb_descp=$row1['fb_descp'];
	
	echo "<td>";
	echo'<div class="colwidth_200">';
	
	//Para Testing Para Testing Para Testing
	
	$fbinbox_id=$row1['fbinbox_id'];  
	$fb_reply=$row1['fb_reply'];

	//echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	
	echo '<b>My Feedback :</b><br><br>';
	echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	echo $fb_descp;
	echo '<br><br>';
	
	echo '<b>Admin Reply :</b><br><br>';
	echo '&nbsp &nbsp &nbsp &nbsp &nbsp';
	echo $fb_reply;
	echo '<br><br>';
		
	echo '<a href="userinbox_action.php?status=3&fbinbox_id='.$fbinbox_id.'&msg_type=fb">';
			echo 'Delete </a>';
	
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
	}
else{
	echo '<div class="box">';
	echo "<br><br>";
	echo '<font size="5"><center><b>Your Feedback Inbox Is Empty</b><center></font>';
	echo "<br><br>";
	echo "</div>";
	}

	
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