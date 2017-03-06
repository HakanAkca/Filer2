<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home page</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<nav>
    <ul>
        <li><a>Home</a></li>
        <li><a<?php echo $_SESSION['user_name'] ?></a></li>
        <li><a href="?action=profil">Profil</a></li>
        <li><a href="?action=logout">Logout</a></li>
        <audio>class='img_upload' src=" . $a . " alt=" . $name['name'] .</audio>
    </ul>
</nav>
<?php
echo "<div class='flex'>";
foreach ($data as $name) {
    $a = $name['url'];
    $b = $name['name'];
    $path_parts = pathinfo($name["name"]);
    if ($path_parts['extension'] == "png" || $path_parts['extension'] == "jpg" ||
        $path_parts['extension'] == "gif" || $path_parts['extension'] == "jpeg"
    ) {
        echo "<div class='size_upload'>";
        echo "<img class='img_upload' src=" . $a . " alt=" . $name['name'] . ">";
        echo "<div class='icone'>";
        echo "<a id='lol' href='" . $name['url'] . "'download><img src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'txt') {
        echo "<div class='size_upload'>";
        echo "<img class='img_upload' src='assets/image/txt.png' alt=" . $name['name'] . ">";
        echo file_get_contents($path_parts);
        echo "<div class='icone'>";
        echo "<a id='lol' href='" . $name['url'] . "'download><img src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'mp3') {
        echo "<div class='size_upload'>";
        echo "<audio controls src='$a' class='img_upload'></audio>";
        echo "<div class='icone'>";
        echo "<a id='lol' href='" . $name['url'] . "'download><img src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'mp4') {
        echo "<div class='size_upload'>";
        echo "<video controls src='$a' class='img_upload'></video>";
        echo "<div class='icone'>";
        echo "<a id='lol' href='" . $name['url'] . "'download><img src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    }
}
echo "</div>";
?>
</body>
</html>