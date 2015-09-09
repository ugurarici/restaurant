<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
         include "_adminSidebarAndHeader.php";

     ?>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Ürün Kategori Sayısı </div>
                                <div style="font-size: 20px"><?=$categoryCount['COUNT(id)'];?></div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-glass" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam Ürün Sayısı </div>
                                <div style="font-size: 20px"><?=$productCount['COUNT(id)'];?></div>

                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-import" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam Sipariş Sayısı </div>
                                <div style="font-size: 20px"><?=$orderCount["COUNT(id)"];?></div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-user" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam Üye Sayısı</div>
                                <div style="font-size: 20px"><?=$userCount["COUNT(id)"];?></div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>
</div>
