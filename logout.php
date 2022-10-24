<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['shopping_cart']);
header("Location: http://localhost/diploma/asd/index.php");

