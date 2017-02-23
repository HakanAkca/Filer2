<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="web/style.css">
</head>
<body>
<?php if (!empty($error)): ?>
    <p>Error : <?php echo $error ?></p>
<?php endif; ?>
<form action="?action=login" method="POST" id="signup">
    <div class="container">
        <div class="header">
            <h3>Sign Up</h3>
            <p>You want to fill out this form</p>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <input type="text" name="username" placeholder="username" autofocus="">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="CONNEXION">
        </div>
    </div>
</form>
<form action="?action=register" method="post" id="placement">
    <input type="submit" value="REGISTER">
</form>
</body>
</html>
