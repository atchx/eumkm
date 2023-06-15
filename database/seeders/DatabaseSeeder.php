<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabkot;
use App\Models\Kecamatan;
use App\Models\Desa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Jokowi',
            'email' => 'jokowi@gmail.com',
            'password' => Hash::make('jokowi'),
            'nohp' => '081234567890'
        ]);
        User::create([
            'name' => 'Prabowo',
            'email' => 'prabowo@gmail.com',
            'password' => Hash::make('prabowo'),
            'nohp' => '089876543210'
        ]);

        Provinsi::create([
            'nama_provinsi' => 'Sumatera Utara'
        ]);
        Provinsi::create([
            'nama_provinsi' => 'Sumatera Barat'
        ]);

        Kabkot::create([
            'provinsi_id' => '1',
            'nama_kabkot' => 'Kabupaten Deli Serdang'
        ]);
        Kabkot::create([
            'provinsi_id' => '1',
            'nama_kabkot' => 'Kota Medan'
        ]);
        Kabkot::create([
            'provinsi_id' => '2',
            'nama_kabkot' => 'Kabupaten Pasaman Barat'
        ]);
        Kabkot::create([
            'provinsi_id' => '2',
            'nama_kabkot' => 'Kabupaten Pesisir Selatan'
        ]);

        Kecamatan::create([
            'kabkot_id' => '1',
            'nama_kecamatan' => 'Percut Sei Tuan'
        ]);
        Kecamatan::create([
            'kabkot_id' => '1',
            'nama_kecamatan' => 'Tanjung Morawa'
        ]);
        Kecamatan::create([
            'kabkot_id' => '2',
            'nama_kecamatan' => 'Medan Amplas'
        ]);
        Kecamatan::create([
            'kabkot_id' => '2',
            'nama_kecamatan' => 'Medan Tembung'
        ]);
        Kecamatan::create([
            'kabkot_id' => '3',
            'nama_kecamatan' => 'Pasaman'
        ]);
        Kecamatan::create([
            'kabkot_id' => '3',
            'nama_kecamatan' => 'Sungai Aur'
        ]);
        Kecamatan::create([
            'kabkot_id' => '4',
            'nama_kecamatan' => 'Airpura'
        ]);
        Kecamatan::create([
            'kabkot_id' => '4',
            'nama_kecamatan' => 'Lunang'
        ]);

        Desa::create([
            'kecamatan_id' => '1',
            'nama_desa' => 'Percut'
        ]);
        Desa::create([
            'kecamatan_id' => '1',
            'nama_desa' => 'Tembung'
        ]);
        Desa::create([
            'kecamatan_id' => '2',
            'nama_desa' => 'Aek Pancur'
        ]);
        Desa::create([
            'kecamatan_id' => '2',
            'nama_desa' => 'Bandar Labuhan'
        ]);
        Desa::create([
            'kecamatan_id' => '3',
            'nama_desa' => 'Amplas'
        ]);
        Desa::create([
            'kecamatan_id' => '3',
            'nama_desa' => 'Harjosari'
        ]);
        Desa::create([
            'kecamatan_id' => '4',
            'nama_desa' => 'Bandar Selamat'
        ]);
        Desa::create([
            'kecamatan_id' => '4',
            'nama_desa' => 'Sidorejo'
        ]);
        Desa::create([
            'kecamatan_id' => '5',
            'nama_desa' => 'Aia Gadang'
        ]);
        Desa::create([
            'kecamatan_id' => '5',
            'nama_desa' => 'Aua Kuniang'
        ]);
        Desa::create([
            'kecamatan_id' => '6',
            'nama_desa' => 'Sungai Aua'
        ]);
        Desa::create([
            'kecamatan_id' => '6',
            'nama_desa' => 'Sungai Aua 2'
        ]);
        Desa::create([
            'kecamatan_id' => '7',
            'nama_desa' => 'Inderapura Utara'
        ]);
        Desa::create([
            'kecamatan_id' => '7',
            'nama_desa' => 'Pulau Rajo Inderapura'
        ]);
        Desa::create([
            'kecamatan_id' => '8',
            'nama_desa' => 'Nagari Lunang'
        ]);
        Desa::create([
            'kecamatan_id' => '8',
            'nama_desa' => 'Nagari Sindang Lunang'
        ]);
    }
}
