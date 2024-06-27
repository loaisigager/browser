<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InmueblesJsonSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(database_path('seeders/inmuebles.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('inmuebles')->insert([
                'Direccion' => $item['Direccion'],
                'Ciudad' => $item['Ciudad'],
                'Telefono' => $item['Telefono'],
                'MododePago' => $item['MododePago'],
                'Tipo' => $item['Tipo'],
                'Precio' => $item['Precio'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
