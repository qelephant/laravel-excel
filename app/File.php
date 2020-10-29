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
        $models = ['ship_mode', 'segment', 'country', 'city', 'state', 'postal_code', 'region', 'product_id', 'category', 'sub_category', 'discount'];
        $sort = array();

        foreach($models as $model){
            $sort[$model] = File::select($model)->distinct()->get()->toArray();
        }

        $products = $sort['product_id'];

        dd($products);
        foreach($sort as $k => $v){
            if($k == 'category'){
                Category::truncate();
                $category = new Category();
                //$category->fill($v);
                for ($i=0; $i < count($v); $i++) {
                    $category = new Category();
                    $category->name = $v[$i]['category'];
                    $category->save();
                }
            }
            elseif ($k == 'sub_category'){
                SubCategory::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $sub_category = new SubCategory();
                    $sub_category->name = $v[$i]['sub_category'];
                    $sub_category->save();
                }
            }
            elseif ($k == 'ship_mode'){
                ShipMode::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $ship_mode = new ShipMode();
                    $ship_mode->name = $v[$i]['ship_mode'];
                    $ship_mode->save();
                }
            }
            elseif ($k == 'segment'){
                Segment::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $segment = new Segment();
                    $segment->name = $v[$i]['segment'];
                    $segment->save();
                }
            }
            elseif ($k == 'country'){
                Country::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $country = new Country();
                    $country->name = $v[$i]['country'];
                    $country->save();
                }
            }
            elseif ($k == 'city'){
                City::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $city = new City();
                    $city->name = $v[$i]['city'];
                    $city->save();
                }
            }
            elseif ($k == 'state'){
                State::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $state = new State();
                    $state->name = $v[$i]['state'];
                    $state->save();
                }
            }
            elseif ($k == 'postal_code'){
                PostalCode::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $postal_code = new PostalCode();
                    $postal_code->name = $v[$i]['postal_code'];
                    $postal_code->save();
                }
            }
            elseif ($k == 'region'){
                Region::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $region = new Region();
                    $region->name = $v[$i]['region'];
                    $region->save();
                }
            }
            elseif ($k == 'discount'){
                Discount::truncate();
                for ($i=0; $i < count($v); $i++) {
                    $discount = new Discount();
                    $discount->name = $v[$i]['discount'];
                    $discount->save();
                }
            }

        }

        foreach($data as $k=>$row){
            Order::truncate();
            $order = new Order();
            $order->order_id = $row['order_id'];
            $order->order_date = $row['order_date'];

            if($k == 'customer_id'){
                Customer::truncate();
               $customer = new Customer();
               $customer->customer_id = $row['customer_id'];
               $customer->customer_name = $row['customer_name'];
               $customer->segment_id = Segment::where('name', $row['segment'])->pluck('id');
               $customer->city_id = City::where('name', $row['city'])->pluck('id');
               $customer->state_id = State::where('name', $row['state'])->pluck('id');
               $customer->postal_code_id = PostalCode::where('name', $row['postal_code'])->pluck('id');
               $customer->region_id = Region::where('name', $row['region'])->pluck('id');
               $customer->save();
            };
            dd('sfsd');
            if($k == 'product_id'){
                $product = new Product();
                $product->product_id = Product::where('id', $row['product_id'])->pluck('id');
                $product->category_id = Category::where('id', $row['category'])->pluck('id');
                $product->category_id = Category::where('id', $row['category'])->pluck('id');

            }
            //$order->sales = $row->sales;
            $order->quantity = $row->quantity;
            $order->profit = $row->profit;
            $order->save();
        }
    }
}
