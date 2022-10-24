<?php
session_start();
$to = $_SESSION['user']['email']; // обратите внимание на запятую

// тема письма
$subject = 'Birthday Reminders for August';

// текст письма
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<div class="row d-flex align-items-center justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-3 col-xl-10">

                        <p class="h2 mt-5">Корзина</p>
                        <hr>

                        <table class="table table-bordered">
                            <tbody><tr>
                                <th width="40%">Item Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="15%">Total</th>
                                <th width="5%">Action</th>
                                <th>Image</th>
                            </tr>
                                                                <tr>
                                        <td>12</td>
                                        <td>1</td>
                                        <td>$ 12.00</td>
                                        <td>$ 12.00</td>
                                        <td><a href="cart.php?action=delete&amp;id=12"><span class="text-danger">Remove</span></a></td>
                                        <td><img style="width: 150px; height: 150px;" src="img/1655594503.8681eAeVNZfR4cU.png"></td>
                                    </tr>
                                                                        <tr>
                                        <td>10</td>
                                        <td>1</td>
                                        <td>$ 10.00</td>
                                        <td>$ 10.00</td>
                                        <td><a href="cart.php?action=delete&amp;id=14"><span class="text-danger">Remove</span></a></td>
                                        <td><img style="width: 150px; height: 150px;" src="img/1655594718.8834Без названия.jpeg"></td>
                                    </tr>
                                                                        <tr>
                                        <td>й</td>
                                        <td>1</td>
                                        <td>$ 111.00</td>
                                        <td>$ 111.00</td>
                                        <td><a href="cart.php?action=delete&amp;id=15"><span class="text-danger">Remove</span></a></td>
                                        <td><img style="width: 150px; height: 150px;" src="img/1655635622.7926Xdbh3jt-VT8.jpg"></td>
                                    </tr>
                                                                        <tr>
                                        <td>w</td>
                                        <td>1</td>
                                        <td>$ 432.00</td>
                                        <td>$ 432.00</td>
                                        <td><a href="cart.php?action=delete&amp;id=16"><span class="text-danger">Remove</span></a></td>
                                        <td><img style="width: 150px; height: 150px;" src="img/1655635650.9965zdanie_neboskreb_vid_snizu_osveshchenie_119445_2560x1080.jpg"></td>
                                    </tr>
                                                                    <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">$ 565.00</td>
                                    <td></td>
                                </tr>
                                                        </tbody></table>
                        <a style="margin-bottom: 35px" href="send_order.php" class="btn btn-danger btn-rounded">Оформить заказ</a>

                    </div>
                </div>
</body>
</html>
';
//$img = "http://localhost/diploma/asd/img/1655594503.8681eAeVNZfR4cU.png";
//$mailBody = "<img src='$img'/><br>";
//$mailBody .= "<a href='$img'>Can't see the image? Click Here.</a>";

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Дополнительные заголовки
$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
$headers .= 'From: Birthday Reminder <birthday@example.com>';

// Отправляем
if (mail($to,$subject,$message,$headers)){
    echo "Ok";
}
else{
    echo "Error";
}
?>
