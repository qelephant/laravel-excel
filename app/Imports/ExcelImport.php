<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\File;
use App\Customer;
use App\Discount;
use App\Product;
use App\Order;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */

    public function collection(Collection $collection)
    {
        {
            $generateOrder = array();
            ini_set('max_execution_time', 120);
            foreach ($collection as $k => $row)
            {
                $orders[] = array(
                    'order_id' => $row[1],
                    'order_date' => $row[2],
                    'ship_date' => $row[3],
                    'ship_mode_id' => $row[4],
                    'product_id' => $row[13],
                    'sales' => $row[17],
                    'quantity' => $row[18],
                    'discount_id' => $row[19],
                    'profit' => $row[20],
                );

                $customers[] = array(
                    'customer_id' => $row[5],
                    'customer_name' => $row[6],
                    'segment_id' => $row[7],
                    'country_id' => $row[8],
                    'city_id' => $row[9],
                    'state_id' => $row[10],
                    'postal_code_id'=> $row[11],
                    'region_id' => $row[12],

                );
                $products[] = array(
                    'product_id' => $row[13],
                    'category_id' => $row[14],
                    'sub_category_id' => $row[15],
                    'product_name_id' => $row[16],
                );
            }
 
            //Customer::generateModels($customers);
            $products = Product::generateModels($products);
            // Discount::generate($dicounts);
            $order = new Order;
            $order->generateProducts($products);
            $order->generate($orders);
            //$collection = $collection->toArray();
        }
    }
}
