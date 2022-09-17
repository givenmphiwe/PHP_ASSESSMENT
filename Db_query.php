<?php
$hostName = 'localhost';
$authName = 'root';
$pass = '';
$dbname = 'iclix';

//The key for encrypte 
$key = 'qyehcyUgendjeosjrhw095wjdina%^jdhruendhskdoejc';

//function to encrypt strings
function encrypt_this($data,$key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data,'aes-256-cbc',$encryption_key,0,$iv);
    return base64_encode($encrypted . '::' .$iv);
}

$conn = new mysqli($hostName,$authName,$pass,$dbname);
switch ($_POST['action']) {
    case 'registration':
        $fname =$_POST['fname'];
        $fname = encrypt_this($fname, $key);
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $phone_number = encrypt_this($phone_number, $key);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql="INSERT INTO people(fname,email,phone_number,password) VALUES('$fname','$email','$phone_number','$password')";
        $run_qry = mysqli_query($conn,$sql);
        if($run_qry){
            session_start();
            header("location:welcome.php");
        }
        break;
    //For the signing or log-in
    case 'login' :
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $select_user="SELECT * FROM people WHERE email='$email'";
        $run_qry = mysqli_query($conn,$select_user);

        if (mysqli_num_rows($run_qry) > 0) {
            while($row = mysqli_fetch_assoc($run_qry)) {
                
                if (password_verify($password, $row['password']))
                {
                    $email = $row['email'];
                    session_start();
                    header("location:welcome.php");
                }
                else{
                    header("location:Sign-in.php");
                }
            }
        }
        break;
    
    default:
    break;
}
?>