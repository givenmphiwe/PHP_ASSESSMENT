<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/Sign-in.css">
</head>

<body>

    <h1>Hello Welcome</h1>

    
    <h>Sign in<h><br>
    <!---->
    <form action="Db_query.php" method="POST">
        <input type="hidden" name="action" value="login">
        <input type placeholder="Email" name="email" required/><br>
        <input type placeholder="Password" name="password" required/><br>
        <input type ="submit" vaule="Log in" name="submit"/><br>
        <a href="Sign-up.php">Create Account</a>
    </form>

    <img src="./assets/Picture.png" width="400px" height="300px"/>
</body>