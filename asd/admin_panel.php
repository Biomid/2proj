<?php
session_start();
if (@$_SESSION['user']['admin'] != 1){
    header("Location: http://localhost/diploma/asd/index.php");
}
require_once "../cart_conn.php";
$connect = connect_to_car_database();
$elements = mysqli_query($connect, "SELECT * FROM `tbl_product`");



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Админ. панель: материалы</title>
    <link rel="stylesheet" href="/admin/css/style.css" />
</head>
<body>
<h1>
    Админ панель
</h1>
<br>

<div class="materials-form__inner">
    <form class="materials-form" method="post" enctype="multipart/form-data">
        <div class="material material_new">
            <h3 class="material__hint">
                Создайте новую карточку тут &#8595;
            </h3>
            <textarea class="material__title" rows="3" name="name" placeholder="Заголовок карточки">
</textarea
>
            <img
                    class="material__image"
                    src=""
                    alt="Загрузите картинку"
            />
            <fieldset>
                <legend>Загрузить картинку</legend>
                <input type="file" class="material__input-image" onchange="previewImage();" name="fileToUpload" id="fileToUpload">
            </fieldset>
            <textarea class="material__url" rows="2" name="price" placeholder="Ссылка куда будет вести карточка">
</textarea
>
            <textarea class="material__url" rows="2" name="type" placeholder="Ссылка куда будет вести карточка"></textarea>
            <button value="Upload Image" name="submit" type="submit" class="materials-form__upload"formenctype="multipart/form-data" formmethod="post" formaction="AddContent.php">
                выгрузить
            </button>
        </div>
    </form>
    <?php

    while ($items = mysqli_fetch_array($elements)){
        ?>
        <form class="materials-form" method="post" action="update.php?id=<?=$items[0]?>" enctype="multipart/form-data">
            <div class="material">
                    <textarea class="material__title" rows="3" name="name">
<?= $items['name']?></textarea
                    >
                <img
                        class="material__image"
                        src="<?= $items['image'] ?>"
                        alt=""
                />
                <fieldset>
                    <legend>Поменять картинку</legend>
                    <input type="file" class="material__input-image" onchange="previewImage();"  name="fileToUpload" id="fileToUpload">
                </fieldset>
                <textarea class="material__url" rows="2" name="price">
<?= $items['price']?></textarea
                >
                <textarea class="material__url" rows="2" name="type"><?=$items['type']?></textarea>
                <div class="material__btns">
                    <button class="material__update-btn" value="<?=$items['id'] ?>" type="submit" name="submit"  >
                        обновить
                    </button>
                    <input type="hidden" value="<?= $items['image'] ?>" name="put">
                    <button value="<?=$items['id'] ?>" class="material__delete-btn" formaction="delete.php?id=<?=$items[0]?>">
                        удалить
                    </button>
                </div>
            </div>
        </form>
        <?php
    }
    ?>
</div>



<script type="text/javascript">
    const previewImage = () => {
        const input = event.target,
            image = input.closest('.material').querySelector('.material__image');
        var fileReader = new FileReader();
        fileReader.readAsDataURL(input.files[0]);

        fileReader.onload = function (e) {
            image.src = e.target.result;
        };
    };
</script>
</body>
</html>
