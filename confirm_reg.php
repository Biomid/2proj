 <?php
 session_start();
 require_once 'test.php';
 $connect = connect_to_database();

 if ($_GET['hash']) {
     $hash = $_GET['hash'];

     if ($result = mysqli_query($connect, "SELECT `id`, `email_confirmed` FROM `users` WHERE `hash`='" . $hash . "'")) {
         while( $row = mysqli_fetch_assoc($result) ) {
             echo $row['id'] . " " . $row['email_confirmed'];

             if ($row['email_confirmed'] == 1) {

                 mysqli_query($connect, "UPDATE `users` SET `email_confirmed`=0 WHERE `id`=". $row['id'] );
                 echo "Email подтверждён";
             } else {
                 echo "Что то пошло не так";
             }
         }
     } else {
         echo "Что то пошло не так";
     }
     header("Location: autoriz.php");
 } else {
     echo "Что то пошло не так";
 }