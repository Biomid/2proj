<?php
session_start();
if (!$_SESSION['user']){
    header("Location: index.php");
}
?>

<head>
    <meta charset="utf-8">
    <title>Paper Stack</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<h1><?=$_SESSION['user']['login']?></h1>
<h2><?=$_SESSION['user']['email']?></h2>
<a href="logout.php">Logout</a>
</body>
</html>