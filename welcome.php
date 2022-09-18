<?php
session_start();
/** 
 * 
*/

$conn = mysqli_connect("localhost","root","","iclix");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>WELCOME</title>
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
            margin-left: 160px;
            margin-bottom: 80px;
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
        textarea :is(:focus, :valid){
            border-width:2px;
            padding: 14px;
            border-color: #bfbfbf;
        }
        textarea::-webkit-scrollbar{
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
    </style>
</head>
<body>
<div>

    <div class="wrapper">
        <?php
         $selec = "SELECT * FROM Users";
         $query= mysqli_query($conn,$selec);
         $name = mysqli_fetch_assoc($query);
             
        ?>
        <h2>Welcome <?php echo $name['fname']; ?></h2>
        
        <form action="mail.php" method="POST">
            <input type="hidden" name="action" value="message">
            <input type="hidden" name="email" value="<?php echo $name['email']; ?>">
            <input type="hidden" name="names" value="<?php echo $name['fname']; ?>">
            <input type="hidden" name="email" value="notes Added" >
            <textarea name="notes"placeholder="Type something here..." required></textarea>
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
                    //I must dencryt               
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