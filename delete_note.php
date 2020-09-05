<?php
session_start();

$conn = mysqli_connect("localhost","root","","notePad");

$text_id = $_GET['text_id'];

$query = "DELETE FROM user_text WHERE text_id=$text_id";

mysqli_query($conn,$query);
header('Location:index.php');
//header('Location:index.php');


?>