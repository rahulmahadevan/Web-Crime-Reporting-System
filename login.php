<?php
include('database.inc.php');
$email = $_GET['email'];
$password = $_GET['psw'];
session_start();
$_SESSION['next'] = 0;
$_SESSION['details'] = 0;
$_SESSION['crimetype']="";

$res = mysqli_query($con,"SELECT * FROM users where email='$email' AND password='$password'");//Authenticating

$row = mysqli_num_rows($res);

if($row!=0){
	header("location:tasc1.html");//Write code to display home page of user by accessing data from database
	//mysqli_query($con,"INSERT INTO cases(email) VALUES('$email')");
	$_SESSION['email'] = $email;
}
else{
	echo '<script>alert("Invalid Login Details, please try again");
  window.location.href = "first.html";
  </script>';  //Invalid login details
}

mysqli_close($con);
