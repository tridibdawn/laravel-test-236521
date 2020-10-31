<?php

namespace App\Http\Controllers\Products;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    // local varibale
    protected $products;

    // constructor
    public function __construct(ProductInterface $product)
    {
        $this->products = $product;
    }

    // all products
    public function allProducts(Request $request)
    {
        try {
            $products = $this->products->allProducts();
            $message = "List of all products";
            if($request->has('productLine')) {
                if(!empty($request->productLine)) {
                    $products = $this->products->productsByProductLine($request->productLine);
                    $message = "List of all products of product line ". $request->productLine;
                }
            }
            return response()->json(
                [
                    'data' => $products,
                    'message' => $message,
                    'hasError' => 0,
                    'status' => true
                ],
                Response::HTTP_OK
            );
        } catch(Exception $e) {
            return response()->json(
                [
                    'data' => [],
                    'message' => $e->getMessage(),
                    'hasError' => 1,
                    'status' => false
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    // product details
    public function productDetails($productCode)
    {
        try {
            $product = $this->products->productDetails($productCode);
            $message = "Product Details";
            
            return response()->json(
                [
                    'data' => $product,
                    'message' => $message,
                    'hasError' => 0,
                    'status' => true
                ],
                Response::HTTP_OK
            );
        } catch(Exception $e) {
            return response()->json(
                [
                    'data' => [],
                    'message' => $e->getMessage(),
                    'hasError' => 1,
                    'status' => false
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
