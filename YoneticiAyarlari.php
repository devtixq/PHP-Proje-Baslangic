<?php

require_once "header.php";

?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">

<!--                // ?parametre geçerli ise aç-->

                <?php
                if(isset($_GET['yoneticiEkle'])){?>

<!--                    ?parametre geçerli ise aç bitiş-->

                    <div class="card">
                        <div class="card-body">

<!--                            Yönetici Ekleme </div>-->

                            <?php

                            if (isset($_POST['yonetici_Ekle'])){
                                $sonuc=$db->yoneticiEkle($_POST['admin_email'],$_POST['admin_adisoyadi'],$_POST['admin_sifre'],$_POST['admin_durum']);

                                if ($sonuc['durum']){?>
                                    <div class="alert alert-success">Kayıt Başarılı </div>
                               <?php } else {?>
                                    <div class="alert alert-danger">Kayıt Hatalı </div>
                             <?php   }
                            }

                            ?>


                            <h4 class="card-title">Yönetici Ekle
                                <div align="right" class="button-group">
                                    <a href="?yoneticiEkle=true"> <button type="button" class="btn waves-effect waves-light btn-success">Yönetici Ekle</button></a>
                                </div>
                            </h4>
                            <div class="box-body">
                                <form class="form pt-3" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Adresi</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                                            </div>
                                            <input type="email" name="admin_email" class="form-control" placeholder="Email" required="" aria-label="Email" aria-describedby="basic-addon22">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Adı Soyadı</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"  id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>

                                            <input type="text" name="admin_adisoyadi" required="" class="form-control"  placeholder="Adı Soyadı" aria-label="Adı Soyadı" aria-describedby="basic-addon11">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Şifre</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" name="admin_sifre" required="" class="form-control" placeholder="Şifre" aria-label="Şifre" aria-describedby="basic-addon33">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Yönetici Durumu</label>
                                    <select class="form-control custom-select" required="" name="admin_durum">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                    </div>
                                    <button type="submit" class="btn btn-info mr-2" name="yonetici_Ekle">Kaydet</button>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yönetici Ayarları
                            <div align="right" class="button-group">
                                <a href="?yoneticiEkle=true"> <button type="button" class="btn waves-effect waves-light btn-success">Yönetici Ekle</button></a>
                            </div>
                        </h4>
                        <div class="table-responsive">
                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Adı Soyadı</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
<!--                                 Yoneticiler tablosundan çek-->
                                <?php
                                $sorgu=$db->oku("yoneticiler");
                                $say=0;
                                while ($vericek=$sorgu->fetch(PDO::FETCH_ASSOC)){
                                ?>

                                <tr>
                                    <td><?php echo $say++; ?> </td>
                                    <td><?php echo $vericek['admin_email'] ?></td>
                                    <td><?php echo $vericek['admin_adisoyadi'] ?></td>
                                    <td>
                                        <?php
                                         if ($vericek['admin_durum']==0){
                                             echo '<span class="label label-danger">Pasif</span>';
                                         } else if ($vericek['admin_durum']==1){
                                             echo '<span class="label label-success">Aktif</span>';
                                         } ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info"><i class="fa fa-pen-square"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>


                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <?php

    require_once "footer.php";

    ?>
