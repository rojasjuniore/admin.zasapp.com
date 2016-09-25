<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/main_login.css">
</head>

<body background="img/pic02.jpg">

<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

</head>

<div id="login">
    <div class="text-center">
        <h1>SISTEMA
            <small>Zasaap</small>
        </h1>
    </div>
    <form action="common/login.php" method="post">
        <span class="fontawesome-user"></span>
        <input type="text" placeholder="Username" id="correo_usuarios"
               name="mail">

        <span class="fontawesome-lock"></span>
        <input type="password" id="clave_usuarios" name="pass" placeholder="Password">

        <input type="submit" value="Login">
    </form>


</body>
</html>
