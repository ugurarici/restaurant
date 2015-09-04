<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
    include "_adminSidebarAndHeader.php";
    ?>
    <div class="col-sm-6">
        <h2>Üye listesi</h2>
        <table class="table table-bordered table-striped">
            <?php
            foreach ($users as $usr):
                ?>
                <tr>
                    <td><?= $usr["username"] ?>
                        <span class="pull-right">
                        <a href="?task=catEdit&catId=<?= $usr["id"] ?>" class="btn btn-warning  btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="<?=$sitePath?>categoriTasks.php?task=catDelete&id=<?= $usr["id"] ?>" class="confirmation btn btn-danger btn-xs" data-confmes="Kategoriyi silmeyi onaylıyor musunuz?"><span
                                class="glyphicon glyphicon-trash"></span></a>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    

</div>
