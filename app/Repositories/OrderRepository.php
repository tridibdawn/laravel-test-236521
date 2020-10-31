<?php
namespace App\Repositories;

use App\Interfaces\OrderInterface;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderRepository implements OrderInterface
{
    protected $order;
    protected $orderDetails;

    public function __construct(Order $order, OrderDetails $orderDetails)
    {
        $this->order = $order;
        $this->orderDetails = $orderDetails;
    }

    public function orders()
    {
        return $this->order->with(['orderDetails'])->get();
    }

    public function orderDetails($orderNumber)
    {
        return $this->order->with(['orderDetails'])->findOrFail($orderNumber);
    }
}