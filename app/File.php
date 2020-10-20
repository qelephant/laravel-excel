<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "excel_data";

    public $fillable = [
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
}
