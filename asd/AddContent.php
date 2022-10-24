<?php

//include __DIR__.'/photoConnect.php';
require_once "../cart_conn.php";
$connect = connect_to_car_database();

$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['type'];

if (isset($_POST["submit"])) {

    $target_dir = "img/";
    $target_file = $target_dir . microtime(true) . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    $ext = '';
    switch ($_FILES['fileToUpload']['type']) {
        case 'image/jpeg':
            $ext = 'jpg';
            break;
        case 'image/gif':
            $ext = 'gif';
            break;
        case 'image/png':
            $ext = 'png';
            break;
        case 'image/tiff':
            $ext = 'tif';
            break;
        case 'image/svg+xml':
            $ext = 'svg';
            break;
        default:
            $ext = '';
            break;
    }
    if ($ext) {

        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
        echo "uploaded file " . $target_file;


        $insert_query = "INSERT INTO `tbl_product` ( `image`, `name`, `price`,`type`) VALUES ( \"$target_file\", '$name', '$price','$type')";
        mysqli_query($connect, $insert_query);


    } else echo "Error\n";
}
header('Location: http://localhost/diploma/asd/admin_panel.php');
