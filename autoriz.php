<?php
session_start();
if (@$_SESSION['user']){
    header("Location: profile.php");

}


require_once './connect.php';

$conn = connect_to_database();
?>

<head>
    <meta charset="utf-8">
    <title>Paper Stack</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="container">
    <section id="content">
        <form action="singin.php" method="post">
            <h1>Login Form</h1>
            <div>
                <input type="text" name="login" placeholder="Username" required="" id="username" />
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required="" id="password" />
            </div>
            <div>
                <input type="submit" value="Log in" />
                <a href="#">Lost your password?</a>
                <a href="http://localhost/diploma/index.php">Register</a>
            </div>
        </form><!-- form -->

    </section><!-- content -->
</div><!-- container -->
</body>
</html>
