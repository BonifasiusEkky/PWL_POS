<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stock_id' => 1,
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => '2024-03-01',
                'stok_jumlah' => 50,
            ],
            [
                'stock_id' => 2,
                'barang_id' => 2,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-02',
                'stok_jumlah' => 100,
            ],
            [
                'stock_id' => 3,
                'barang_id' => 3,
                'user_id' => 1,
                'stok_tanggal' => '2024-03-03',
                'stok_jumlah' => 30,
            ],
            [
                'stock_id' => 4,
                'barang_id' => 4,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-04',
                'stok_jumlah' => 80,
            ],
            [
                'stock_id' => 5,
                'barang_id' => 5,
                'user_id' => 1,
                'stok_tanggal' => '2024-03-05',
                'stok_jumlah' => 120,
            ],
            [
                'stock_id' => 6,
                'barang_id' => 6,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-06',
                'stok_jumlah' => 60,
            ],
            [
                'stock_id' => 7,
                'barang_id' => 7,
                'user_id' => 1,
                'stok_tanggal' => '2024-03-07',
                'stok_jumlah' => 90,
            ],
            [
                'stock_id' => 8,
                'barang_id' => 8,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-08',
                'stok_jumlah' => 40,
            ],
            [
                'stock_id' => 9,
                'barang_id' => 9,
                'user_id' => 1,
                'stok_tanggal' => '2024-03-09',
                'stok_jumlah' => 70,
            ],
            [
                'stock_id' => 10,
                'barang_id' => 10,
                'user_id' => 2,
                'stok_tanggal' => '2024-03-10',
                'stok_jumlah' => 110,
            ],
        ];
        DB::table('t_stock')-> insert($data);
    }
}
