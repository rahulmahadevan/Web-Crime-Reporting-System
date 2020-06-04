<?php
date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');
session_start();
$email = $_SESSION['email'];
$flag = 0;
$_SESSION['flag'] = 1;
$txt=mysqli_real_escape_string($con,$_POST['txt']);
if($_SESSION['next']==1){
	$_SESSION['crimetype'] = $txt;
	$_SESSION['next'] = 0;
	$flag = 1;
}
if($_SESSION['details']==1){
	$_SESSION['details'] = 0;
	$type = $_SESSION['crimetype'];
	$dt=date('d-m-Y h:i:s');
	mysqli_query($con,"INSERT INTO cases VALUES('$email','$txt','$dt','PENDING','$txt')");
}
$sql="select reply from chatbot_hints where question like '%$txt%'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$html=$row['reply'];
	if($html == "Can you please tell us the type of your problem?"){
		$_SESSION['next']= 1;
	}
}else{
	$html="ok, please reply 'help' if you want me inform police OR reply 'Done' to close this dialog and register your complaint";
}
if($flag == 1){
	$html = "Please tell me more details about it";
	$_SESSION['details'] = 1;
	$flag = 0;
}
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,type) values('$txt','$added_on','user')");
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
echo $html;





?>