<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\File;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        {
            DB::table('excel_data')->truncate();
            foreach ($collection as $row)
            {
                $data[] = array(
                    'order_id' => $row[1],
                    'order_date' => $row[2],
                    'ship_date' => $row[3],
                    'ship_mode' => $row[4],
                    'customer_id' => $row[5],
                    'customer_name' => $row[6],
                    'segment' => $row[7],
                    'country' => $row[8],
                    'city' => $row[9],
                    'state' => $row[10],
                    'postal_code' => $row[11],
                    'region' => $row[12],
                    'product_id' => $row[13],
                    'category' => $row[14],
                    'sub_category' => $row[15],
                    'product_name' => $row[16],
                    'sales' => $row[17],
                    'quantity' => $row[18],
                    'discount' => $row[19],
                    'profit' => $row[20],
                );
            }

            if(!empty($data)){
                foreach(array_slice($data, 1) as $row){
                    DB::table('excel_data')->insert($row);
                }
            }
        }
    }
}
