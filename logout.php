<?php
session_start();

unset($_SESSION['user_status']);
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['session_id']);
unset ($_SESSION['admin']);
unset($_SESSION['totalcost']);

session_destroy();

echo"Thank You,Visit again";
echo"<br>";
echo"<a href='index.php'/>LogIn again</a>";
header('location:index.php');

?>