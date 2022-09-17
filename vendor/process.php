<?php
$comment = $_POST["comment"];
//get the file
$file = "notes.txt";
file_put_contents($file, $comment);
header('location:welcome.php')
?>