<?php
date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Crime Records</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <link href="shift.php">
   </head>
   <body style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(image1.jpg);
	height: 100vh;
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center center;">

	<header>
		<div class="logout">
    	<ul>
    		<li><a href="adminhome.html" style="color: white;">HOME</a></li>
        <li><a href="contactsforadmin.php" style="color: white;">CONTACT</a></li>
    		<li><a href="first.html" style="color: white;">LOGOUT</a></li>
    	</ul>
    	</div>
	</header>

  <style type="text/css">
    h1 {
      margin-top: 10px;
      color: white;
    }
    ul{
  float: right;
  list-style-type: none;
  margin-top:25px;
}
ul li{
  display: inline-block;
}
ul li a{
  text-decoration: none;
  padding: 5px 15px;
  border: 1px solid transparent;
  color: white;
  transition: 0.6s ease;
  margin-right: 30px;
}
ul li a:hover{
  background-color: #e3e4e5;
  color:black;
}
  </style>

<h1>All Crime Records</h1>
<div class="centres">
<?php 
   $sql = "SELECT * FROM `cases`;";
   $result = mysqli_query($con,$sql);
   $flag = 1;
   if(mysqli_num_rows($result) >0){
    while($row = mysqli_fetch_assoc($result)){
      if($flag==1){
        echo "<table><tr><th>Date & Time</th><th>Type</th><th>Details</th><th>email</th><th>Status</th></tr>";
        $flag = 0;
      }
      echo "<tr>";
      echo "<td>";
      echo $row['dateandtime'];
      echo "</td>";
      echo "<td>";
      echo $row['crime'];
      echo "</td>";
      echo "<td>";
      echo $row['details'];
      echo "</td>";
      echo "<td>";
      echo $row['email'];
      echo "</td>";
      echo "<td>";
      echo $row['status'];
      echo "</td>";
      echo "</tr>";
    }
      
    echo "</table>";
   }else{
    echo "<h3 id='nomore'>There are no cases</h3>";
   }
   echo "<style>
  table {
      border-collapse: collapse;
      width : 900px;
      margin-top: 50px;
      margin-left: 50px;
  }
  th {
    background: #ccc;
  }

  th, td {
      border: 1px solid #ccc;
      padding: 8px;
  }

  tr:nth-child(even) {
      background: #efefef;
  }
  tr:nth-child(odd) {
      background: #efefef;
  }

  tr:hover {
      background: #d1d1d1;
  }
  </style>";
   ?>
 </div>

  </body>

  </html>
