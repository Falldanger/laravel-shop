<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'name' => 'iPhone X 64GB',
                'code' => 'iphone_x_64',
                'description' => 'Отличный продвинутый телефон с памятью на 64 gb',
                'category_id' => 1,
                'image' => 'products/iphone_x.jpg',
            ],
            [
                'name' => 'iPhone X 256GB',
                'code' => 'iphone_x_256',
                'description' => 'Отличный продвинутый телефон с памятью на 256 gb',
                'category_id' => 1,
                'image' => 'products/iphone_x_silver.jpg',
            ],
            [
                'name' => 'HTC One S',
                'code' => 'htc_one_s',
                'description' => 'Зачем платить за лишнее? Легендарный HTC One S',
                'category_id' => 1,
                'image' => 'products/htc_one_s.png',
            ],
            [
                'name' => 'iPhone 5SE',
                'code' => 'iphone_5se',
                'description' => 'Отличный классический iPhone',
                'category_id' => 1,
                'image' => 'products/iphone_5.jpg',
            ],
            [
                'name' => 'Наушники Beats Audio',
                'code' => 'beats_audio',
                'description' => 'Отличный классический iPhone',
                'category_id' => 2,
                'image' => 'products/beats.jpg',
            ],
            [
                'name' => 'Камера GoPro',
                'code' => 'gopro',
                'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                'category_id' => 2,
                'image' => 'products/gopro.jpg',
            ],
            [
                'name' => 'Камера Panasonic HC-V770',
                'code' => 'panasonic_hc-v770',
                'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                'category_id' => 2,
                'image' => 'products/video_panasonic.jpg',
            ],
            [
                'name' => 'Кофемашина DeLongi',
                'code' => 'delongi',
                'description' => 'Хорошее утро начинается с хорошего кофе!',
                'category_id' => 3,
                'image' => 'products/delongi.jpg',
            ],
            [
                'name' => 'Холодильник Haier',
                'code' => 'haier',
                'description' => 'Для большой семьи большой холодильник!',
                'category_id' => 3,
                'image' => 'products/haier.jpg',
            ],
            [
                'name' => 'Блендер Moulinex',
                'code' => 'moulinex',
                'description' => 'Для самых смелых идей',
                'category_id' => 3,
                'image' => 'products/moulinex.jpg',
            ],
            [
                'name' => 'Мясорубка Bosch',
                'code' => 'bosch',
                'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                'category_id' => 3,
                'image' => 'products/bosch.jpg',
            ],
            [
                'name' => 'Samsung Galaxy J6',
                'code' => 'samsung_j6',
                'description' => 'Современный телефон начального уровня',
                'category_id' => 1,
                'image' => 'products/samsung_j6.jpg',
            ],
        ]);
    }
}
