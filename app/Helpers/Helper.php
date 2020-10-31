<?php
use Illuminate\Support\Facades\DB;

if (!function_exists('product_name'))
{
    function product_name($productCode)
    {
        $result = DB::table('products')->select('productName')->where('productCode', $productCode)->first();
        if(!empty($result)) {
            return $result->productName;
        } else {
            return null;
        }
    }
}

if (!function_exists('product_line'))
{
    function product_line($productCode)
    {
        $result = DB::table('products')->select('productLine')->where('productCode', $productCode)->first();
        if(!empty($result)) {
            return $result->productLine;
        } else {
            return null;
        }
    }
}

if (!function_exists('order_total'))
{
    function order_total($qty, $unitPrice)
    {
        $result = ($qty * $unitPrice);
        return number_format($result, 2);
    }
}
