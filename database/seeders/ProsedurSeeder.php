<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProsedurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('prosedurs')->insert(
            [
                'deskripsi' => json_encode(['Prosedur belum tersedia. Silakan tambahkan langkah-langkahnya.'])
            ]
        );
    }
}
