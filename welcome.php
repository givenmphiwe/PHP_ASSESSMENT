<?php
session_start();
/** 
 * 
*/

$conn = mysqli_connect("localhost","root","","iclix");

$query="select * from messages";
$connect=mysqli_query($conn,$query);
//$data=mysqli_fetch_assoc($connect);
$num=mysqli_num_rows($connect); //check in the database if its empty or not
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
    <div class="wrapper">
        <?php
        $conn = mysqli_connect("localhost","root","","iclix");
         $selec = "SELECT * FROM people";
         $query= mysqli_query($conn,$selec);
         $name = mysqli_fetch_assoc($query)       
        ?>
        <h2>Welcome <?php echo $name['fname']; ?></h2>

        <form>
            <textarea placeholder="Type something here..."></textarea>
            <button>Save</button>
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
            if ($num>0){
                while($data=mysqli_fetch_assoc($connect)){
                echo"    
                <tr>        
                <td>".$data['notes']."</td>
                <td>".$data['email']."</td>
                <td>".$data['reg_date']."</td>
                </tr>
                ";
                }
            } 
            ?>
            
        </table> 
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