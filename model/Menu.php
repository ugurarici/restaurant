<?php

class Menu extends Connection
{
    // tüm menüyü iç içe dizi oalrak getirecek method
    public function getFullMenu()
    {
        $fullMenu = [];
        // kategorileri getireceğiz
        $categories = $this->con->query("SELECT * FROM product_categories");
        // her kategori için işlem yapılacak
        foreach ($categories as $category) {
            $fullMenu[$category['name']] = [];
            $catProductQuery = $this->con->prepare("SELECT * FROM products WHERE category_id = :catid");
            $catProductQuery->execute(array("catid" => $category['id']));
            $catProducts = $catProductQuery->fetchAll(PDO::FETCH_ASSOC);
            foreach ($catProducts as $product) {
                $fullMenu[$category['name']][$product['id']] = $product;
            }
        }
        return $fullMenu;
    }

    public function getAllCategories()
    {
        return $this->con->query("SELECT * FROM product_categories")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory($catId){
        $get = $this->con->query("SELECT * FROM product_categories WHERE id=".$catId)->fetch(PDO::FETCH_ASSOC);
        return $get;
    }

    public function editCategory($catId, $catName){
        $edit = $this->con->prepare("UPDATE product_categories SET name=? WHERE id=?");
        $cntrl = $edit->execute(array($catName,$catId));

        if($cntrl)
            return true;
        return false;
    }

    public function getProductsFromCategory($catId)
    {
        return $this->con->query("SELECT * FROM products WHERE category_id=" . $catId)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($productId){
        return $this->con->query("SELECT * FROM products WHERE id=".$productId)->fetch(PDO::FETCH_ASSOC);
    }

    public function editProduct($productId, $catId, $productName, $productPrice){
        $edit = $this->con->prepare("UPDATE products SET category_id=?, `name`=?, price=? WHERE id=?");
        $cntrl = $edit->execute(array($catId, $productName, $productPrice, $productId));

        if($cntrl)
            return true;
        return false;

    }

    public function categoryAdd($catName)
    {
        $add = $this->con->prepare("INSERT INTO product_categories (`name`) VALUES (?)");
        $cntrl = $add->execute(array($catName));

        if ($cntrl)
            return true;
        return false;
    }

    public function productAdd($name, $price, $catId)
    {
        $price = (float)str_replace(",", ".", $price);
        $add = $this->con->prepare("INSERT INTO products (category_id,`name`,price) VALUES (?, ?, ?)");
        $cntrl = $add->execute(array($catId, $name, $price));

        if ($cntrl)
            return true;
        return false;
    }

    public function productDeleteForCategory($catId)
    {
        $del = $this->con->exec("DELETE FROM products WHERE category_id=" . $catId);
        if ($del)
            return true;
        return false;
    }

    public function categoryDelete($catId)
    {
        $del1 = $this->con->exec("DELETE FROM product_categories WHERE id=" . $catId);
        $del2 = $this->productDeleteForCategory($catId);

        if ($del1 && $del2)
            return true;
        return false;
    }

    public function productDelete($productId)
    {
        $del = $this->con->exec("DELETE FROM products WHERE id=" . $productId);

        if ($del)
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