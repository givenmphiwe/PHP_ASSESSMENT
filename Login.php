<?php

$hostName = 'localhost';
$authName = 'root';
$pass = '';
$dbname = 'iclix';

$conn = new mysqli($hostName,$authName,$pass,$dbname);

$email = $_POST['email'];
$password = $_POST['password'];


$select_user="SELECT * FROM users WHERE email='$email' || fname='$fname'";
$run_qry = mysqli_query($conn,$select_user);

if (mysqli_num_rows($run_qry) > 0) {
    while($row = mysqli_fetch_assoc($run_qry)) {
        if (password_verify($password, $row['password']))
        {
            $email = $row['email'];
            $username = $row['fname'];

            session_start();
            $_SESSION['iclix'] = 'true';
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
                    
            header("location:welcome.php");
        }
            
    }
}
?>