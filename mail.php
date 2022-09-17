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
/**
 * notes data
 * id
 * notes
 * name
 */
//Sending Everything in the database
$conn = new mysqli($hostName,$authName,$pass,$dbname);
switch ($_POST['action']) {
    case 'message':
        $notes =$_POST['notes'];
        $email = $_POST['email'];
        $names = $_POST['names'];

        $sql="INSERT INTO messages(notes,email,names) VALUES('$notes','$email','$names')";
        $run_qry = mysqli_query($conn,$sql);
        if($run_qry){
            header("location:welcome.php");
        }
        else{
            echo "Error";
        }
        break;
    default:
    break;
}

/**
 * Getting array of emails for users
 */
$sql = "SELECT * FROM messages";
$run_qry = mysqli_query($conn,$sql);
$email_list = array();
if (mysqli_num_rows($run_qry) > 0){
    while($row = mysqli_fetch_assoc($run_qry)){
        $email_list[] = $row;
    }
}
//print_r($email_list);
foreach($email_list as $user_mails){
    echo $user_mails['email'].", ";
}
?>

<?php
/**
 * 
 * 
 */

?>
