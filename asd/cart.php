<?php
session_start();
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
               header("Location: cart.php");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
<body>

<!-- Start your project here-->
<nav class=" navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">
        <a href="#" class="navbar-brand waves-effect">
            <strong class="red-text">Magazin </strong>
        </a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent"></div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="index.php" class="nav-link waves-effect">Главная</a>
            </li>

            <li class="nav-item active">
                <a href="Cabinet.php" class="nav-link waves-effect">
                    <?php if(isset($_SESSION['user'])){
                        echo $_SESSION['user']['login'];
                    }
                    else echo "Аккаунт"?>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav nav-flex-icons">


            </li>
        </ul>
    </div>
</nav>

<main class="mt-5">
    <div class="container">
        <div class="mask d-flex justify-content-center align-items-center">

            <div class="container py-5 my-5">
                <!--Grid row-->

                <div class="row d-flex align-items-center justify-content-center">
                    <!--Grid column-->
                    <div class="col-md-3 col-xl-10">

                        <p class="h2 mt-5">Корзина</p>
                        <hr>

                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">Item Name</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="15%">Total</th>
                                <th width="5%">Action</th>
                                <th>Image</th>
                            </tr>
                            <?php
                            if(!empty($_SESSION["shopping_cart"]))
                            {
                                $total = 0;
                                foreach($_SESSION["shopping_cart"] as $keys => $values)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $values["item_name"]; ?></td>
                                        <td><?php echo $values["item_quantity"]; ?></td>
                                        <td>$ <?php echo $values["item_price"]; ?></td>
                                        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                                        <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                                        <td><img style="width: 150px; height: 150px;" src="<?php echo  $values["item_image"]?>"></td>
                                    </tr>
                                    <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                }
                                ?>
                                <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                                    <td><a href="remove_all_cart.php"><span class="text-danger">Remove all</span></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <a style="margin-bottom: 35px" href="send_order.php" class="btn btn-danger btn-rounded">Оформить заказ</a>

                    </div>
                </div>

            </div>
        </div>




    </div>
</main>

<footer class="page-footer font-small stylish-color-dark pt-3 fixed-bottom">
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



    <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1">
                <i class="fab fa-instagram"> </i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-tw mx-1">
                <i class="fab fa-vk"> </i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-gplus mx-1">
                <i class="fab fa-youtube"> </i>
            </a>
        </li>
    </ul>
</footer>
</body>
</html>
