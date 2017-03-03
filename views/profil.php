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
        </li><a href="?action=home">Home</a></li>
        <li>Contact</li>
        <li><a href="?action=logout">Logout</a></li>
    </ul>
</nav>
<?php if (!empty($error)): ?>
    <p>Error : <?php echo $error ?></p>
<?php endif; ?>
<div id="flex2">
<form action="?action=profil" method="post" enctype="multipart/form-data">
    <span>Upload your file !</span><br><br>
    <label for="file"><img src="web/image/file.png"></label><input hidden type="file" name="file" id="file"><br>
    <input type="text" name="add_name" placeholder="Change name file on upload" class="input_place"><br>
    <label for="space"><img src="web/image/file-submit.png"></label><input  hidden type="submit" name="submit" value="Submit" id="space">
</form>
<form method='POST' action="?action=profil" enctype="multipart/form-data">
    <span>Replace your file !</span><br><br>
    <label for="file2"><img src="web/image/file.png"></label><input hidden id="file2" type="file" name="add"><br>
    <input id='place1' type='text' name='replace_img' placeholder="Replace : use new name.extension name" class="input_place"><br>
    <label for="rename"><img src="web/image/file-submit.png"></label><input id="rename" hidden type='submit' name='send_replace' value='Rename'>
</form>
</div>
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
        echo "<span class='click'>" . $b . "</span>";
        echo "<label for='$a'><img src='web/image/clear.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'><br>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    }
    echo "</div>";
?>
</body>
</html>
