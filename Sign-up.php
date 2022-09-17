<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Sign-up.css">
</head>

<body>

    <h1>Hello Welcome</h1>

    
    <h>Sign in<h><br>
    <!---->
    <form action="Db_query.php" method="POST">
        <input type="hidden" name="action" value="registration">
        <input type="text"placeholder="Full names" name="fname"/><br>
        <input type="email" placeholder="Email" name="email"/><br>
        <input type="number" placeholder="Phone number" name="phone_number"/><br>
        <input type="password" placeholder="Password" name="password" /><br>
        <input type ="submit" vaule="Log in" name="submit"/><br>
    </form>

    

    <img src="./assets/Picture.png" width="400px" height="300px"/>
</body>