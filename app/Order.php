<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id', 'order_date', 'ship_date', 'sales', 'quantity', 'profit'];
}
