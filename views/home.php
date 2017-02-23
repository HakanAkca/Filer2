<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home page</title>
        <link rel="stylesheet" href="web/style.css">
    </head>
    <body>
    <nav>
        <ul>
            <li>Home</li>
            <li><?php echo $username ?></li>
            <li><a href="?action=profil">Profil</a></li>
            <li><a href="?action=logout">Logout</a></li>
        </ul>
    </nav>
    </body>
</html>
