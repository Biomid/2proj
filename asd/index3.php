<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "cart_test");
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"],
                'item_image'                  =>     $_POST["image"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            header("Location: http://localhost/diploma/asd/index3.php");
        }
    }
    else
    {
        $item_array = array(
            'item_id'               =>     $_GET["id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_quantity'          =>     $_POST["quantity"],
            'item_image'                  =>     $_POST["image"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Magazin</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    html,
    body,
    header,
    .carousel{
      height: 60vh;
    }
    @media (max-width: 740px){
     html,
    body,
    header,
    .carousel{
      height: 100vh;
    }
    @media (min-width: 800px) and (max-width: 850px;){
     html,
    body,
    header,
    .carousel{
      height: 100vh;
    }
  }
}
  </style>
</head>
<!--Библиотека jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--Готовый скрипт корзины-->


<!--Стили элементов для корзины-->
<link href="https://lk.easynetshop.ru/frontend/v5/ens-2bdf783b.css" rel="stylesheet">
<body>

  <!-- Start your project here-->
  <nav class=" navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
     <div class="container">
       <a href="#" class="navbar-brand waves-effect">
         <strong class="red-text">Magazin</strong>
       </a>
       <button class="navbar-toggler" type="button"
       data-toggle="collapse" data-target="#navbarContent"
       aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarContent"></div>
       <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
           <a href="index.html" class="nav-link waves-effect">Главная</a>
         </li>

         <li class="nav-item">
           <a href="Cabinet.php" class="nav-link waves-effect">
               <?php if(isset($_SESSION['user'])){
                   echo $_SESSION['user']['login'];
               }
               else echo "Аккаунт"?>
           </a>
         </li>
           <?php
           if (isset($_SESSION['user']) && $_SESSION['user']['admin'] == 1){
               echo <<<END
<li class="nav-item active">
           <a href="admin_panel.php" class="nav-link waves-effect">Админка</a>
         </li>
END;

           }

           ?>
           <li class="nav-item active">
               <a href="cart.php" class="nav-link waves-effect">Корзина</a>
           </li>
       </ul>

       <ul class="navbar-nav nav-flex-icons">

         
       </ul>
     </div>
  </nav>


  <div id="carousel-ex" class="carousel slide carousel-fade pt-5 pb-2 mb-4" data-ride="carousel">
<ol class="carousel-indicators">
<li class="active" data-target="#carousel-ex" data-slide-to="0"></li>
<li data-target="#carousel-ex" data-slide-to="1"></li>
<li data-target="#carousel-ex" data-slide-to="2"></li>
</ol>

<div class="carousel-inner" role="listbox">

<div class="carousel-item active">
  

<div class="view" style="background-image: url('https://cq-esports.com/storage/uploads/posts/66639/wallpapersdota2.com-463.jpg');
background-repeat: no-repeat; background-size: cover;">

<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

<div class="text-center white-text mx-5 wow fadeIn">

<h1 class="mb-4">
          <strong>Закупайся только у нас</strong>
        </h1>




</div>
</div>
</div>
</div>

<div class="carousel-item">

<div class="view" style="background-image: url('https://cq-esports.com/storage/uploads/images/83743/image33.jpg');
background-repeat: no-repeat; background-size: cover;">
  <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
    <div class="text-center white-text mx-5 wow fadeIn">
        <h1 class="mb-4">
          <strong>Дешёвые цены на вещи</strong>
        </h1>
  </div>
</div>
</div>
</div>

<div class="carousel-item">

<div class="view" style="background-image: url('https://dota2.net/images/cdn/an/anBnNm1SRnU1ODZKQjc=_big.jpg');
background-repeat: no-repeat; background-size: cover;">

<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

<div class="text-center white-text mx-5 wow fadeIn">

<h1 class="mb-4">
<strong>Быстрые трейды</strong>
</h1>

</div>
</div>
</div>
</div>
</div>

<a href="#carousel-ex" class="carousel-control-prev" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
</a>
<a href="#carousel-ex" class="carousel-control-next" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
</a>
</div>
  <main>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        <span class="navbar-brand">Категории</span>

         <button class="navbar-toggler" type="button"
       data-toggle="collapse" data-target="#nextNav"
       aria-controls="nextNav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
       </button>
          <div class="collapse navbar-collapse" id="nextNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a href="index.php" class="nav-link">Common</a>
              </li>
              <li class="nav-item">
                <a href="index2.php" class="nav-link">Rare</a>
              </li>
              <li class="nav-item active">
                <a href="index3.php" class="nav-link">Mythical</a>
              </li>
              <li class="nav-item">
                <a href="index4.php" class="nav-link">Immortal</a>
              </li>
              <li class="nav-item">
                <a href="index5.php" class="nav-link">Arcana</a>
              </li>
            </ul>

          </div>
      </nav>
      <section class="text-center mb-4">
        <div class="row wow fadeIn">

            <?php
            require_once "../cart_conn.php";
            $connect = connect_to_car_database();
            $query = "SELECT * FROM `tbl_product` WHERE `type` = 'mythical'";
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    ?>

                    <div class="col-lg-3 col md-6 mb-4">
                        <form method="post" action="index3.php?action=add&id=<?php echo $row["id"]; ?>">
                            <div class="card">

                                <div class="view overlay">
                                    <img class="card-img-top" src="<?=$row['image']?>" alt="Мясная">
                                    <a href="">
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <div class="card-body text-center">

                                    <a href="" class="grey-text">
                                        <h5><?=$row['type']?></h5>
                                    </a>
                                    <h5>
                                        <strong>
                                            <a href="" class="dark-grey-text">
                                                <?=$row['name']?><!--<span class="badge-pill danger-color">Новинка</span> -->
                                            </a>
                                        </strong>
                                    </h5>
                                    <h4 class="font-weight-bold green-text">
                                        <strong><?=$row['price']?></strong>
                                    </h4>
                                    <input type="text" name="quantity" class="form-control" value="1" />
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                    <input type="hidden" name="image" value="<?php echo $row['image']?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-dark-green btn-ens-action btn-ens-style" value="Add to Cart" data-rel="2bdf783b252367">В корзину</button>

                                </div>

                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>

          </div>



        </div>
      </section>
                                                                          <!--<nav class="d-flex justify-content-center wow fadeIn">
                                                                          <ul class="padination pg-blue">
                                                                            <li class="page-item disabled">
                                                                              <a href="" class="page-link" aria-label="Previous">
                                                                                <span aria-hidden="true">&laquo;</span>
                                                                              </a>
                                                                            </li>
                                                                          </ul>
                                                                        </nav>-->
    </div>
  </main>

 <footer class="page-footer font-small stylish-color-dark pt-3">
     <?php
     if (isset($_SESSION['user'])){
         echo <<<_END
<h1>Вы успешно авторизированы</h1>
_END;


     }
     else{
         echo <<<_END
  <ul class="list-unstyled list-inline text-center py-2">
    <li class="list-inline-item">
      <a href="reg.php" class="btn btn-danger btn-rounded">Зарегистрироватся</a>
    </li>
    <li class="list-inline-item">
      <a href="../autoriz.php" class="btn btn-danger btn-rounded">Войти</a>
    </li>
  </ul>
  _END;
     }
     ?>



 <h5></h5>
</footer>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>

<!--
<h1 class="mb-4">
                <strong>Пицца</strong>
              </h1>
              <p>
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, expedita.</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, sunt nam natus laudantium, recusandae consequuntur!</strong>
              </p>
              <a href="#" class="btn btn-outline-white btn-lg">
                Lorem ipsum dolor. <i class="fa fa-gradiation-cap ml-2"></i>
              </a>
