<?php

// şen olasın Halep şehri

// masalar - class Table
// sipariş - class Order
// menü - class Menu
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
        <?php
        for($i=1; $i<=20; $i++):
            $btnClass = "btn-default";
            if($i%3==0) $btnClass = "btn-info";
        ?>
        <a href="table.php?id=<?=$i?>" class="btn <?=$btnClass?> btn-lg col-sm-3 col-xs-6"><?=$i?></a>
        <?php endfor; ?>
    </div>
</body>
</html>





