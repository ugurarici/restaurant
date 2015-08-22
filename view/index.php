<div class="container">
    <div class="row text-center"><a href="products.php" class="btn btn-warning">Ürün Yönetimi</a></div>
    <hr />
    <?php
    foreach ($tblObj->getAllTables() as $table):
        $btnClass = "btn-default";
        if ($table['status'] == 1) $btnClass = "btn-info";
        ?>
        <a href="table.php?id=<?= $table['id'] ?>"
           class="btn <?= $btnClass ?> btn-lg col-sm-3 col-xs-6"><?= $table['name'] ?></a>
    <?php endforeach; ?>
</div>