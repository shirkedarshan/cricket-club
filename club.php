<html>
	<head>
		<title>Club</title>

<link rel="stylesheet" href="style.css">
<img src="pics/bg18.jpg" class="bg"/>
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

/////////////////////////////////////////Pagination
$page_limit=2;

if(isset ($_GET['page_no']))
	{
	$page_no=$_GET['page_no'];
	}
	else{
	$page_no='1';
	}


/////////////////////////////////////////////////
$ini_lim =( ( $page_no - 1)*$page_limit );

/////////////////////////////////////////
$con = mysqli_connect('localhost','root',''); //The Blank string is the password
mysqli_select_db($con,"cricket") or die(mysqli_error($con)) ; 

$sql = "SELECT * FROM club"; //You don't need a ; like you do in SQL
$result_page = mysqli_query($con,$sql);

//////////////////////////////////////////////////////////////////////////////////////////////

	
$total_prod= mysqli_num_rows($result_page) ;


$total_pages = ($total_prod/$page_limit);// Calc for Total No of pages
$total_pages = ceil($total_pages);


$ini_lim =( ( $page_no - 1)*$page_limit );


$sql_club = "SELECT * FROM club LIMIT $ini_lim,$page_limit"; //You don't need a ; like you do in SQL
$result_club = mysqli_query($con,$sql_club);

///////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class='box'>";

echo '<center><h2>CLUBS</h2></center><hr>';

echo '<center>';
echo "<table>";

		$count=0;

		while($row_club = mysqli_fetch_assoc($result_club)){   //Creates a loop to loop through results

		echo "<td>";
		echo "<div class='in_form' >";

		/////////////////////////////// Club

		echo "<center><h3>";
				
			echo $row_club['club_name'];
			echo "</h3></center>";
			echo "<hr>";

									//Image Div

		echo '<center><img src="pics/'.$row_club['club_file'].'" width="500" height="300"></center>';
		echo '<br><br>';

									//Inner Div
		echo "<div class='in_form'><br><center>";

		echo "<b>E-Mail : </b>".$row_club['club_mail'];
		echo "<br><br>";
		echo "<b>WebSite : </b>".$row_club['club_site'];
		echo "<br><br>";
		echo "<b>Contact : </b>".$row_club['club_tel'];
		echo "<br><br>";
		echo "<b>Location : </b>".$row_club['club_loc'];
		echo "<br><br>";
		
		if( isset( $_SESSION['session_id']) and isset( $_SESSION['admin']))  /**/
	{
		echo "&nbsp&nbsp";

		echo '<a href="club_del.php?club_id='.$row_club['club_id'].'"><button>Delete Club</button></a>';
}

		echo "</center></div>";

		/////////////////////////////// Club end
echo "</div>";
echo "<br>";
echo "</td>";

$count++;
if($count==2){
$count=0;
echo "</tr>";}
}

echo "</table>";

echo '</center>';
/////////////////////////////////////////footer

echo "<center>";
if($page_no!=1){
echo"<a href='club.php?page_no=".($page_no-1)."' style='text-decoration:none'>prev</a>";
echo "&nbsp";
echo "&nbsp";
}

for($i=1;$i<=$total_pages;$i++)
{
	echo"&nbsp<a href='club.php?page_no=".$i."' style='text-decoration:none'>$i</a>";
	echo "&nbsp";
	echo "&nbsp";
	}

	
if($page_no != $total_pages){
echo"<a href='club.php?page_no=".($page_no+1)."' style='text-decoration:none'>next</a>";
}

echo "</center>";
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