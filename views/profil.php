<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home page</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js"></script>
</head>
<body>
<nav>
    <ul>
        <li><a href="?action=home">Home</a></li>
        <li><a><?php echo $_SESSION['user_name'] ?></a></li>
        <li><a href="?action=logout">Logout</a></li>
    </ul>
</nav>
<?php if (!empty($error)): ?>
    <p>Error : <?php echo $error ?></p>
<?php endif; ?>
<div id="flex2">
    <form action="?action=profil" method="post" enctype="multipart/form-data">
        <span>Upload your file !</span><br><br>
        <label for="file"><img alt="" src="assets/image/file.png"></label><input hidden type="file" name="file"
                                                                                 id="file"><br>
        <input type="text" name="add_name" placeholder="Change name file on upload" class="input_place"><br>
        <label for="space"><img alt="" src="assets/image/file-submit.png"></label><input hidden type="submit"
                                                                                         name="submit" value="Submit"
                                                                                         id="space">
    </form>
    <form>
        <span>Rename Your File  !</span><br><br><br><br>
        <input type="button" id="click" value="Replace name"><br><br><br>
        <input type="button" id="hide" value="Cancel">
    </form>
    <form method='POST' action="?action=profil" enctype="multipart/form-data">
        <span>Replace your file !</span><br><br>
        <label for="file2"><img alt="" src="assets/image/file.png"></label><input hidden id="file2" type="file"
                                                                                  name="add"><br><br>
        <input id='input-size2' type='text' name='replace_img' placeholder="Replace : use new name.extension name"><br>
        <label for="rename"><img alt="" src="assets/image/file-submit.png"></label><input id="rename" hidden
                                                                                          type='submit'
                                                                                          name='send_replace'
                                                                                          value='Rename'>
    </form>
    <form action="?action=profil" method="post" enctype="multipart/form-data">
        <span>Create Directory</span><br>
        <input id="input-size3" name="name_dir" type="text">
        <label for="create_dir"><img alt="" class="top" src="assets/image/file-submit.png"></label><input
                id="create_dir" name="create_dir" hidden type='submit' value='Create Directory'><br>
        <span>Delete Directory</span>
        <input id="input-size" name="dir" type="text">
        <label for="delete_dir"><img alt="" class="top" src="assets/image/file-submit.png"></label><input
                id="delete_dir" name="delete_dir" hidden type='submit' value="Delete Dir">
    </form>
    <form action="?action=profil" method="post" enctype="multipart/form-data">
        <span>Change Directory Name</span><br>
        <input id="size-dir" name="last_dir" type="text">
        <input id="size-dir2" name="new_dir" type="text"><br>
        <label for="rename_dir"><img alt="" src="assets/image/file-submit.png"></label><input id="rename_dir"
                                                                                              name="rename_dir" hidden
                                                                                              type='submit'
                                                                                              value="Delete Dir">
    </form>
</div>
<?php
echo "<div class='flex'>";
foreach ($data as $name) {
    $a = $name['url'];
    $b = $name['name'];
    $path_infos = pathinfo($name["name"]);
    if ($path_infos['extension'] == 'png' || $path_infos['extension'] == 'jpg' || $path_parts['extension'] == 'gif' || $path_infos['extension'] == 'jpeg') {
        echo "<div class='size_upload'>";
        echo "<img alt='' class='img_upload' src=" . $a . " alt=" . $name['name'] . ">";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span class='click'>" . $b . "</span>";
        echo "<label for='$a'><img alt='' src='assets/image/trash.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    } else if ($path_infos['extension'] == 'txt') {
        echo "<div class='size_upload'>";
        echo "<img alt='' class='img_upload' src='assets/image/txt2.png' alt=" . $name['name'] . ">";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt  src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "<label for='$a'><img  alt='' src='assets/image/trash.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    } else if ($path_infos['extension'] == 'mp3') {
        echo "<div class='size_upload'>";
        echo "<audio controls src='" . $name['url'] . "' class='img_upload'></audio>";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "<label for='$a'><img  alt='' src='assets/image/trash.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    } else if ($path_infos['extension'] == 'mp4') {
        echo "<div class='size_upload'>";
        echo "<video controls src='$a' class='img_upload'></video>";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "<label for='$a'><img  alt='' src='assets/image/trash.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    } else if ($path_infos['extension'] == 'doc') {
        echo "<div class='size_upload'>";
        echo "<img alt='' class='img_upload' src='assets/image/doc.png' alt=" . $a . ">";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "<label for='$a'><img  alt='' src='assets/image/trash.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    } else if ($path_infos['extension'] == 'pdf') {
        echo "<div class='size_upload'>";
        echo "<img alt='' class='img_upload' src='assets/image/pdf.png' alt=" . $a . ">";
        echo "<div class='icone'>";
        echo "<a href='" . $name['url'] . "'download><img alt src='assets/image/download.png'></a>";
        echo "<span>" . $b . "</span>";
        echo "<label for='$a'><img  alt='' src='assets/image/trash.png'></label>";
        echo "</div>";
        echo "<form method='POST'><input name='file_name' hidden value='$a'><input id='$a' hidden type='submit' name='delete_file' value='Suprimer'></form>";
        echo "<form method='POST'>
                    <input value='$a' hidden name='changeurl'>
                    <input value='$b' hidden name='changename'>
                    <input class='place2' type='text' name='change'>
                    <input type='submit' class='place2bis' name='change_url' value='Rename'>
              </form>";
        echo "</div>";
    }
}
foreach ($file as $folder) {
    echo "<div class='size_upload'>";
    echo "<img alt='' class='img_upload' src='assets/image/icon.png' alt=" . $folder . ">";
    echo "<div class='icone'>";
    echo "<span class='click'>" . $folder . "</span>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
?>
</body>
</html>