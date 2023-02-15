<?php

namespace Database\Seeders;

use App\Models\Master\Category;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Sepatu Anak',
            'slug' => 'sepatu-anak',
        ]);
        Category::create([
            'name' => 'Pakaian Set Anak',
            'slug' => 'pakaian-set-anak',
        ]);
        Category::create([
            'name' => 'Kemeja Anak',
            'slug' => 'kemeja-anak',
        ]);
        Category::create([
            'name' => 'Dress Anak',
            'slug' => 'dress-anak',
        ]);
    }
}
