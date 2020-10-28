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
use App\Product;
use App\Region;
use App\State;
use App\SubCategory;


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

    public static function generate()
    {
        $data = File::all();
        $models = ['category', 'sub_category', 'segment', 'country', 'state', 'postal_code', 'region'];
        $sort = array();
        $category = array();
        $sub_category = array();
        $segment = array();
        $country = array();
        $state = array();

        foreach($models as $model){
            $sort[$model] = File::select($model)->distinct()->get()->toArray();
        }

        foreach($sort as $k => $v){
            if($k == 'category'){

                for ($i=0; $i < count($v); $i++) {
                    $category = new Category();
                    $category->name = $v[$i]['category'];
                    $category->save();
                }
            } elseif ($k == 'sub_category'){
                for ($i=0; $i < count($v); $i++) {
                    $sub_category = new SubCategory();
                    $sub_category->name = $v[$i]['sub_category'];
                    $sub_category->save();
                }
            } elseif ($k == 'segment'){
                for ($i=0; $i < count($v); $i++) {
                    $segment = new Segment();
                $segment->name = $v[$i]['segment'];
                $segment->save();
                }
            } elseif ($k == 'country'){
                for ($i=0; $i < count($v); $i++) {
                    $country = new Country();
                $country->name = $v[$i]['country'];
                $country->save();
                }
            } elseif ($k == 'state'){
                for ($i=0; $i < count($v); $i++) {
                    $state = new State();
                $state->name = $v[$i]['state'];
                $state->save();
                }
            }
            elseif ($k == 'region'){
                for ($i=0; $i < count($v); $i++) {
                    $region = new Region();
                    $region->name = $v[$i]['region'];
                    $region->save();
                }
            }
        }
        dd($category);

        // foreach($array as $row){
        //     $order = new Order();
        //     $order->order_id = $row->order_id;
        //     $order->order_date = $row->order_date;
        //     $order->order_id = $row->order_id;
        //     $order->sales = $row->sales;
        //     $order->quantity = $row->quantity;
        //     $order->profit = $row->profit;
        //     $order->save();
        // }
    }
}
