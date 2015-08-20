<?php

class Order extends Connection
{
    // masadaki siparişe ürün ekleme
    public function addProductToTableOrder($productId, $tableId){
        // ürün id ve masa id gelir
        // masa üstünde açık sipariş var mı diye bakılır
        // sipariş yoksa yeni sipariş oluşturulur ve id'si alınır
        if( ! $orderId = $this->isTableHaveOrder($tableId)){
            // Bu masada siparis yok, bi tane olusturalim
            $orderId = $this->createOrder($tableId);
        }
        // Bu masada siparis varmıs. idsi: ". $orderId
        // sipariş varsa aktif id alınır
        // ürün değerleriyle beraber sipariş ürünleri tablosuna eklenir
        return $this->addProductToOrder($productId, $orderId);
    }

    private function isTableHaveOrder($tableId){
        // SELECT id FROM orders WHERE status = 1 AND table_id = $tableId
        $isTableHaveOrder = $this->con->prepare("SELECT id FROM orders WHERE status = 1 AND table_id = :tableid");
        $isTableHaveOrder->execute(array("tableid" => $tableId));
        $isTableHaveOrder = $isTableHaveOrder->fetch(PDO::FETCH_ASSOC);
        if(is_array($isTableHaveOrder)) return $isTableHaveOrder['id'];
        return $isTableHaveOrder;
    }

    private function createOrder($tableId){
        // masa id'si gelir, bu id ile yeni bir sipariş açarız
        $createOrderQuery = $this->con->exec("INSERT INTO orders (table_id) VALUES ('".$tableId."')");
        if($createOrderQuery){
            // sipariş açıldıysa masa durumu aktif olur
            $orderId = $this->con->lastInsertId();
            $this->con->exec("UPDATE tables SET status = 1 WHERE id = ".$tableId);
            return $orderId;
        }
        return false;
    }

    private function addProductToOrder($productId, $orderId){
        // order_products tablosuna ürün bilgilerini siparişe bağlı olarak ekleyeceğiz
        $product = $this->con->query("SELECT name, price FROM products WHERE id = ". $productId)->fetch(PDO::FETCH_ASSOC);
        $newOrderProduct = $this->con->exec("INSERT INTO order_products (order_id, product_id, product_name, product_price) VALUES ('".$orderId."', '".$productId."', '".$product['name']."', '".$product['price']."')");
        if($newOrderProduct){
            return $this->con->lastInsertId();
        }
        return false;
    }

    public function getTableOrderedItems($tableId){
        // sipariş edilmiş ürünleri dizi içinde döndürür
        $items = [];
        // $tableId üzerindeki orderId'ye ihtiyacım var
        if( ! $orderId = $this->isTableHaveOrder($tableId)){
            return $items;
        }
        $orderItems = $this->con->query("SELECT * FROM order_products WHERE order_id = ".$orderId)->fetchAll(PDO::FETCH_ASSOC);
        //die(var_dump($orderItems));
        return $orderItems;
    }

    public function deleteProductFromOrder($orderProductId){
        // DELETE FROM order_products WHERE id = $orderProductId
        $delete = $this->con->exec("DELETE FROM order_products WHERE id = ".$orderProductId);
        if($delete>0) return $delete;
        return false;
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