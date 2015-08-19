<?php
class Table extends Connection
{
    var $id;
    var $name;
    var $status;

    function __construct($id = NULL){
        parent::__construct();
        if(!is_null($id)) $this->initializeById($id);
    }

    public static function find($id){
        return new Table($id);
    }

    function initializeById($id){
        if($table = $this->getOne($id)){
            $this->id = $table['id'];
            $this->name = $table['name'];
            $this->status = $table['status'];
        }else{
            die ($id. " idli masa bulunmuyor.");
        }
    }

    public function getAllTables(){
        $tables = $this->con->query("SELECT * FROM tables");
        return $tables;
    }

    private function getOne($tableId){
        $query = $this->con->prepare("SELECT * FROM tables WHERE id = ?");
        $query->execute(array($tableId));
        $table = $query->fetch(PDO::FETCH_ASSOC);
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