<html>
	<head>
		<title>Welcome</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg.jpg" class="bg" />

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
//////////////

echo '<div class="row" style="position:relative">
  <div class="column" >
    <img src="pics/ab.jpg" alt="Picture" style="width:100%">
  </div>
  <div class="column">
    <img src="pics/abc.jpg" alt="Picture" style="width:100%">
  </div>
  <div class="column">
    <img src="pics/bg4.jpg" alt="Picture" style="width:100%">
  </div>
</div>';
echo '<hr>';
?>
							<!-- About Section -->			
<div class="box">
    <h2><center>About</center></h2><hr>
	<blockquote><font size="4">
The Terna Cricket Association (TCA) is a private club incorporated on 8th November, 2018, with an objective to promote cricket and other sports amongst students. Its contributions to sports and cricket in particular, have given it a unique position in the colleges of not only Mumbai University but the Maharashtra.<br><br>

Several great cricket tournaments and matches have taken place this ground. The most popular have been the prestigious Pentangular Tournament, The Match Between Defending Champions Against Freshers Was A Spectacular Context To Watch. The stadium saw a high-profiled audience and packed stands.<br><br>

Though cricket has been the mainstay of TCA, besides it, other sports such as tennis, badminton, squash, billiards and snooker, swimming are also being promoted. Many prestigious intracollege events of these other sports are even held at TCA including ATP Tournaments. Apart from sports also hosted grand cultural events and musical concerts which include performances by greats such as John McLaughlin, Placido Domingo and Rolling Stones.<br><br>

Today, TCA continues to encourage of sports in for students of the college and is recognized as one of the most prestigious clubs in the intercolleges with reciprocal arrangements with many leading sports clubs all over the Mumbai.<br><br>
	</font></blockquote>
</div><hr>
						<!--		Add Animation		-->
							
							<!--     Animation       -->
							
<center>				
<div>
		
		<h1><b>Visit Our Kit Store To Grab This OFFERS</b></h1>

  <div class="infoslides" >
    <font size="7" color='#8c0d26'><b>Did You Know?</b></font><br></br>
    <font size="5" color='#8c0d26'><strong>SPECIAL OFFERS ON COMPLETE KITS</strong></font>
	<br><br>
	<font size="5" color='#8c0d26'><strong>Now Available From Rs.1999</strong></font>
  </div>
  
  <div class="infoslides" >
    <font size="7" color='#8c0d26'><b>...Juniors Special...</b></font><br></br>

	<font size="5" color='#8c0d26'><strong>Complete Kit At Rs.1499</strong></font>
  </div>

<!-- <img src="pics/bg9.jpg" class="infoslides" style="width:500"/> -->

  <div class="infoslides" style="width:500">
    <font size="7" color='#8c0d26'><b>New!</b></font><br></br>
	<font size="5" color='#8c0d26'><b>MRF Complete Kit</b></font><br></br>
    <font size="5" color='#8c0d26'><strong>Only <del>Rs.9999</del> Rs.2999</strong></font>
  </div>
</div>
</center>
<hr>

<script>
var infoindex = 0;
info();

function info() {
  var j;
  var y = document.getElementsByClassName("infoslides");
  for (j = 0; j < y.length; j++) {
    y[j].style.display = "none"; 
  }
  infoindex++;
  
  if (infoindex > y.length) {infoindex = 1} 
  y[infoindex-1].style.display = "block"; 
  setTimeout(info, 2500); 
}
</script>

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