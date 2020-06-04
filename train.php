<?php
$con=mysqli_connect('localhost','root','','convo');
$msg = mysqli_real_escape_string($con,$_POST['msg']);
$botreply = mysqli_real_escape_string($con,$_POST['botmsg']);


$query1 = "SELECT max(id) from 	`chatbot_hints`;";
$result = mysqli_query($con,$query1);

if(mysqli_num_rows($result) >0){
	while($row = mysqli_fetch_assoc($result)){
		$id = $row['max(id)'];
	}
}
$id = $id + 1;

$sql = "INSERT into chatbot_hints values ('$id','$msg','$botreply')";

if (mysqli_query($con, $sql)){
               		echo '<script>alert("Bot train successful");
  window.location.href = "trainbot.html";
  </script>'; //signup successful  //GO TO HEALTHCARE WORKER HOME PAGE
}else{
   echo '<script>alert("Please Try again after sometime!");
  window.location.href = "trainbot.html";
  </script>';  //signup failed 
 } 


?>