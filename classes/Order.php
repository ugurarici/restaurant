<?php

class Order extends Connection
{
    // siparişe ürün ekleme
    public function addProductToOrder($productId, $tableId){
        // ürün id ve masa id gelir
        // masa üstünde açık sipariş var mı diye bakılır
        // sipariş yoksa yeni sipariş oluşturulur ve id'si alınır
        if( ! $orderId = $this->isTableHaveOrder($tableId)){
            // Bu masada siparis yok, bi tane olusturalim
        }
        // Bu masada siparis varmıs. idsi: ". $orderId
        // sipariş varsa aktif id alınır
        // ürün değerleriyle beraber sipariş ürünleri tablosuna eklenir
    }

    private function isTableHaveOrder($tableId){
        // SELECT id FROM orders WHERE status = 1 AND table_id = $tableId
        $isTableHaveOrder = $this->con->prepare("SELECT id FROM orders WHERE status = 1 AND table_id = :tableid");
        $isTableHaveOrder->execute(array("tableid" => $tableId));
        $isTableHaveOrder = $isTableHaveOrder->fetch(PDO::FETCH_ASSOC);
        if(is_array($isTableHaveOrder)) return $isTableHaveOrder['id'];
        return $isTableHaveOrder;
    }

    // sipariş ekleme
    // siparişe ürün ekleme
    // siparişten ürün silme
    // siparişin masası
    // siparişin toplam tutarı
    // siparişteki ürünler
    // sipariş durumu
    // sipariş kapatma
}