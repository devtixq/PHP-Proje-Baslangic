<?php

//ob_start();
session_start();
unset($_SESSION['adminoturum']);
setcookie("admincerez",json_encode($admincerezle),strtotime("-30 day"),"/");
header("Location:giris.php");
exit;

?>