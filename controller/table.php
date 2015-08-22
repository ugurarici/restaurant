<?php

$tblObj = new Table();
$table = $tblObj->getOne($_GET['id']);
if(! $table) die("Boyle bir masa yok.");

$menuObj = new Menu();
$menu = $menuObj->getFullMenu();

$orderObj = new Order();
$orderedItems = $orderObj->getTableOrderedItems($table['id']);
?>