<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name'=>'Мобильные телефоны',
                'code'=>'mobiles',
                'description'=>'Описание категории моб.телефонов'
            ],
            [
                'name'=>'Портативная техника',
                'code'=>'portable',
                'description'=>'Описание категории порт.техника'
            ],
            [
                'name'=>'Бытовая техника',
                'code'=>'technics',
                'description'=>'Описание категории быт.техника'
            ],
        ]);
    }
}
