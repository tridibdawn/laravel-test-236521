<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\OrderInterface;
use App\Http\Resources\OrderResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrdersController extends Controller
{
    protected $orders;

    public function __construct(OrderInterface $orders)
    {
        $this->orders = $orders;
    }

    /**
     * fetch order details
     * @param $id
     * @return array
     */
    public function fetchOrderData($id)
    {
        try {
            $orderDetails = $this->orders->orderDetails($id);
            return response()->json(
                [
                    'data' => new OrderResource($orderDetails),
                    'message' => 'Order details',
                    'status' => true,
                    'hasError' => 0
                ],
                Response::HTTP_OK
            );
        } catch(Exception $e) {
            
            if($e instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'data' => [],
                        'message' => 'No record found for the given input',
                        'hasError' => 1,
                        'status' => false
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }
            return response()->json(
                [
                    'data' => [],
                    'message' => $e->getMessage(),
                    'status' => false,
                    'hasError' => 1
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    public function allOrders()
    {
        try {
            $orders = $this->orders->orders();
            return response()->json(
                [
                    'data' => OrderResource::collection($orders),
                    'message' => 'All orders',
                    'status' => true,
                    'hasError' => 0
                ],
                Response::HTTP_OK
            );
        } catch(Exception $e) {
            return response()->json(
                [
                    'data' => [],
                    'message' => $e->getMessage(),
                    'status' => false,
                    'hasError' => 1
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
