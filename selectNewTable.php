<?php

require_once "inc/global.php";

$fromTableId = $_GET['fromTableId'];
if(! $fromTableId) header("Location: index.php");

$tblObj = new Table();

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Restaurant</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
    <?php
    foreach($tblObj->getAllTables() as $table):
        $btnClass = "btn-default";
        if($table['status']==1) $btnClass = "btn-danger disabled";
        ?>
        <a href="orderTasks.php?task=move&fromTableId=<?=$fromTableId?>&tableId=<?=$table['id']?>" class="btn <?=$btnClass?> btn-lg col-sm-3 col-xs-6"><?=$table['name']?></a>
    <?php endforeach; ?>
</div>
</body>
</html>