<?php
include('database.inc.php');
mysqli_query($con,"truncate table message");
?>

<!DOCTYPE html>
<html>
<head>
	<title>TASC</title>
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(image1.jpg);
	height: 100vh;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;">
	<h1 style="color: white;position:absolute;top:50%;left:50%;transform: translate(-50%,-50%);text-align: center">THANK YOU FOR CONTACTING US,  
	STAY SAFE!</h1>

	<a href="first.html"><button>Go To Home Page</button></a>
</body>
</html>