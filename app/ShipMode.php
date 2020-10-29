<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class ShipMode extends Model
{
    protected $table = "ship_modes";

    public function orders()
    {
        $this->hasMany(Order::class);
    }
}
