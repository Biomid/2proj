<!DOCTYPE html>
<html>
     <head>
         <link rel="stylesheet" href="style.css">
<title>авторизация</title>
<meta charset="utf-8">
     </head>
     <body>
     <?php
     require('connect.php');

     if (isset($_POST['username']) && isset($_POST['password'])){
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];

         $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$email', '$password')";
         $result = mysqli_query($connection, $query);

         if($result){
             $smsg = "Регистрация прошла успешно!";
         } 
         else {
             $smsg = "Ошибка";
         }
     }
     ?>
         <div class="register">
             <form name="register" method="POST">

             <?php if(isset($smsg)){ ?><div class="alert_d" role="alert"><?php echo $smsg;?></div><?php }?>
             <?php if(isset($fsmsg)){ ?><div class="alert_s" role="alert"><?php echo $fsmsg;?></div><?php }?>

             <input name="email" type="email" value="" placeholder="Введите почту" required>
             <input name="username" type="username" value="" placeholder="Введите имя" required>
             <input name="password" type="password" value="" placeholder="Введите пароль" required>
             <button type="submit" value="Отправить">Отправить</button>
             </form>
         </div>
     </body>
</html>