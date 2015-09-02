<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
    include "_adminSidebarAndHeader.php";
    ?>
    <div class="col-sm-6">
        <h2>Ürünler</h2>
        <table class="table table-bordered table-striped">
            <?php
            foreach ($categories as $cat):
                $products = $menuObj->getProductsFromCategory($cat["id"]);
                ?>
                <tr>
                    <th><?=$cat["name"]?><span class="pull-right"><?=count($products)?> Ürün</span></th>
                </tr>
                <?php
                foreach ($products as $product):
                    ?>
                    <tr>
                        <td>
                            <?=$product['name'] ?>
                            <span class="pull-right"><?=$product['price'] ?> TL
                                    <a href="?task=productEdit&productId=<?=$product["id"] ?>"
                                       class="btn btn-warning  btn-xs">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                        <a href="<?=$sitePath?>productsTasks.php?task=productDelete&id=<?=$product["id"] ?>"
                           class="btn btn-danger btn-xs confirmation" data-confmes="Ürünü silmeyi onaylıyor musunuz?"><span class="glyphicon glyphicon-trash" ></span></a>
                             </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-sm-6">

        <form action="<?=$sitePath?>productsTasks.php" method="post">
            <input type="hidden" name="task" value="<?= $productTask ?>">
            <?= $productPostIdInput ?>
            <h2>Ürün İşlemleri (Ekle / Güncelle)</h2>

            <div class="form-group">
                <label for="sel1">Kategori :</label>
                <label>
                    <select class="form-control" name="catId">
                        <?php
                           foreach ($categories as $cat):
                        ?>
                        <option
                            value="<?=$cat["id"] ?>" <?php if ($productCatId == $cat["id"]) echo " selected" ?>><?= $cat["name"] ?></option>
                        <?php
                    endforeach;
                    ?>
                    </select>
                </label>
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
