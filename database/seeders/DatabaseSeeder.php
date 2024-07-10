<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder

{
    public function run(): void
    {
        DB::table('halagos')->insert([
            'Ciudad' => 'Boaco',
            'Halagos'=> '¡¡¡ La Ciudad de Dos Pisos',

        ]);
    }
}
