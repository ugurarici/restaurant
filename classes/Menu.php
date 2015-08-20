<?php

class Menu extends Connection
{
    // tüm menüyü iç içe dizi oalrak getirecek method
    public function getFullMenu(){
        $fullMenu = [];
        // kategorileri getireceğiz
        $categories = $this->con->query("SELECT * FROM product_categories");
        // her kategori için işlem yapılacak
        foreach($categories as $category){
            $fullMenu[$category['name']] = [];
            $catProductQuery = $this->con->prepare("SELECT * FROM products WHERE category_id = :catid");
            $catProductQuery->execute(array("catid" => $category['id']));
            $catProducts = $catProductQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach($catProducts as $product){
                $fullMenu[$category['name']][$product['id']] = $product;
            }
        }
        return $fullMenu;
    }
    // Kategori ekleme
    // Kategori düzenleme
    // Kategori silme
    // Kategori listeleme
    // Ürün ekleme
    // ürün düzenleme
    // ürün silme
    // ürün bilgilerini alma
    // ürün fiyatını alma
    // ürün listeleme
    // menü listeleme
}