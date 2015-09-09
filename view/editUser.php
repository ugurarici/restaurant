<div class="col-sm-6">
    <h1>Personel Kaydı Güncelle</h1>
    <?php
      if ($_GET['userId'] == 1){
          echo "Bu kullanıcı bilgileri değiştirilemez!";
      }else{
          $usrEdt = $usrObj->getOneUser($_GET['userId']);
    ?>
   <!-- Not: Şifre değiştirme işlemi ayrı yapılacaktır. -->
    <form action="<?=$sitePath?>userTasks.php?task=userEdit&userId=<?= $usrEdt["id"] ?>" method="POST">
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="bg-success">
                <th colspan="2">Personel düzenle</th>
            </tr>
            </thead>
            <tbody class="searchOrder">
            <tr>
                <td>
                    Kullanıcı Adı:
                </td>
                <td class="text-center">
                    <label>
                        <input type="text" name="username" class="form-control" value="<?=$usrEdt["username"]; ?>" required/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td class="text-center">
                    <label>
                        <input type="text" name="email" class="form-control" value="<?=$usrEdt["email"]; ?>" required/>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Personel Adı ve Soyadı:
                </td>
                <td class="text-center">
                    <label>
                        <input type="text" name="name" class="form-control" value="<?=$usrEdt["fullname"]; ?>" required>
                    </label>
                </td>
            </tr>

            <tr>
                <td>
                    Kullanıcı Yetki (Pozisyon):
                </td>
                <td class="text-center">
                    <label>
                        <select class="form-control" name="userPosition">
                                <option value="1">Admin</option>
                                <option value="2">Genel Sorumlu</option>
                                <option value="3" selected>Garson</option>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-center">
                    <label>
                        <input class="btn btn-warning" type="submit" name="submit" value="Bilgileri Güncelle"/>
                    </label>
                </td>
            </tr>

            </tbody>
        </table>
    </form>

    <?php
      }
    ?>
</div>