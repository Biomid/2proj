<?php

session_start();
if (@$_SESSION['user']){
    header("Location: profile.php");
}

?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>registarion on MAGAZIN</title>
  
  
  
      <link rel="stylesheet" href="css/stil.css">

  
</head>
<BODY>

     <div id="wrapper">
         <div class="register">
             <form action="../registration.php" name="register" method="POST">

             <?php if(isset($smsg)){ ?><div class="alert_d" role="alert"><?php echo $smsg;?></div><?php }?>
             <?php if(isset($fsmsg)){ ?><div class="alert_s" role="alert"><?php echo $fsmsg;?></div><?php }?>

                 <p>Логин: <input type="text" name="login"> <samp style="color:red">*</samp></p>
                 <p>EMail: <input type="email" name="email"><samp style="color:red">*</samp></p>
                 <p>Пароль: <input type="password" name="pass"><samp style="color:red">*</samp></p>
                 <p>Повторите пароль: <input type="password" name="pass_rep"><samp style="color:red">*</samp></p>
             <button type="submit" value="Отправить" name="go">&#xf0da;</button>
             <p>Забыли пароль? <a href="#">Нажмите здесь</a></p>
             </form>
         </div>
    </div>
     </body>
</html>