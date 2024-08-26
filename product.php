<?php

class Product
{
    private $productId;
    private $productName;
    private $productDescription;
    private $productPrice;
    private $productFeatures;
    private $productImage;

    private $products = [];
    public function __construct()
    {
        $this->products = json_decode(file_get_contents('product.json'), true);
    }

    public function setProductDetails($products)
    {
        $this->productId = $products['id'];
        $this->productName = $products['name'];
        $this->productDescription = $products['description'];
        $this->productPrice = $products['price'];
        $this->productFeatures = $products['features'];
        $this->productImage = $products['image'];
    }

    public function getAllProducts()
    {
        return $this->products;
    }

    public function getProductById($id)
    {
        foreach ($this->products as $product) {
            if ($product['id'] == $id) {
                $this->setProductDetails($product);
                return $this;
            }
        }
        return null;
    }

    public function getProductDetails($id)
    {
        foreach ($this->products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null; 
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getProductDescription()
    {
        return $this->productDescription;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public function getProductFeatures()
    {
        return $this->productFeatures;
    }

    public function getProductImage()
    {
        return $this->productImage;
    }
}

?>