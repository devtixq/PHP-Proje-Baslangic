<?php
require_once('cloud/class.crud.php');
$db=new crud();

// Oturum süresi biterse ve sayfadaysa sayfadan çıkışa izin verme.
if(!isset($_SESSION['adminoturum'])  && isset($_COOKIE['admincerez'])){

    $yoneticiGirisi=json_decode($_COOKIE['admincerez']);
    
    $sonuc=$db->yoneticiGirisi($yoneticiGirisi->admin_email,$yoneticiGirisi->admin_sifre,TRUE);
    
    if ($sonuc['durum']){
        header("Location:index.php");
        exit;
    }
    
}

if(!isset($_SESSION['adminoturum'])  && !isset($_COOKIE['admincerez'])){

    header("Location:giris.php");
    exit;


}


?>