<?php
session_start();
if(!$_SESSION['iclix'])
{
    header('location:Sign-In.php');
}

//connecting databse
$conn = mysqli_connect("localhost","root","","iclix");

//pop message
$pop = "<script>alert('Welcome to notes writer');</script>";
echo "$pop";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DASHBOARD</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        *{
            padding: 0;
            margin: 0;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }
        body{
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(#4671EA, #AC34E7)
        }
        .wrapper{
            width: 470px;
            background: #fff;
            margin-top: 15px;
            margin-left: 40px;
            margin-bottom: 40px;
            border-radius: 5px;
            padding: 25px 25px 30px;
        }
        .wrapper h2{
            color: #4671EA;
            font-size: 28px;
            text-align: center;
        }
        .wrapper textarea{
            width: 100%;
            height: 59px;
            padding: 15px;
            border-radius: 5px;
            outline: none;
            resize: none;
            font-size: 16px;
            border-color: #bfbfbf;
            margin-top: 20px;
        }
        .textarea :is(:focus, :valid){
            border-width:2px;
            padding: 14px;
            border-color: #bfbfbf;
        }
        .textarea::-webkit-scrollbar{
            width:0px;
        }
        .button{
            border-radius: 5px;
            outline: none;
            resize: none;
            font-size: 16px;
            border-color: #bfbfbf;
            margin-top: 5px;
            width: 120px;
            height:30px;
            color: #fff;
            background: #AC34E7

        }
        .LogoutButton{
            border-radius: 5px;
            outline: none;
            resize: none;
            font-size: 16px;
            border-color: #bfbfbf;
            margin-top: 5px;
            width: 120px;
            height:30px;
            color: #fff;
            background: #AC34E7
        }
        .cointaner{
            max-width: 900px;
            margin: 100px auto;
            width: 100%;
            
            
        }
        table{
            border-collapse: collapse;
            width: 100%
        }
        table th{
            background-color: red;
            color: #fff;
            padding: 10px;
        }
        table td{
            padding: 12px;
            color: #fff;
            font-size: 1em;
            text-align: center;
        }
        table tr:nth-child(odd){
            background: #797676
        }
        .link{
            color: #fff;
        }
    </style>
</head>

<body>

<div>
    <a class="link" href="logout.php">
        <button class="LogoutButton">Logout</button>
        <?php echo $_SESSION['email']; ?>
    </a>
    
    <div class="wrapper">
        
        <h2>Hey <?php echo $_SESSION['username']; ?></h2>
        
        <form action="mail.php" method="POST">
            <input type="hidden" name="action" value="message">
            <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
            <input type="hidden" name="names" value="<?php echo $_SESSION['username']; ?>"/>
            
            <textarea name="notes"placeholder="Type your notes here..." required></textarea>
            <input class="button" type ="submit"  name="submit"/><br>
        </form>

        
    </div>

    <div class="container">
        <table>
            <tr>
                <th>Notes</th>
                <th>Name</th>
                <th>Date</th>
            </tr>
            <?php
                    /**
                    * The Key can be more secured. By saving the key in another database/server
                    * Retrive it from there.
                    *  
                    */
                $key = 'qyehcyUgendjeosjrhw095wjdina%^jdhruendhskdoejc';
                
                function decrypt_this($data, $key){
                    $encryption_key = base64_decode($key);
                    list($encrypted_data,$iv) = array_pad(explode(':',base64_decode($data),2),2,null);
                    return openssl_decrypt($encrypted_data,'AES-256-CBC',$encryption_key,0,$iv);
                }

                $result = $conn->query("SELECT * FROM messages");

                while($row = $result->fetch_assoc()){              
                    $notes = $row['notes'];
                    $names = $row['names'];
                    $reg_date=$row['reg_date'];

                echo"    
                <tr>        
                <td>$notes</td>
                <td>$names</td>
                <td>$reg_date</td>
                </tr>
                ";
                }
     
            ?>
            
        </table> 
    </div>
</div>
    <script>
        const textarea = document.querySelector("textarea");
        textarea.addEventListener("keyup", e =>{
            let scHeight = e.target.scrollHeight;
            textarea.style.height = `${scHeight}px`
        })
    </script>
</body>
</html>