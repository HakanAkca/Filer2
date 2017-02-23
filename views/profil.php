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
        <li>Hello <?php echo $username ?>, this is a template</li>
        <li>Contact</li>
        <li><a href="?action=logout">Logout</a></li>
    </ul>
</nav>
</body>
</html>