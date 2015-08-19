<?php
function __autoload($className){
    require_once "classes/".$className.".php";
}

$table = Table::find($_GET['id']);

$menu = array(
    "Yemekler" => array(
        "1" => array(
            "id" => "1",
            "name" => "Kuru",
            "price" => 5.5,
        ),
        "2" => array(
            "id" => "2",
            "name" => "Pilav",
            "price" => 3,
        ),
    ),
    "İçecekler" => array(
        "3" => array(
            "id" => "3",
            "name" => "Su",
            "price" => 0.75,
        ),
        "4" => array(
            "id" => "4",
            "name" => "Kola",
            "price" => 2.3,
        ),
    ),
    "Tatlılar" => array(
        "5" => array(
            "id" => "5",
            "name" => "Künefe",
            "price" => 12.5,
        ),
    ),
);

$orderedItems = array(
    "35" => array(
        "id" => "1",
        "name" => "Kuru",
        "price" => 5.5,
    ),
    "36" => array(
        "id" => "2",
        "name" => "Pilav",
        "price" => 3,
    ),
    "37" => array(
        "id" => "4",
        "name" => "Kola",
        "price" => 2.3,
    ),
);
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Restaurant</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
    <div class="row"><a href="index.php" class="btn btn-warning">&lt; Geri</a></div>
    <div class="col-sm-6">
        <h1>Menü</h1>
        <table class="table">
            <?php
                foreach($menu as $kat => $urunler):
            ?>
                    <tr>
                        <th><?=$kat?><span class="pull-right"><?=count($urunler)?> Ürün</span></th>
                    </tr>
                    <?php
                        foreach($urunler as $id => $urun):
                    ?>
                            <tr>
                                <td>
                                    <?=$urun['name']?>
                                    <span class="pull-right"><?=$urun['price']?> TL
                                    <button class="btn btn-primary">+</button>
                                    </span>
                                </td>
                            </tr>
                    <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-sm-6">
        <h1>Masa <?=$table->name?></h1>
        <table class="table">
            <th>Sipariş Edilenler<span class="pull-right"><?=count($orderedItems)?> Ürün</span></th>
            <?php
            $totalPrice = 0.0;
            foreach($orderedItems as $id => $urun):
                $totalPrice += $urun['price'];
                ?>
                <tr>
                    <td>
                        <?=$urun['name']?>
                        <span class="pull-right"><?=$urun['price']?> TL
                                    <button class="btn btn-danger">-</button>
                                    </span>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>Toplam Tutar <span class="pull-right"><?=$totalPrice?> TL</span></th>
            </tr>
        </table>
        <button class="btn btn-danger col-xs-6">İptal Et</button>
        <button class="btn btn-info col-xs-6">Taşı</button>
        <br>
        <br>
        <button class="btn btn-success btn-block">Hesabı Kapat</button>
    </div>
</div>
</body>
</html>