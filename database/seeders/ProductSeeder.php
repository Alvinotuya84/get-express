<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        DB::table('products')->insert([
            [
                'name'=>'hp pavilion',
                'details'=>'some laptop',
                'price'=>'Ksh>20',
                'description'=>'good',
                'image'=>'https://m.media-amazon.com/images/I/61dKwnQtCvS._AC_UY218_.jpg'
    
            ],
            [
                'name'=>'hp folio',
                'details'=>'some laptop',
                'price'=>'Ksh>20',
                'description'=>'good',
                'image'=>'https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/38/453155/1.jpg?0597'
    
            ],
            [
                'name'=>'elite book',
                'details'=>'some laptop',
                'price'=>'Ksh20',
                'description'=>'good',
                'image'=>'https://m.media-amazon.com/images/I/718n4cweIQS._AC_UY218_.jpg'
    
            ],[
                'name'=>'hp folio',
                'details'=>'some laptop',
                'price'=>'Ksh20',
                'description'=>'good',
                'image'=>'https://m.media-amazon.com/images/I/71jG+e7roXL._AC_UY218_.jpg7'
    
            ]
        ]);
        //


    }
}
