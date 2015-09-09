<?php
session_start();

require_once "functions.php";


/**
 * REMOTE_ADDR sunucuya gore uzaktaki sistemin adresini doner. 
 * PHP sunucuda calistigi icin, sunucuya gore uzaktaki sistem bu dosyayi cagiran
 * ziyaretci oluyor.
 */
$sitePath = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["PHP_SELF"])."/";
//dirname = Belirtilen dosya yolunun dizin bileşenini döndürür.