<?php
$comment = $_POST["comment"];
//get the file
$file = "notes.txt";
file_put_content($file, $comment);
header('location:welcome.php')
?>