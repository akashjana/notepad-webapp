<?php
//print_r($_POST);

session_start();

$conn = mysqli_connect("localhost","root","","notePad");

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE user_mail LIKE '$email' AND user_password LIKE '$password' ";

$result = mysqli_query($conn,$query);



$num = mysqli_num_rows($result);

//echo $num;

if($num == 1){
	$_SESSION['is_logged_in']=1;
	
	$result = mysqli_fetch_assoc($result);

	$_SESSION['user_name'] = $result['user_name'];

	$_SESSION['user_id'] = $result['user_id'];

	header('location:index.php');
}else{
	header('location:login.php?err=3');
}


?>