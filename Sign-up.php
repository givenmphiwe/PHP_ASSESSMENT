<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/Sign-in.css">
    <title>Create Account</title>
</head>

<body>
<div>
    <h1>Create Account</h1>

    <div class="fields">
        <form action="Registration.php" method="POST">
            <input type="hidden" name="action" value="registration">
            <input type="text"placeholder="Full name" name="fname" required/><br>
            <input type="email" placeholder="Email" name="email" required/><br>
            <input type="number" placeholder="Phone number" name="phone_number" required/><br>
            <input type="password" placeholder="Password" name="password" required/><br>
            <input class="button" type ="submit" vaule="Log in" name="submit"/><br>
        </form>
    </div>

    <div class="image"> 
        <img src="./assets/Picture.png" width="400px" height="300px"/>
    </div>
</div>
</body>