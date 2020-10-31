<?php

namespace App\Repositories;

use App\Models\ProductLine;
use App\Interfaces\ProductLineInterface;

class ProductLineRepository implements ProductLineInterface
{
    // local variable
    protected $productLine;

    // constructor
    public function __construct(ProductLine $productLine)
    {
        $this->productLine = $productLine;
    }

    public function allProductLines()
    {
        return $this->productLine->get();
    }
}