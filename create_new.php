<?php
session_start();

$conn = mysqli_connect("localhost","root","","notePad");

echo $_POST['text'];

$text = $_POST['text'];
//echo $text;
$user_id = $_SESSION['user_id'];

echo $user_id;
//$r_id = $_POST['r_id'];
//$order_id = $_POST['order_id'];

$query = "INSERT INTO user_text (text_id,user_id,text_note,time) VALUES (NULL,$user_id,'$text',NOW())";

mysqli_query($conn,$query);
header('Location:index.php');

?>