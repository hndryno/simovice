<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'nama_perusahaan' => Str::random(10),
            'pic' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'telepon' => Str::length('aaaaaaaaaaa'),
        ]);
    }
}
