<?php
ob_start();
session_start();
require_once 'dbayar.php';
/**
 *Developer Devtixq
 */
class crud
{

  private $db;
  private $dbhost=DBHOST;
  private $dbuser=DBUSER;
  private $dbpass=DBPWD;
  private $dbname=DBNAME;

  // Veritabanı bağlantı fonksiyonu
  function __construct(){
      try {
      $this->db=new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8',$this->dbuser,$this->dbpass);
    //  echo "Bağlantı başarılı";
    }
      catch(Exception $e){
      die("Bağlantı başarısız:".$e->getMessage());
        }
    }

    // Uzun fonksiyon

    public function yoneticiEkle($admin_email,$admin_adisoyadi,$admin_sifre,$admin_durum) {

       try {

            $stmt=$this->db->prepare("INSERT INTO yoneticiler SET admin_email=?, admin_adisoyadi=?, admin_sifre=?, admin_durum=?");
            $stmt->execute([$admin_email,$admin_adisoyadi,md5($admin_sifre),$admin_durum]);

            return ['durum' => TRUE];

       }catch (Exception $e){

           return ['durum' => FALSE, 'hata' => $e->getMessage()];
       }

        }



    public function yoneticiGirisi($admin_email,$admin_sifre,$beni_hatirla) {

     try {

       $stmt=$this->db->prepare("SELECT * FROM yoneticiler WHERE admin_email=? AND admin_sifre=?");


       if (isset($_COOKIE['admincerez'])){
           $stmt->execute([$admin_email,md5(openssl_decrypt($admin_sifre,"AES-128-ECB","admincerez_coz"))]);
       }else{
           $stmt->execute([$admin_email,md5($admin_sifre)]);
       }



       if ($stmt->rowCount()==1) {

        $vericek=$stmt->fetch(PDO::FETCH_ASSOC);

        // Admin Giriş Kontrolü 1'e girer 0'sa girmez.
        if($vericek['admin_durum']==0){
            return ['durum'=>FALSE];
            exit;
        }

        $_SESSION["adminoturum"]=[
          "admin_email" => $admin_email,
          "admin_adisoyadi" => $vericek['admin_adisoyadi'],
          "admin_resim" => $vericek['admin_resim'],
          "admin_id" => $vericek['admin_id']
        ];

        // Çerezleme başlangıç
        if(!empty($beni_hatirla) AND empty($_COOKIE['admincerez'])) {
            $admincerezle=[
                "admin_email" => $admin_email,
                "admin_sifre" => openssl_encrypt($admin_sifre, "AES-128-ECB", "admincerez_coz")
            ];

            setcookie("admincerez",json_encode($admincerezle),strtotime("+30 day"),"/");
        }
        else if (empty($beni_hatirla)) {
            setcookie("admincerez",json_encode($admincerezle),strtotime("-30 day"),"/");
        }
           // Çerezleme bitiş

        return ['durum' => TRUE];

       } else {
         
        return ['durum' => FALSE];

       }

     } catch (Exception $e) {
       
      return ['durum' => FALSE, 'hata' => $e->getMessage()];

     }



    }


    public function oku($tablo){

      try{

          $stmt=$this->db->prepare("SELECT * FROM $tablo");
          $stmt->execute();

          return $stmt;

      }catch (Exception $e){

          echo $e->getMessage();
          return false;
      }

    }

  }

  



  ?>
