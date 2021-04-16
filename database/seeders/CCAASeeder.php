<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CCAASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
{
DB::table('ccaas')->insert([
'nombre' => 'Cataluña',
'pais_id' => 1,
]);
}
}
