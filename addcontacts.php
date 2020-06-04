<?php
$con=mysqli_connect('localhost','root','','convo');
$name = mysqli_real_escape_string($con,$_POST['name']);
$des = mysqli_real_escape_string($con,$_POST['designation']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$email = mysqli_real_escape_string($con,$_POST['email']);



$sql = "INSERT into contact values ('$name','$des','$phone','$email')";

if (mysqli_query($con, $sql)){
               		echo '<script>alert("Contact added to the System");
  window.location.href = "addcontact.html";
  </script>'; //signup successful  //GO TO HEALTHCARE WORKER HOME PAGE
}else{
   echo '<script>alert("Please Try again after sometime!");
  window.location.href = "addcontact.html";
  </script>';  //signup failed 
 } 


?>