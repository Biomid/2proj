<?php


require_once "../cart_conn.php";
$connect = connect_to_car_database();;
$item_id= $_POST['submit'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['type'];
$delete_img =$_POST['put'];

if (($_POST["submit"])) {


    $target_dir = "img/";
    $target_file = $target_dir .microtime(true). basename($_FILES["fileToUpload"]["name"]);
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



        $insert_query = "UPDATE `tbl_product` SET `image` = '$target_file', `name` = '$name', `price` = '$price', `type` = '$type' WHERE `tbl_product`.`id` = '$item_id'";
        mysqli_query($connect,$insert_query);
        unlink($delete_img);

    } else {
        $insert_query = "UPDATE `tbl_product` SET `name` = '$name', `price` = '$price', `type` = '$type' WHERE `tbl_product`.`id` = '$item_id'";
        mysqli_query($connect,$insert_query);
    }


} else echo "Error\n";



header('Location: http://localhost/diploma/asd/admin_panel.php');
