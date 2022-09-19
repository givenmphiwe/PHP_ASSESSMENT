
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/Sign-in.css">
    <title>Log in</title>
</head>

<body>
<div>
    <h1>Welcome</h1>

    <!---->
    <div class="fields">
        <h>Log in<h><br>
        <form action="Login.php" method="POST">
            <input type="hidden" name="action" value="login">
            <input type="email" placeholder="Email" name="email" required/><br>
            <input type="password" placeholder="Password" name="password" required/><br>
            <input class="button" type ="submit" vaule="Log in" name="submit"/><br>
            <a href="Sign-up.php">Create Account</a>
        </form>
    </div>
    <div class="image"> 
        <img src="./assets/Picture.png" width="400px" height="300px"/>
    </div>
</div>
</body>