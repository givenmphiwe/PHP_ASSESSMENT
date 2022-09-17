<?php
$username = "";
$password = "";
$host = "localhost";
$dbname = "users";

$key = 'qyehcyUgendjeosjrhw095wjdina%^jdhruendhskdoejc';

function encryptthhis($data,$key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data,'aes-256-cbc',$encryption_key,0,$iv);
    return base64_encode($encrypted . '::' .$iv);
}

function decryptthis($data, $key){
    $encryption_key = base64_decode($key);
    list($encrypted_data,$iv) = array_pad(explode('::',base64_decode($data),2),2,null);
    return openssl_decrypt($encrypted_data,'aes-256-cbc',$encryption_key,0,$iv);
}

if(isset($_POST['foo'])){
    $var=$_POST['foo'];
    $enc=encryptthhis($var,$key);
    echo '<h2>Encrypted String<h2>';
    echo '<p> '.$enc'</p>';
    $dec=decryptthis($enc,$key);
    echo '<h2>Decyted String</h2>';
    echo '<p>'.$dec'</p>';
}
>?