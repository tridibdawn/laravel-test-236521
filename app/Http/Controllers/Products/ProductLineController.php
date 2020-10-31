<?php

namespace App\Http\Controllers\Products;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Interfaces\ProductLineInterface;

class ProductLineController extends Controller
{
    // local varibale
    protected $productLine;

    // constructor
    public function __construct(ProductLineInterface $productLine)
    {
        $this->productLine = $productLine;
    }

    // all product lines
    public function allProductLines()
    {
        try {
            $productLines = $this->productLine->allProductLines();
            return response()->json(
                [
                    'data' => $productLines,
                    'message' => "List of all product lines",
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
