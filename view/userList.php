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
                    <td><b><?= $usr["username"] ?></b> (<?= $usr["fullname"] ?>)
                        <span class="pull-right">
                        <a href="?task=userEdit&userId=<?= $usr["id"] ?>" class="btn btn-warning  btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="<?=$sitePath?>userTasks.php?task=userDelete&id=<?= $usr["id"] ?>" class="confirmation btn btn-danger btn-xs" data-confmes="Kategoriyi silmeyi onaylıyor musunuz?"><span
                                class="glyphicon glyphicon-trash"></span></a>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php
    if(isset($_GET['task']) == "userEdit"){
        include "editUser.php";
      }else {
        include "register.php";
    }
    ?>

</div>
