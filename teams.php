<html>
	<head>
		<title>Teams</title>
			
<link rel="stylesheet" href="style.css">
<img src="pics/bg9.jpg" class="bg" />
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
///////////////////////////////////////////////////////////////////////////////////////


	$con = mysqli_connect('localhost','root',''); //The Blank string is the password
	mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;

	$query = "SELECT * FROM teams"; //You don't need a ; like you do in SQL
	$result = mysqli_query($con,$query);

$count=0;

echo '<div class="box">';

	echo '<h2><center> All Teams</center><h2><hr>';
	
echo "<center><table>";

while($row = mysqli_fetch_assoc($result)){   //Creates a loop to loop through results

echo "<td>";


echo "<div class='box' style='color:black'>";

echo '<b><font size=4><a href="team_detail.php?team_name='.$row['team_name'].'" style="text-decoration:none">';
echo $row['team_name'];

if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']))  
	{
		echo "<br><br>";

		echo '<a href="teams_del.php?teams_id='.$row['teams_id'].'"><center><button>Delete </button></center></a>';
}

echo  '</a></font>';
echo "</div>";
///////////////////
echo "<br>";

//echo "</fieldset>";
echo "</td>";

$count++;
if($count==5){
$count=0;
echo "</tr>";}	

}

echo "</table></center>";
echo "</div>";

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