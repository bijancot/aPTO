<!DOCTYPE html>
<html lang="en">
<?php
$ds = $_COOKIE['message'];

echo $ds;

unset($_COOKIE['message']);
setcookie('message', null, -1, '/');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form method="POST" action="login.php">
        <input type="text" placeholder="USERNAME" name="username"/><br/><br/>
        <input type="password" placeholder="PASSWORD" name="password"/><br/><br>
        <input type="submit" value="login">
    </form>
</body>
</html>