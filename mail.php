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

?>

<?php
$hostName = 'localhost';
$authName = 'root';
$pass = '';
$dbname = 'iclix';
/**
 * 
 * 
 */
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_STRICT | E_ALL);

date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';

//Passing `true` enables PHPMailer exceptions
$mail = new PHPMailer(true);


//alternatively I can create an html file for email body and use file_get
$body = "The team has added a new note check it out";

$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->Port = 25;
$mail->Username = 'yourname@example.com';
$mail->Password = 'yourpassword';
$mail->setFrom('list@Notes.com', 'Team notes');
$mail->addReplyTo('Notes@NoReply.com', 'Do not Reply');

$mail->Subject = 'New Notes Created';


$mail->msgHTML($body);

//Connect to the database and select the recipients from mailing list 
//You'll need to alter this to match your database
$mysql = mysqli_connect($hostName,$authName,$pass);
mysqli_select_db($mysql,$dbname);
$result = mysqli_query($mysql, 'SELECT names, email FROM messages');

foreach ($result as $row){
    try {
        $mail->addAddress($row['email'], $row['names']);
    } catch (Exception $e) {
        echo 'Invalid address skipped: ' . htmlspecialchars($row['email']) . '<br>';
        continue;
    }
    
    try {
        $mail->send();
        echo 'Message sent to :' . htmlspecialchars($row['names']) . ' (' . htmlspecialchars($row['email']) . ')<br>';

    } catch (Exception $e) {
        echo 'Mailer Error (' . htmlspecialchars($row['email']) . ') ' . $mail->ErrorInfo . '<br>';
        //Reset connection to abort sending this message
        //The loop will continue trying to send to the rest of the list
        $mail->getSMTPInstance()->reset();
    }
    //Clear all addresses and attachments
    $mail->clearAddresses();
    $mail->clearAttachments();
}
?>
