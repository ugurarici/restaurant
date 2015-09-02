<div class="container">
    <?php
        $userId = $_SESSION['user_session'];
        $userInfo = $usrObj->getOneUser($userId);
        if($userInfo["user_position"] == 1):
        ?>
        <div class="row text-center">
            <p class="pull-left"> Hoşgeldin <b><?=$userInfo["fullname"]; ?>,</b></p>
            <a href="admin.php" class="btn btn-warning">Admin Paneli</a>
            <a href="products.php" class="btn btn-warning">Ürün Yönetimi</a>
            <label class="pull-right"><a href="<?=$sitePath?>logout.php?logOut=true"><i class="glyphicon glyphicon-log-out"></i> Çıkış Yap</a></label>
        </div>

        <?php
         elseif ($userInfo["user_position"] == 2):
        ?>
        <div class="row text-center"><a href="products.php" class="btn btn-warning">Ürün Yönetimi</a></div>
        <label class="pull-right"><a href="<?=$sitePath?>logout.php?logOut=true"><i class="glyphicon glyphicon-log-out"></i> Çıkış Yap</a></label>
        <?php
        else:
        ?>
            <label class="pull-right"><a href="<?=$sitePath?>logout.php?logOut=true"><i class="glyphicon glyphicon-log-out"></i> Çıkış Yap</a></label>
        <?php
        endif;
        ?>


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
