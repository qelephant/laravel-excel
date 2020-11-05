<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShipMode;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;


class Order extends Model
{
    use Sortable;
    protected $table = "orders";
    protected $fillable = ['order_id', 'order_date', 'ship_date', 'sales', 'quantity', 'profit'];
    protected $products = [];
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

    public function generateProducts($array)
    {
        $this->products = array_unique($array, SORT_REGULAR);
    }
    public function generate($array)
    {
        $ship_modes = [];
        $discounts = [];
        $products = $this->products;
        $array = array_slice($array, 1);
        foreach($array as $row){
            foreach($row as $k => $v){
                if($k == 'ship_mode_id'){
                    if(!in_array($v, $ship_modes)){
                        $ship_modes[] = $v;
                    }
                }
                if($k == 'discount_id'){
                    if(!in_array($v, $discounts)){
                        $discounts[] = $v;
                    }
                }
            }
        }

        if(!empty($ship_modes)){
            DB::table('ship_modes')->truncate();
            foreach($ship_modes as $row){
                DB::table('ship_modes')->insertGetId([ 'name' => $row ]);
            }
            $ship_modes = array_combine(range(1, count($ship_modes)), $ship_modes);
        }
        if(!empty($discounts)){
            DB::table('discounts')->truncate();
            foreach($discounts as $row){
                DB::table('discounts')->insertGetId([ 'name' => $row ]);
            }
            $discounts = array_combine(range(1, count($discounts)), $discounts);
        }

        foreach($array as $row){

            $data[] = [
                'order_id' => $row['order_id'],
                'order_date' => $row['order_date'],
                'ship_date' => $row['ship_date'],
                'ship_mode_id' => array_search($row['ship_mode_id'], $ship_modes),
                'product_id' => array_search($row['product_id'], $products),
                'sales' => $row['sales'],
                'quantity' => $row['quantity'],
                'discount_id' => array_search($row['discount_id'], $discounts),
                'profit' => $row['profit']                        
            ];            
        }

        $chunks = array_chunk($data, 1000);
        Order::truncate();
        foreach($chunks as $chunck){
            Order::insert($chunck);
            
        }
        dd('success');
    }
}
