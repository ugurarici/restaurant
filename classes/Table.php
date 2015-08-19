<?php
class Table extends Connection
{
    public function getAllTables(){
        $tables = $this->con->query("SELECT * FROM tables");
        return $tables;
    }

    public function getOne($tableId){
        $table = $this->con->query("SELECT * FROM tables WHERE id = ". $tableId)->fetch(PDO::FETCH_ASSOC);
        return $table;
    }
    // masa ekeleme
    // masa düzenleme
    // masa silme
    // masa sayısı
    // masaların listesi
    // masanın adı
    // masanın durumu
    // masanın siparişi
    // sipariş durumu
}