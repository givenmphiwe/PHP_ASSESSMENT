<?php
session_start();
/** 
 * 
*/
if (file_exists("notes.txt")){
    $file = "notes.txt";
    $current = file_get_contents($file);
} else {
    $myfile = fopen("log.txt", "w");
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WELCOME</title>
</head>
<body>

    <form action="process.php" method="POST">
        <textarea rows="20" cols="50" name="comment">
            <?php
            echo $current;
            ?>
        </textarea>
    <input type="submit" value="submit">
    </form>
</body>
</html>