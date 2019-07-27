<html>
	<head>
		<title>Team Squad</title>
			
<style>

.player_column {
  text-align:center;
  font-weight:bold;
  width:400;
  padding: 5px;
  font-size:20;
}

.player_column img {
  width:45%;
}

</style>

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
////////////////////////////////////////////////////////////////////////////////////

$team_name= $_REQUEST['team_name'];
$con = mysqli_connect('localhost','root',''); //The Blank string is the password
	mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;

	$query = "SELECT * FROM teams where team_name='$team_name'"; //You don't need a ; like you do in SQL
	$result = mysqli_query($con,$query);

	
$count=0;
	
echo "<table>";

	while( $row = mysqli_fetch_assoc($result)){
	
	echo "<td>";
//echo "<fieldset class='style1'>";

echo "<div class='box'>";

echo '<b style="font-size:25"><center>'.$row['team_name'].'</center></b><br><hr>';

//echo '<img src="pics/'.$row['file'].'"width="150" height="200" ">';

/////////////////////////////////////players start



echo "<div class='row' style='position:relative'>
  <div class='player_column' >
  ".$row['player_1']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_2']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_3']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
</div>";

echo "<br><br>";

echo "<div class='row' style='position:relative'>
  <div class='player_column' >
  ".$row['player_4']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_5']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_6']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
</div>";

echo"<br><br>";
echo "<div class='row' style='position:relative'>
  <div class='player_column' >
  ".$row['player_7']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_8']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_9']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
</div>";

echo"<br><br>";
echo "<div class='row' style='position:relative'>
  <div class='player_column' >
  ".$row['player_10']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  ".$row['player_11']."<br><br> <img class='player_column' src='pics/player.png'>

  </div>
  <div class='player_column'>
  <br>

  </div>
</div>";

/////////////////////////////////////Players End
echo "</div>";
echo "<br>";

//echo "</fieldset>";
echo "</td>";



$count++;
if($count==3){
$count=0;
echo "</tr>";}	

}
	
echo "</table>";
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