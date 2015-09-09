<div class="col-sm-6">
    <h1>Personel Kayıt</h1>
    <form action="<?=$sitePath?>userTasks.php?task=register" method="POST">
        <table class="table table-bordered table-striped">
            <?php
            if(isset($_GET['msg'])){
                if(($_GET['msg']) == "success"){
            ?>

            <thead>
                <tr class="bg-info">
                    <th colspan="2">Kayıt İşlemi Başarılı olmuştur!</th>
                </tr>
            </thead>

            <?php
                }elseif(($_GET['msg']) == "errorExist"){
            ?>
             <thead>
                <tr class="bg-primary">
                    <th colspan="2"><b>"Kullanıcı adı / email"</b> veritabanında zaten var! Lütfen farklı  <b>"kullanıcı adı / email"</b> deneyiniz.</th>
                </tr>
             </thead>
            <?php
                }
                else {
            ?>
              <thead>
                <tr class="bg-danger">
                    <th colspan="2">Tüh, Bi hata oluştu! Ama öyle eklemeyecektiniz!<br /> (Lütfen boş yer bırakmadan tekrar deneyiniz!)</th>
                </tr>
             </thead>

            <?php
                }
            }
            ?>
            <thead>
            <tr class="bg-success">
                <th colspan="2">Yeni Personel Kayıt</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Kullanıcı Adı:
                </td>
                <td class="text-center">
                    <label>
                        <input type="text" name="username" class="form-control" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Şifre:
                </td>
                <td class="text-center ">
                    <label>
                        <input type="password" name="password" class="form-control" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td class="text-center ">
                    <label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    Personel Adı ve Soyadı:
                </td>
                <td class="text-center">
                    <label>
                        <input type="text" name="name" class="form-control" required>
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
                <td>

                </td>
                <td class="text-center">
                    <label>
                        <input class="btn btn-warning" type="submit" name="register" value="Personel Kaydını Bitir"/>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
