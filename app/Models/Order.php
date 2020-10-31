<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = "orderNumber";
    public $incrementing = false;
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetails', 'orderNumber');
    }
}
