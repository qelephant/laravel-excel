<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShipMode;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use Sortable;
    protected $table = "orders";
    protected $fillable = ['order_id', 'order_date', 'ship_date', 'sales', 'quantity', 'profit'];
    public $sortable = [
        'id',
        'order_id',
        'order_date',
        'ship_date',
        'ship_mode',
        'customer_id',
        'customer_name',
        'segment',
        'country',
        'city',
        'state' ,
        'postal_code',
        'region',
        'product_id',
        'category',
        'sub_category',
        'product_name',
        'sales',
        'quantity',
        'discount',
        'profit'
        ];

    public function shipMode()
    {
        return $this->belongsTo(ShipMode::class, 'ship_mode_id', 'id');
    }
}
