<?php

namespace Database\Seeders;

use App\Models\Master\Product;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            'Mighty Shoes Coklat',
            'Mighty Shoes Cream',
            'Jolly Set Kuning',
            'Jolly Set Biru',
            'Havana Set Rainbow',
            'Havana Set Shape',
            'Havana Set Flower',
            'Sabhira Set Abstract',
            'Sabhira Set Navy',
            'Sabhira Set Hijau',
            'Sabhira Set Orange',
            'Sabhira Set Totol',
            'Sabhira Set Brush',
            'Flannel Premium Cokelat',
            'Flannel Premium Abu Abu',
            'Homey Dress Kuning',
            'Homey Dress Putih',
            'Homey Dress Pink',
            'Homey Dress Hijau',
        ];

        $harga = [
            125000,
            125000,
            68000,
            68000,
            80000,
            80000,
            80000,
            67000,
            67000,
            67000,
            67000,
            67000,
            67000,
            85000,
            85000,
            47000,
            47000,
            47000,
            47000
        ];

        $berat = [
            500,
            500,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350,
            350
        ];

        $ukuran = [
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
            'S, M',
        ];

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'categories_id' => rand(1, 2),
                'name' => $produk[$i],
                'slug' => str_replace(" ", "-", $produk[$i]),
                'thumbnails' => 'gambar',
                'price' => $harga[$i],
                'stock' => 30,
                'weight' => $berat[$i],
                'ukuran' => $ukuran[$i],
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, tenetur? '
            ]);
        }
    }
}
