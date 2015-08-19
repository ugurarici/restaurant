<?php

class Table
{
    public static function getAllTables(){
        $connection = mysql_connect("localhost", "root" ,"");
        mysql_select_db("restaurant", $connection);
        $tablesQuery = mysql_query("SELECT * FROM tables");

        $tables = array();

        while(($row =  mysql_fetch_assoc($tablesQuery))) {
            $tables[] = $row;
        }

        return $tables;
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