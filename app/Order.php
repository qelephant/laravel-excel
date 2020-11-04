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
    public static function generate($array)
    {
        $array = array_slice($array, 1);
        
        foreach($array as $row){
            $data[] = [
                'order_id' => $row[1],
                'order_date' => $row[2],
                'ship_date' => $row[3],
                'ship_mode_id' => '4',
                'customer_id' => '1',            
                'product_id' => '13', 
                'sales' => $row[17],
                'quantity' => $row[18],
                'discount_id' => '19',
                'profit' => $row[20]                        
            ];            
        }
      
        $chunks = array_chunk($data, 1000);

        foreach($chunks as $chunck){
            //dd($chunck);
            Order::insert($chunck);
            
        }
    }
}
