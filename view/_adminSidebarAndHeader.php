<div id="sidebar-wrapper">
    <ul id="sidebar_menu" class="sidebar-nav">
        <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
    </ul>
    <ul class="sidebar-nav" id="sidebar">
        <li><a href="index.php">Site Giriş<span class="sub_icon glyphicon glyphicon-home"></span></a></li>
        <li><a href="admin.php">Admin Panel<span class="sub_icon glyphicon glyphicon-home"></span></a></li>
        <li><a href="categories.php">Kategoriler<span class="sub_icon glyphicon glyphicon-list-alt"></span></a></li>
        <li><a href="product-list.php">Ürünler<span class="sub_icon glyphicon glyphicon-glass"></span></a></li>
        <li><a href="orders.php">Siparişler<span class="sub_icon glyphicon glyphicon-import"></span></a></li>
        <li><a href="index.php">Masalar<span class="sub_icon glyphicon glyphicon-cutlery"></span></a></li>
        <li><a href="userList.php">Kullanıcılar<span class="sub_icon glyphicon glyphicon-user"></span></a></li>
    </ul>
</div>

<!-- Page content -->
<div id="page-content-wrapper">
    <!-- Keep all page content within the page-content inset div! -->
    <div class="page-content inset">
            <div class="col-md-12">
                <p class="bg-success">
                    <br />
                    <br />
           <?php
               // Oturum açan kişinin bilgilerini alıyoruz
                   $userId = $_SESSION['user_session'];
                   $userInfo = $usrObj->getOneUser($userId);
            ?>

                   Sayın <?= $userInfo["username"] ?>, <br/>
                        e-restaurant <b>Yönetici</b> sayfasına hoşgeldiniz.
                    <label class="pull-right"><a href="<?=$sitePath?>logout.php?logOut=true"><i class="glyphicon glyphicon-log-out"></i> Çıkış Yap</a></label>
                    <br />
                    <br />
                    <br />

                </p>

            </div>
    </div>
</div>