<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductInterface;
use App\Models\ProductLine;

class ProductRepository implements ProductInterface
{
    // local variable
    protected $products;
    protected $productLines;

    // constructor
    public function __construct(Product $product, ProductLine $productLine)
    {
        $this->products = $product;
        $this->productLine = $productLine;
    }

    // all products
    public function allProducts()
    {
        return $this->products->get();
    }

    // products by product lines
    public function productsByProductLine($productLine)
    {
        $this->productLines->findOrFail($productLine);
        return $this->products->where('productLine', $productLine)->get();
    }

    // product details
    public function productDetails($productCode)
    {
        return $this->products->findOrFail($productCode);
    }
}