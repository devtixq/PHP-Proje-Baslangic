// Kullanıcı Girişi

<?php
if (isset($_POST['kul_girisi'])) {

    $sonuc=$db->yoneticiGirisi(htmlspecialchars($_POST['admin_email']),htmlspecialchars($_POST['admin_sifre']),$_POST['beni_hatirla']);

    if ($sonuc['durum']) {

        header("Location:index.php");
        exit;

    }else { ?>
        <div class="alert alert-info">Kullanıcı adı veya şifre yanlış</div>
    <?php }

    // print_r($_POST);

}

?>