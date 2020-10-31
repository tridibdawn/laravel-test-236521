<?php

namespace App\Interfaces;

interface OrderInterface
{
    // orders
    public function orders();
    // order details
    public function orderDetails($orderNumber);
}