
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
                                    <a href="orderTasks.php?task=add&productId=<?=$urun['id']?>&tableId=<?=$table['id']?>" class="btn btn-primary">+</a>
                                    </span>
                                </td>
                            </tr>
                    <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-sm-6">
        <h1>Masa <?=$table['name']?></h1>
        <table class="table">
            <th>Sipariş Edilenler<span class="pull-right"><?=count($orderedItems)?> Ürün</span></th>
            <?php
            $totalPrice = 0.0;
            foreach($orderedItems as $id => $urun):
                $totalPrice += $urun['product_price'];
                ?>
                <tr>
                    <td>
                        <?=$urun['product_name']?>
                        <span class="pull-right"><?=$urun['product_price']?> TL
                                    <a href="orderTasks.php?task=delete&orderProductId=<?=$urun['id']?>&tableId=<?=$table['id']?>" class="btn btn-danger">-</a>
                                    </span>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>Toplam Tutar <span class="pull-right"><?=$totalPrice?> TL</span></th>
            </tr>
        </table>
        <?php if($table["status"]=="1"): ?>
        <?php
            $cancelStyle = "btn btn-danger ";
            if(count($orderedItems)>0){
                $cancelStyle .= "col-xs-6";
            }else{
                $cancelStyle .= "btn-block";
            }
        ?>
        <a class="<?=$cancelStyle?>" href="orderTasks.php?task=cancel&tableId=<?=$table["id"]?>">İptal Et</a>
        <?php if(count($orderedItems)>0): ?>
        <a href="selectNewTable.php?fromTableId=<?=$table['id']?>" class="btn btn-info col-xs-6">Taşı</a>
        <br>
        <br>
        <a href="orderTasks.php?task=finish&tableId=<?=$table['id']?>" class="btn btn-success btn-block">Hesabı Kapat</a>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

