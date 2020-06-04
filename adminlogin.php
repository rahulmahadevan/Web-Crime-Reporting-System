<?php
include('database.inc.php');
$u = $_GET['uname'];
$p = $_GET['pwd'];


if($u=='admin' && $p=='admin'){
	header("location:adminhome.html");//Write code to display 
}
else{
	echo '<script>alert("Invalid Login Details, please try again");
  window.location.href = "admin.html";
  </script>';  //Invalid login details
}

mysqli_close($con);
