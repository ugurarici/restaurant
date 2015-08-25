<?php

class Order extends Connection
{
    // masadaki siparişe ürün ekleme
    public function addProductToTableOrder($productId, $tableId)
    {
        // ürün id ve masa id gelir
        // masa üstünde açık sipariş var mı diye bakılır
        // sipariş yoksa yeni sipariş oluşturulur ve id'si alınır
        if (!$orderId = $this->isTableHaveOrder($tableId)) {
            // Bu masada siparis yok, bi tane olusturalim
            $orderId = $this->createOrder($tableId);
        }
        // Bu masada siparis varmıs. idsi: ". $orderId
        // sipariş varsa aktif id alınır
        // ürün değerleriyle beraber sipariş ürünleri tablosuna eklenir
        return $this->addProductToOrder($productId, $orderId);
    }

    private function isTableHaveOrder($tableId)
    {
        // SELECT id FROM orders WHERE status = 1 AND table_id = $tableId
        $isTableHaveOrder = $this->con->prepare("SELECT id FROM orders WHERE status = 1 AND table_id = :tableid");
        $isTableHaveOrder->execute(array("tableid" => $tableId));
        $isTableHaveOrder = $isTableHaveOrder->fetch(PDO::FETCH_ASSOC);
        if (is_array($isTableHaveOrder)) return $isTableHaveOrder['id'];
        return $isTableHaveOrder;
    }

    private function createOrder($tableId)
    {
        // masa id'si gelir, bu id ile yeni bir sipariş açarız
        $createOrderQuery = $this->con->exec("INSERT INTO orders (table_id) VALUES ('" . $tableId . "')");
        if ($createOrderQuery) {
            // sipariş açıldıysa masa durumu aktif olur
            $orderId = $this->con->lastInsertId();
            $this->con->exec("UPDATE tables SET status = 1 WHERE id = " . $tableId);
            return $orderId;
        }
        return false;
    }

    private function addProductToOrder($productId, $orderId)
    {
        // order_products tablosuna ürün bilgilerini siparişe bağlı olarak ekleyeceğiz
        $product = $this->con->query("SELECT name, price FROM products WHERE id = " . $productId)->fetch(PDO::FETCH_ASSOC);
        $newOrderProduct = $this->con->exec("INSERT INTO order_products (order_id, product_id, product_name, product_price) VALUES ('" . $orderId . "', '" . $productId . "', '" . $product['name'] . "', '" . $product['price'] . "')");
        if ($newOrderProduct) {
            return $this->con->lastInsertId();
        }
        return false;
    }

    public function getTableOrderedItems($tableId)
    {
        // sipariş edilmiş ürünleri dizi içinde döndürür
        $items = [];
        // $tableId üzerindeki orderId'ye ihtiyacım var
        if (!$orderId = $this->isTableHaveOrder($tableId)) {
            return $items;
        }
        $orderItems = $this->con->query("SELECT *, COUNT(*) as total FROM order_products WHERE order_id = " . $orderId . " GROUP BY product_name")->fetchAll(PDO::FETCH_ASSOC);
        //die(var_dump($orderItems));
        return $orderItems;
    }

    public function deleteProductFromOrder($orderProductId)
    {
        // DELETE FROM order_products WHERE id = $orderProductId
        $delete = $this->con->exec("DELETE FROM order_products WHERE id = " . $orderProductId);
        if ($delete > 0) return $delete;
        return false;
    }

    public function cancelTableOrder($tableId)
    {
        // masa siparişini yakala
        if ($orderId = $this->isTableHaveOrder($tableId)) {
            // masa siparişini sil
            $this->deleteOrder($orderId);
            $tableCont = new Table();
            $tableCont->deactive($tableId);
        }
    }

    private function deleteOrder($orderId)
    {
        $deleteOrder = $this->con->exec("DELETE FROM orders WHERE id=" . $orderId);
        $deleteProducts = $this->con->exec("DELETE FROM order_products WHERE order_id=" . $orderId);
        if ($deleteOrder && $deleteProducts) {
            return true;
        }
        return false;
    }

    public function moveTableOrder($fromTableId, $toTableId)
    {
        // siparişin table_id'sini değiştireceğiz
        if ($orderId = $this->isTableHaveOrder($fromTableId)) {
            $moveQ = $this->con->prepare("UPDATE orders SET table_id = :toTableId WHERE id = :orderId");
            //$moveQ->execute(array("toTableId" => $toTableId, "orderId" => $orderId));
            $moveQ->execute(compact("toTableId", "orderId"));
            // $fromTable pasif edilecek
            $tblCont = new Table();
            $tblCont->deactive($fromTableId);
            // $toTable Aktif edilecek
            $tblCont->active($toTableId);
        }
    }

    public function closeTableOrder($tableId)
    {
        if ($orderId = $this->isTableHaveOrder($tableId)) {

            // fiyatları güncelle
            $edit = $this->con->exec("update orders set total_amount=(select sum(product_price) from order_products where order_id=$orderId) where id=$orderId");

            // siparişi pasif yap
            $this->deactive($orderId);

            // tabloyu pasif yap
            $tableCont = new Table();
            $tableCont->deactive($tableId);

            if($edit==0)
                return false;
            return true;
        }
    }

    private function changeStatus($orderId, $status)
    {
        $chst = $this->con->query("UPDATE orders SET status=" . $status . " WHERE id=" . $orderId);
        if ($chst) {
            return true;
        }
        return false;

    }

    public function deactive($orderId)
    {
        return $this->changeStatus($orderId, 0);
    }

    public function active($orderId)
    {
        return $this->changeStatus($orderId, 1);
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
