<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
    include "_adminSidebarAndHeader.php";
    ?>
    <div class="col-sm-6">
        <h2>Kategoriler</h2>
        <table class="table table-bordered table-striped">
            <?php
            foreach ($categories as $cat):
                $products = $menuObj->getProductsFromCategory($cat["id"]);
                ?>
                <tr>
                    <td><?= $cat["name"] ?>
                        <span class="pull-right">
                     <!-- Bir sonraki güncellemede eklenecek
                        <a href="?task=catEdit&catId=<?= $cat["id"] ?>" class="btn btn-warning  btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                      -->
                        <a href="<?=$sitePath?>categoriTasks.php?task=catDelete&id=<?= $cat["id"] ?>" class="confirmation btn btn-danger btn-xs" data-confmes="Kategoriyi silmeyi onaylıyor musunuz?"><span
                                class="glyphicon glyphicon-trash"></span></a>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-sm-6">
        <form action="<?=$sitePath?>categoriTasks.php" method="post">
            <h2>Yeni Kategori Ekle</h2>

            <div class="input-group">
                <input type="hidden" name="task" value="<?= $catTask ?>">
                <?php echo $catPostIdInput; ?>
                <input type="text" class="form-control" placeholder="Kategori ismini giriniz..." name="catName" <?= $catValue ?> />
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" name="submit">
      </span>
            </div>
        </form>
    </div>

</div>
