<?php
/**
 * Registering the user in the db
 * Function encryt_this to encrypte user input
 * after encrypting we send encryted data to db
 */
$key = 'qyehcyUgendjeosjrhw095wjdina%^jdhruendhskdoejc';

function encrypt_this($data,$key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data,'aes-256-cbc',$encryption_key,0,$iv);
    return base64_encode($encrypted . '::' .$iv);
}


$fname =$_POST['fname'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$phone_number = encrypt_this($phone_number, $key);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


//Database connection

$conn = new mysqli('localhost', 'root', '','iclix');
if($conn ->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
}
else{
    $stmt =$conn->prepare("insert into  users(fname,email,password,phone_number)
    values(?,?,?,?)");

    $stmt->bind_param("ssss",$fname,$email, $password, $phone_number);
    $stmt->execute();
    $stmt->close();
    //$conn->close();
    
}
session_start();
header('location:welcome.php');
?>