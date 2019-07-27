<?php
echo"You are in a admin file";
echo "<br>";
?>

<?php
 
//This gets all the other in_formation from the form
$prod_name = $_REQUEST['prod_name'];
$file = $_FILES['file']['name'];
$descr = $_REQUEST['prod_descr'];
$cost = $_REQUEST['cost'];

move_uploaded_file($_FILES['file']['tmp_name'], "pics/".$_FILES['file']['name']);

//create connect			
$con=mysqli_connect('localhost','root','') or die(mysqli_connect_error());

$prod_name=mysqli_real_escape_string($con,$_REQUEST['prod_name']);
$file=mysqli_real_escape_string($con,$_FILES['file']['name']);
$descr=mysqli_real_escape_string($con,$_REQUEST['prod_descr']);

//create database
mysqli_select_db($con,'cricket') or die(mysqli_error($con));  

//insert query
$sql = "INSERT INTO product(prod_name,file,prod_descr,cost)VALUES('$prod_name','$file','$descr','$cost')";

mysqli_query($con,$sql) or die(mysqli_error($con));//query connect

$sql1 = "Select * from product where prod_name='$prod_name'";

$result = mysqli_query($con,$sql1) or die(mysqli_error($con));

if( mysqli_num_rows($result) == 1 )
{
	echo "Product Inserted Successfully<br>";
	echo "To Insert Another Product<a href='addproduct.html'>Click Here<a/><br>";
	echo "To View Products <a href='index.php'>Click Here<a/>";
	header ("location:product.php");
}else{
	echo mysqli_error($con);
}

mysqli_close($con);									

?>