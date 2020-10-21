<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class File extends Model
{
    use Sortable;

    protected $table = "excel_data";

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
}
