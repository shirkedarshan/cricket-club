<html>
	<head>
		<title>Kit Store</title>
			
<link rel="stylesheet" href="style.css">
<img src="pics/bg6.jpg" class="bg"/>
</head>
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
	
	
	echo '
	
	<a href="cartbtn.php" style="text-decoration:none">Cart</a>
	&nbsp &nbsp
	
	<a href="logout.php" style="text-decoration:none">Logout</a>
			
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
// .................................Navbar End..................................
echo '<div class="box">';

echo "<h2><center>Kit Store</center></h2>";
echo "<hr>";
//////////////connection
	$con = mysqli_connect('localhost','root',''); //The Blank string is the password
	mysqli_select_db($con,'cricket') or die(mysqli_error($con)) ;

	$query = "SELECT * FROM product"; //You don't need a ; like you do in SQL
	$result = mysqli_query($con,$query);

	$count=0;

/////////////////////////Pagination
$page_limit=4;
	
if(isset ($_GET['page_no']))
	{
	$page_no=$_GET['page_no'];
	}
	else{
	$page_no='1';
	}
///////////////			DECLARATION	
	
$total_prod= mysqli_num_rows($result) ;


$total_pages = ($total_prod/$page_limit);// Calc for Total No of pages
$total_pages = ceil($total_pages);


/////////////////////////////////////////////////
$ini_lim =( ( $page_no - 1)*$page_limit );
//echo "test 2";


$count=0;


$query1 = "SELECT * FROM product LIMIT $ini_lim,$page_limit"; 
	$result1 = mysqli_query($con,$query1);
	
	//echo "test 3";
		
	//echo "test 4";
	echo "<center><table>";

	while($row = mysqli_fetch_assoc($result1)){   //Creates a loop to loop through results


	$prod_id=$row['prod_id']; //unique product id

echo "<td>";

echo "<div class='in_form'>";

///////////////////////////////////////////////////////
//echo $row['prod_name'];
//////////////////////////////////////////

echo '<b><center><a href="prod_descp.php?prod_id='.base64_encode($row['prod_id']).'" style="text-decoration:none">';
echo $row['prod_name'];
echo  '</a></center></b><hr>';

////////////////////////////////////
echo "<br>";
//Passing in_formation through hidden tag


echo '<a href="prod_descp.php?prod_id='.base64_encode($row['prod_id']).'">';
/*
echo "<input type='hidden' name='prod_id' value='$prod_id'>";
*/
echo '<center><img src="pics/'.$row['file'].'"width="215" style="margin:10" height="200" >';

echo "</a>";

echo "<br><br>";
echo "<b>Rs: ".$row['cost']."<b></center>";
echo "<br>";


//$row['index'] the index here is a field name

echo "</div>";
echo "</td>";



$count++;
if($count==6){
$count=0;
echo "</tr>";}	}
//echo"</div>";
echo "<div>";
echo "</table></center>";

echo"<br>";

echo "<center>";
if($page_no!=1){
echo"<a href='product.php?page_no=".($page_no-1)."'>prev</a>";
echo "&nbsp";
echo "&nbsp";
}

for($i=1;$i<=$total_pages;$i++)
{
	echo"&nbsp<a href='product.php?page_no=".$i."'>$i</a>";
	echo "&nbsp";
	echo "&nbsp";
	}

	
if($page_no != $total_pages){
echo"<a href='product.php?page_no=".($page_no+1)."'>next</a>";
}

echo "</center></div> <br><hr>";

mysqli_close($con);
	
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