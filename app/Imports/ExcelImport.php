<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\File;
use App\Customer;
use App\Discount;
use App\Product;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        {

            foreach ($collection as $k => $row)
            {
                $order[] = array(
                    'order_id' => $row[1],
                    'order_date' => $row[2],
                    'ship_date' => $row[3],
                    'ship_mode' => $row[4],
                    'sales' => $row[17],
                    'quantity' => $row[18],
                    'profit' => $row[20],
                );
                $dicounts[] = array(
                    'discount' => $row[19],
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
                    'sub_category' => $row[15],
                    'product_name' => $row[16],
                );
            }

            //Customer::generateModels($customers);
            //Product::generateModels($products);
            Discount::generate($dicounts);

        }
    }
}
