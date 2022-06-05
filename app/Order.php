<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'amount',

    ];
}
