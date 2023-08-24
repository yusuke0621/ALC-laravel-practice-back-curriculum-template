<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{

    protected $category_names = [
        'food',
        'soft_drink',
        'alcoholic_drink',
        'book',
        'toys',
        'fashion',
        'computers',
        'diy',
    ];

    /**
     * カテゴリーを追加
     *
     * @return void
     */
    public function run()
    {
        $func = function(string $name, int $priority)
        {
            $created_at = new \DateTime();
            return compact('name', 'priority', 'created_at');
        };

        $keys = array_keys($this->category_names);
        $insert_data = array_map($func, $this->category_names, $keys);

        DB::table('categories')->insert($insert_data);
    }
}
