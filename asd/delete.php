<?php

require_once "../cart_conn.php";
$connect = connect_to_car_database();

$goods_id = $_GET['id'];
$delete_img =$_POST['put'];

$insert_query = "DELETE FROM `tbl_product` WHERE `id` = '$goods_id'";

mysqli_query($connect,$insert_query);
file_put_contents('test.txt', $delete_img . $goods_id);
unlink($delete_img);
header("Location: http://localhost/diploma/asd/admin_panel.php");