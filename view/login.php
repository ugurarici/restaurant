<div class="col-sm-6 centered">
    <h1>Personel Girişi</h1>
    <form action="<?=$sitePath?>userTasks.php?task=login" method="POST">
        <?php
        if(isset ($_GET['error']) == "login")
        {
            ?>
            <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo "Ama öyle giriş yapmayacaktınız! Lütfen tekrar deneyiniz!"; ?>
            </div>
        <?php
        }
        ?>

        <table class="table table-bordered table-striped">
            <thead>
            <tr class="bg-success">
                <th colspan="2">Personel Yetki Girişi Alanı</th>
            </tr>
            </thead>
            <tbody class="searchOrder">
            <tr>
                <td>
                    Kullanıcı Adı / e-mail:
                </td>
                <td class="text-center">
                    <label>
                        <input type="text" name="username" class="form-control" required/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Şifre:
                </td>
                <td class="text-center ">
                    <label>
                        <input type="password" name="password" class="form-control" required/>
                    </label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center">
                    <label>
                        <input class="btn btn-warning" type="submit" name="submit" value="Yetkili Girişi Yap"/>
                    </label>
                </td>
            </tr>

            </tbody>
        </table>
    </form>
</div>