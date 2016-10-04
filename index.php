<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zasaap</title>
    <link rel="stylesheet" href="css/main_login.css">
</head>

<body>

<html lang="en-US">
<div id="login">
    <div class="container">
        <h1>SISTEMA
            <small>Zasaap</small>
        </h1>
    </div>
    <form action="common/login.php" method="post">
        <span class="fontawesome-user"></span>
        <input type="text"
               placeholder="Username"
               id="correo_usuarios"
               name="mail"
               required>
        <span class="fontawesome-lock"></span>
        <input type="password"
               id="clave_usuarios"
               name="pass" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
