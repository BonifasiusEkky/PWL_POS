<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'KMJ001',
                'barang_nama' => 'Kemeja Putih',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'CLN002',
                'barang_nama' => 'Celana Jeans',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'SPH003',
                'barang_nama' => 'Smartphone Samsung',
                'harga_beli' => 3000000,
                'harga_jual' => 3500000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'LPT004',
                'barang_nama' => 'Laptop HP',
                'harga_beli' => 6000000,
                'harga_jual' => 6500000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'PN001',
                'barang_nama' => 'Panci Stainless Steel',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'BLD002',
                'barang_nama' => 'Blender Philips',
                'harga_beli' => 400000,
                'harga_jual' => 450000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'SHM003',
                'barang_nama' => 'Shampoo Dove',
                'harga_beli' => 30000,
                'harga_jual' => 35000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'SBN004',
                'barang_nama' => 'Sabun Mandi Lux',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'KPI001',
                'barang_nama' => 'Kopi Arabika',
                'harga_beli' => 50000,
                'harga_jual' => 60000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'TEH002',
                'barang_nama' => 'Teh Hijau',
                'harga_beli' => 30000,
                'harga_jual' => 35000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
