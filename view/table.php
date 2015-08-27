
<div class="container">
    <div class="row"><a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-arrow-left"></i>  Geri</a></div>
    <div class="col-sm-6">
        <h1>Menü</h1>

        <div class="input-group"> <span class="input-group-addon bgFix"><i class="glyphicon glyphicon-search"></i> Filtere: </span>

            <input id="filter" type="text" class="form-control" placeholder="Ürün veya kategori filtrele...">
        </div>
        <table class="table table-bordered table-striped">
            <?php
                foreach($menu as $kat => $urunler):
            ?>
                    <thead class="searchOrder">
                        <tr class="bg-success">
                            <th><?=$kat?></th>
                            <th style="width:17%;">Birim Fiyat </th>
                            <th style="width:26%;"> Toplam Ürün : <span class="badge"><?=count($urunler)?></span></th>
                        </tr>
                    </thead>
                    <?php
                        foreach($urunler as $id => $urun):
                    ?>
                   <tbody class="searchOrder">
                            <tr>
                                <td>
                                    <?=$urun['name']?>
                                </td>
                                <td class="text-center"><?=$urun['price']?> TL</td>
                                <td class="text-center">
                                    <a href="<?=$sitePath; ?>orderTasks.php?task=add&productId=<?=$urun['id']?>&tableId=<?=$table['id']?>" class="btn btn-primary">+</a>
                                </td>
                            </tr>
                     </tbody>
                    <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-sm-6">
        <h1>Masa <?=$table['name']?></h1>

        <table class="table table-bordered table-striped">
            <thead>
            <tr class="success">
                <th>Siparişler</th>
                <th style="width:19%;">Birim Fiyatı</th>
                <th class="text-center">Adet</th>
                <th class="text-center"><i class="glyphicon glyphicon-erase"></i></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $totalPrice = 0.0;
            foreach($orderedItems as $id => $urun):
            //  $totalPrice += $urun['product_price'];
            $totalPrice += ( $urun['total'] * $urun['product_price'] );
            ?>
            <tr>
                <td><?=$urun['product_name']?></td>
                <td class="text-center"><?=$urun['product_price']?> TL</td>
                <td class="text-center">(x<?=$urun['total']?>)</td>
                <td class="text-center"><a href="<?=$sitePath; ?>orderTasks.php?task=delete&orderProductId=<?=$urun['id']?>&tableId=<?=$table['id']?>" class="btn btn-danger">-</a></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th>Toplam Tutar </th>
                <td colspan="3"><span class="pull-right"><?=$totalPrice?> TL</span></td>
            </tr>


            </tbody>


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
        <a class="confirmation <?=$cancelStyle?>" data-confmes="Siparişi iptal etmeyi onaylıyor musunuz?" href="<?=$sitePath; ?>orderTasks.php?task=cancel&tableId=<?=$table["id"]?>"><i class="glyphicon glyphicon-remove"></i> İptal Et</a>
        <?php if(count($orderedItems)>0): ?>
        <a href="<?=$sitePath; ?>selectNewTable.php?fromTableId=<?=$table['id']?>" class="btn btn-info col-xs-6"><i class="glyphicon glyphicon-move"> </i> Taşı</a>
        <br>
        <br>
        <a href="<?=$sitePath; ?>orderTasks.php?task=finish&tableId=<?=$table['id']?>" data-confmes="Tüm ödemeyi aldığınızı ve hesabı kapattığınızı onaylıyor musunuz?" class="confirmation btn btn-success btn-block"><i class="glyphicon glyphicon-saved"></i> Hesabı Kapat</a>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
