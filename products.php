<?php
require_once "inc/global.php";

$menuObj = new Menu();
$menu = $menuObj->getFullMenu();
$categories = $menuObj->getAllCategories();

$catValue = "";
$catTask = "catAdd";
$catPostIdInput = "";

$productTask = "productAdd";
$productPostIdInput = "";
$productName = "";
$productPrice = "";
$productCatId = 0;

if (isset($_GET["task"])) {

    if ($_GET["task"] == "catEdit") {
        $getCat = $menuObj->getCategory($_GET["catId"]);
        $catValue = "value='$getCat[name]'";
        $catTask = "catEdit";
        $catPostIdInput = '<input type="hidden" name="catId" value="' . $getCat["id"] . '" />';
    }

    if ($_GET["task"] == "productEdit") {
        $getProduct = $menuObj->getProduct($_GET["productId"]);
        $productTask = "productEdit";
        $productPostIdInput = '<input type="hidden" name="productId" value="' . $getProduct["id"] . '" />';
        $productName = "value='$getProduct[name]'";
        $productPrice = "value='$getProduct[price]'";
        $productCatId = $getProduct["category_id"];
    }
}

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Restaurant</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="assets/js/themes/base/jquery.ui.all.css">
    <script src="assets/js/ui/jquery.ui.core.js"></script>
    <script src="assets/js/ui/jquery.ui.widget.js"></script>
    <script src="assets/js/ui/jquery.ui.datepicker.js"></script>
    <script>
       $(document).ready(function () {
            $(".catDelButton").click(function () {
                var id = $(this).attr("data-id");
                var conf = confirm("Silmek istediğinize emin misiniz?");
                if (conf == true) {
                    window.location = "http://localhost/pr-restaurant/menuTasks.php?task=catDelete&id=" + id;
                }
            });
            $(".productDelButton").click(function () {
               var id = $(this).attr("data-id");
               var conf = confirm("Silmek istediğinize emin misiniz?");
               if (conf == true) {
                   window.location = "http://localhost/pr-restaurant/menuTasks.php?task=productDelete&id=" + id;
               }
           });
        });
    </script>
</head>
<body>
<br>

<div class="container">
    <div class="row text-center"><a href="index.php" class="btn btn-warning">Masalar</a></div>
    <hr/>
    <div class="col-sm-6">
        <h2>Ürünler</h2>
        <table class="table">
            <?php
            foreach ($categories as $cat):
                $products = $menuObj->getProductsFromCategory($cat["id"]);
                ?>
                <tr>
                    <th><?= $cat["name"] ?>
                        <span class="pull-right">
                        <a href="?task=catEdit&catId=<?= $cat["id"] ?>" class="btn btn-warning  btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="" class="catDelButton btn btn-danger btn-xs" data-id="<?= $cat["id"] ?>"><span
                                class="glyphicon glyphicon-trash"></span></a>
                        </span>
                    </th>
                </tr>
                <?php
                foreach ($products as $product):
                    ?>
                    <tr>
                        <td>
                            <?= $product['name'] ?>
                            <span class="pull-right"><?= $product['price'] ?> TL
                                    <a href="?task=productEdit&productId=<?= $product["id"] ?>"
                                       class="btn btn-warning  btn-xs">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                        <a href=""
                           class="btn btn-danger btn-xs productDelButton" data-id="<?=$product["id"]?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-sm-6">
        <form action="menuTasks.php" method="post">
            <h2>Kategori</h2>

            <div class="input-group">
                <input type="hidden" name="task" value="<?= $catTask ?>">
                <?php echo $catPostIdInput; ?>
                <input type="text" class="form-control" placeholder="Kategori ismini giriniz..."
                       name="catName" <?= $catValue ?> />
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" type="button">
      </span>
            </div>
        </form>
        <hr/>
        <form action="menuTasks.php" method="post">
            <input type="hidden" name="task" value="<?= $productTask ?>">
            <?= $productPostIdInput ?>
            <h2>Ürün</h2>

            <div class="form-group">
                <label for="sel1">Kategori :</label>
                <select class="form-control" name="catId">
                    <?php
                    foreach ($categories as $cat):
                        ?>
                        <option
                            value="<?= $cat["id"] ?>" <?php if ($productCatId == $cat["id"]) echo " selected" ?>><?= $cat["name"] ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Ürün Adı</span>
                <input type="text" class="form-control" placeholder="Ürün adınız giriniz..."
                       aria-describedby="basic-addon1" name="productName" <?= $productName ?>>
            </div>
            <br/>

            <div class="input-group">
                <span class="input-group-addon">Fiyat (&#8378;)</span>
                <input type="text" class="form-control" aria-label="" placeholder="00.00"
                       name="productPrice" <?= $productPrice ?>>
            </div>
            <br/>

            <div class="input-group col-xs-12">
                <input type="submit" class="btn btn-primary pull-right"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>