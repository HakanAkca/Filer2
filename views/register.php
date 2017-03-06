<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home page</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <body>
        <?php if (!empty($error)): ?>
        <p>Error : <?php echo $error ?></p>
        <?php endif; ?>
        <form action="?action=register" method="POST" id="signup">
            <div class="sep"></div>
            <div class="inputs">
                <label for="username">Username : </label><input type="text" name="username" id="username"><br>
                <label for="email">Email : </label><input type="text" name="email" id="password"><br>
                <label for="password">Password : </label><input type="password" name="password" id="email"><br>
                <input type="submit" value="REGISTER" id="submit"><br>
            </div>
            </div>
        </form>
    </body>
</html>
