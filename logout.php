<?php
session_start();
ob_start();
session_destroy();
echo "<div class="text-center">Cikis Yaptiniz. Ana Sayfaya Yonlendiriliyorsunuz.</div>";
header("Refresh: 2; url=index.php");
ob_end_flush();
?>
