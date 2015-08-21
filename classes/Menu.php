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

    public function getAllCategories(){
        return $this->con->query("SELECT * FROM product_categories")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function categoryAdd($catName){
        $add = $this->con->prepare("INSERT INTO product_categories (`name`) VALUES (?)");
    $cntrl = $add->execute(array($catName));

        if($cntrl)
            return true;
        return false;
    }

    public function productAdd($name, $price, $catId){
        $price = (float) str_replace(",", ".", $price);
        $add = $this->con->prepare("INSERT INTO products (category_id,`name`,price) VALUES (?, ?, ?)");
        $cntrl = $add->execute(array($catId, $name, $price));

        if($cntrl)
            return true;
        return false;
    }

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