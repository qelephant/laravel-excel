<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShipMode;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['order_id', 'order_date', 'ship_date', 'sales', 'quantity', 'profit'];

    public function shipMode()
    {
        return $this->belongsTo(ShipMode::class, 'ship_mode_id', 'id');
    }
}
