<?php
require_once "inc/global.php";

$menuObj = new Menu();
$menu = $menuObj->getFullMenu();
$categories = $menuObj->getAllCategories();

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Restaurant</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<br>

<div class="container">
    <div class="row text-center"><a href="products.php" class="btn btn-warning">Ürün Yönetimi</a></div>
    <hr/>
    <div class="col-sm-6">
        <h1>Menü</h1>
        <table class="table">
            <?php
            foreach ($categories as $cat):
                $products = $menuObj->getProductsFromCategory($cat["id"]);
                ?>
                <tr>
                    <th><?= $cat["name"] ?>
                        <span class="pull-right">
                        <a href="" class="btn btn-warning  btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="menuTasks.php?task=catDelete&id=<?=$cat["id"]?>" class="btn btn-danger  btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
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
                                    <a href="" class="btn btn-warning  btn-xs">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                        <a href="menuTasks.php?task=productDelete&id=<?=$product["id"]?>" class="btn btn-danger  btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
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
                <input type="hidden" name="task" value="catAdd">
                <input type="text" class="form-control" placeholder="Kategori ismini giriniz..." name="catName"/>
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" type="button">
      </span>
            </div>
        </form>
        <hr/>
        <form action="menuTasks.php" method="post">
            <input type="hidden" name="task" value="productAdd">
            <h2>Ürün</h2>
            <div class="form-group">
                <label for="sel1">Kategori :</label>
                <select class="form-control" name="catId">
                    <?php
                    foreach ($categories as $cat):
                    ?>
                    <option value="<?=$cat["id"]?>"><?=$cat["name"]?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Ürün Adı</span>
                <input type="text" class="form-control" placeholder="Ürün adınız giriniz..."
                       aria-describedby="basic-addon1" name="productName">
            </div>
            <br/>

            <div class="input-group">
                <span class="input-group-addon">Fiyat (&#8378;)</span>
                <input type="text" class="form-control" aria-label="" placeholder="00.00" name="productPrice">
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