<?php
session_start();
$conn = mysqli_connect("localhost","root","","notePad");

echo $_POST['text'];

$text = $_POST['text'];

$text_id = $_POST['text_id'];
//echo $text;
$user_id = $_SESSION['user_id'];
echo $user_id;
//$r_id = $_POST['r_id'];
//$order_id = $_POST['order_id'];

$query = "UPDATE user_text SET text_note = '$text',time=NOW() WHERE text_id=$text_id";

mysqli_query($conn,$query);
header('Location:index.php');

?>