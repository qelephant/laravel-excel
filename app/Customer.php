<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Customer extends Model
{

    public static function generateModels($array)
    {

        $array = array_unique($array, SORT_REGULAR);
        $customer_id = array();
        $customer_name = array();
        $segments = array();
        $countries = array();
        $cities = array();
        $states = array();
        $postal_codes = array();
        $regions = array();

        foreach(array_slice($array, 1) as $row){

            foreach($row as $k => $v){
                if($k == 'segment_id'){
                    if(!in_array($v, $segments)){
                        $segments[] = $v;
                    }
                }
                elseif($k == 'city_id'){
                    if(!in_array($v, $cities)){
                        $cities[] = $v;
                    }
                }
                elseif($k == 'country_id'){
                    if(!in_array($v, $countries)){
                        $countries[] = $v;
                    }
                }
                elseif($k == 'state_id'){
                    if(!in_array($v, $states)){
                        $states[] = $v;
                    }
                }
                elseif($k == 'postal_code_id'){
                    if(!in_array($v, $postal_codes)){
                        $postal_codes[] = $v;
                    }
                }
                elseif($k == 'region_id'){
                    if(!in_array($v, $regions)){
                        $regions[] = $v;
                    }
                }
            }

        }

        if(!empty($segments)){
            DB::table('segments')->truncate();
            foreach($segments as $row){
                DB::table('segments')->insertGetId([ 'name' => $row ]);
            }
            $segments = array_combine(range(1, count($segments)), $segments);
        }
        if(!empty($cities)){
            DB::table('cities')->truncate();
            foreach($cities as $row){
                DB::table('cities')->insertGetId([ 'name' => $row ]);
            }
            $cities = array_combine(range(1, count($cities)), $cities);
        }
        if(!empty($countries)){
            DB::table('countries')->truncate();
            foreach($countries as $row){
                DB::table('countries')->insertGetId([ 'name' => $row ]);
            }
            $countries = array_combine(range(1, count($countries)), $countries);
        }
        if(!empty($states)){
            DB::table('states')->truncate();
            foreach($states as $row){
                DB::table('states')->insertGetId([ 'name' => $row ]);
            }
            $states = array_combine(range(1, count($states)), $states);
        }
        if(!empty($postal_codes)){
            DB::table('postal_codes')->truncate();
            foreach($postal_codes as $row){
                DB::table('postal_codes')->insertGetId([ 'name' => $row ]);
            }
            $postal_codes = array_combine(range(1, count($postal_codes)), $postal_codes);
        }
        if(!empty($regions)){
            DB::table('regions')->truncate();
            foreach($regions as $row){
                DB::table('regions')->insertGetId([ 'name' => $row ]);
            }
            $regions = array_combine(range(1, count($regions)), $regions);
        }

        foreach(array_slice($array, 1) as $row){
            $customer = new Customer();
            $customer->customer_id = $row['customer_id'];
            $customer->customer_name = $row['customer_name'];
            $customer->segment_id = array_search($row['segment_id'], $segments);
            $customer->country_id = array_search($row['country_id'], $countries);
            $customer->city_id = array_search($row['city_id'], $cities);
            $customer->state_id = array_search($row['state_id'], $states);
            $customer->postal_code_id = array_search($row['postal_code_id'], $postal_codes);
            $customer->region_id = array_search($row['region_id'], $regions);
            $customer->save();
        }
    }
}
