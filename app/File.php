<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Segment;
use App\Category;
use App\City;
use App\Customer;
use App\Region;
use App\State;
use App\SubCategory;
use App\Product;
use App\Discount;

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


    public function shipMode()
    {
        return $this->belongsTo('App\ShipMode');
    }
    public static function generate()
    {
        $data = File::all()->toArray();
        //dd($data);
        foreach($data as $row){
            dd($row);
        }

    }
}
