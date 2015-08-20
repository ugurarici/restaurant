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

    public function deactive($tableId){
        $deactive = $this->con->query("UPDATE tables SET status=0 WHERE id=".$tableId);
        if($deactive){
            return true;
        }
        return false;
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