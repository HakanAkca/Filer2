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
            <li><?php echo $_SESSION['user_name'] ?></li>
            <li><a href="?action=profil">Profil</a></li>
            <li><a href="?action=logout">Logout</a></li>
        </ul>
    </nav>
    <?php
    echo "<div class='flex'>";
    foreach ($data as $name) {
        $a = $name['url'];
        $b = $name['name'];
        echo "<div class='size_upload'>";
        echo "<img class='img_upload' src=" . $a .
            " alt=" . $name['name'] . ">";
        echo "<div class='icone'>";
        echo "<a id='lol' href='".$name['url']."'download><img src='web/image/download.png'></a>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    ?>
    </body>
</html>
