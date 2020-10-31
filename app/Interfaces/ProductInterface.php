<?php

namespace App\Interfaces;

interface ProductInterface
{
    // all products
    public function allProducts();
    // products by product lines
    public function productsByProductLine($productLine);
    // product details
    public function productDetails($productCode);
}