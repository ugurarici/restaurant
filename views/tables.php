<?php
foreach($allTables as $table):
    $btnClass = "btn-default";
    if($table['status']==1) $btnClass = "btn-info";
    ?>
    <a href="table.php?id=<?=$table['id']?>" class="btn <?=$btnClass?> btn-lg col-sm-3 col-xs-6"><?=$table['name']?></a>
<?php endforeach; ?>