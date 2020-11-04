<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Discount extends Model
{
    public static function generate($array)
    {
        $array = array_unique($array, SORT_REGULAR);
        $array[0]['discount'] = '0';
        DB::table('discounts')->truncate();
        foreach($array as $row){
           foreach($row as $key=>$value){
                DB::table('discounts')->insertGetId([ 'name' => $value ]);
           }

        }

    }
}
