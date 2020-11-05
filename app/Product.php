<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public $timestamps = false;

    public static function generateModels($array)
    {
        $categories = array();
        $sub_categories = array();
        $product_names = array();
        
        $array = array_slice($array, 1);
        foreach($array as $row){
            foreach($row as $key => $value){
                if($key == 'category_id'){
                    if(!in_array($value, $categories)){
                        $categories[] = $value;
                    }
                }
                if($key == 'sub_category_id'){
                    if(!in_array($value, $sub_categories)){
                        $sub_categories[] = $value;
                    }
                }
                if($key == 'product_name_id'){
                    if(!in_array($value, $product_names)){
                        $product_names[] = $value;
                    }
                }
            }
        }

        if(!empty($categories)){
            DB::table('categories')->truncate();
            foreach($categories as $row){
                DB::table('categories')->insertGetId([ 'name' => $row ]);
            }
            $categories = array_combine(range(1, count($categories)), $categories);
        }
        if(!empty($sub_categories)){
            DB::table('sub_categories')->truncate();
            foreach($sub_categories as $row){
                DB::table('sub_categories')->insertGetId([ 'name' => $row ]);
            }
            $sub_categories = array_combine(range(1, count($sub_categories)), $sub_categories);
        }
        if(!empty($product_names)){
            DB::table('product_names')->truncate();
            foreach($product_names as $row){
                DB::table('product_names')->insertGetId(['name' => $row ]);
            }
            $product_names = array_combine(range(1, count($product_names)), $product_names);
        }

        foreach($array as $row){
            $data[] = [
                'product_id' => $row['product_id'],
                'category_id' => array_search($row['category_id'], $categories),
                'sub_category_id' => array_search($row['sub_category_id'], $sub_categories),
                'product_name_id' => array_search($row['product_name_id'], $product_names),                    
            ];            
        }

        $chunks = array_chunk($data, 1000);
        $data = array_combine(range(1, count($data)), $data);
        Product::truncate();
        foreach($chunks as $chunck){
            Product::insert($chunck);
            
        }
        return $data;
    }
}
