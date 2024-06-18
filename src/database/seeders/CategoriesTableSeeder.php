<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['content' => mb_convert_encoding('商品のお届けについて', 'UTF-8')],
            ['content' => mb_convert_encoding('商品交換について', 'UTF-8')],
            ['content' => mb_convert_encoding('商品トラブル', 'UTF-8')],
            ['content' => mb_convert_encoding('ショップへのお問い合わせ', 'UTF-8')],
            ['content' => mb_convert_encoding('その他', 'UTF-8')],
        ]);
    }
}