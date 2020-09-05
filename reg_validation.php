<?php

$conn = mysqli_connect("localhost","root","","notePad");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


$query = "INSERT INTO users (user_id,user_name,user_mail,user_password) VALUES (NULL,'$name','$email','$password')";

if(mysqli_query($conn,$query)){
	header('location:index.php?err=1');
}else{
	header('location:login.php?err=2');
}

?>