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

    private function changeStatus($tableId, $status){
        $chst = $this->con->query("UPDATE tables SET status=".$status." WHERE id=".$tableId);
        if($chst){
            return true;
        }
        return false;
    }

    public function deactive($tableId){
        return $this->changeStatus($tableId, 0);
    }

    public function active($tableId){
        return $this->changeStatus($tableId, 1);
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