<?php

include('database.inc.php');

$email = $_GET['email'];
$pwd = $_GET['psw'];
$location = $_GET['location'];
$phone= $_GET['phone'];


$res = mysqli_query($con,"SELECT * FROM users where email='$email'");//checking if user already registered

$row = mysqli_num_rows($res);

if($row==0){ //if user does not exist this part will execute
	$query = "INSERT into users values ('$email','$pwd','$location','$phone')"; //Rearrage data according to your columns
	$result = mysqli_query($con,$query);
	$row1 = mysqli_affected_rows($con);
	if($row1==1){
		 echo '<script>alert("Registration done. Please Login!");
  window.location.href = "first.html";
  </script>';
		  //Don't echo and display some dialog to show registration successful and open login form
	}
	else{
		echo "signup failed"; //DOn't echo and display dialog to show registration faild and say try again after sometime
	}
}
else{//if user already exists this part will execute
	echo "user already exists"; //Don't echo and display dialog to show message user already exists
}

?>
