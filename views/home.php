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
        <li><a href="?action=profil">Profil</a></li>
        <li><a href="?action=logout">Logout</a></li>
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
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'txt') {
        echo "<div class='size_upload'>";
        echo "<img class='img_upload' src='assets/image/txt.png' alt=" . $name['name'] . ">";
        echo file_get_contents($path_parts);
        echo "<div class='icone'>";
        echo "<a id='lol' href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'mp3') {
        echo "<div class='size_upload'>";
        echo "<audio controls src='$a' class='img_upload'></audio>";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'mp4') {
        echo "<div class='size_upload'>";
        echo "<video controls src='$a' class='img_upload'></video>";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'doc') {
        echo "<div class='size_upload'>";
        echo "<img class='img_upload' src='assets/image/doc.png' alt=" . $name['name'] . ">";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    } else if ($path_parts['extension'] == 'pdf') {
        echo "<div class='size_upload'>";
        echo "<img class='img_upload' src='assets/image/doc.png' alt=" . $name['name'] . ">";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "</div>";
        echo "</div>";
    }
}
echo "</div>";
?>
</body>
</html>