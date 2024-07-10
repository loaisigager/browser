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
            ['Ciudad'=>'Boaco', 'Halagos'=>	'🥰​🥰​!!! La Ciudad de Dos Pisos ¡¡¡ 🥰​🥰​'],
            ['Ciudad'=>'Carazo', 'Halagos'=>'🎭​🎭​​!!! La Cuna del Güegüense ¡¡¡ 🎭​🎭​​'],
            ['Ciudad'=>'Chinandega','Halagos'=>'🥳​🥳​!!! Como mi Ron Flor no hay ¡¡¡ 🥳​🥳​'],
            ['Ciudad'=>'Chontales'	,'Halagos'=>'🤠​🤠​!!! Donde los Rios son de Leche y las Piedras de Cuajadas ¡¡¡🤠​🤠​'],
            ['Ciudad'=>'Costa Caribe Norte','Halagos'=>'​💥​💥​!!! Viva Palo de Mayo ¡¡¡​💥​💥​'],
            ['Ciudad'=>'Costa Caribe Sur',	'Halagos'=>'🔥​🔥​!!! Mayo Ya ¡¡¡🔥​🔥​'],
            ['Ciudad'=>'Esteli','Halagos'=>'💎​💎​!!! El Diamante de Las Segovias ¡¡¡💎​💎​'],
            ['Ciudad'=>'Granada','Halagos'=>'📷​📷​!!! La Gran Sultana ¡¡¡📷​📷​'],
            ['Ciudad'=>'Jinotega','Halagos'=>'☕​☕​!!! La Ciudad de las Brumas ¡¡¡☕​☕​'],
            ['Ciudad'=>'Leon','Halagos'=>'🦁​🦁​!!! Viva Leon Jodido ¡¡¡🦁​🦁​'],
            ['Ciudad'=>'Madriz','Halagos'=>'​🌽​🌽​!!! Tus Rosquillas Nuestro Orgullo ¡¡¡​🌽​🌽​'],
            ['Ciudad'=>'Managua','Halagos'=>'​😎​😎​!!! Managua Linda Managua !!!​😎​😎​'],
            ['Ciudad'=>'Masaya','Halagos'=>'​✨​✨​!!! La Ciudad de las Flores ¡¡¡​✨​✨​'],
            ['Ciudad'=>'Matagalpa','Halagos'=>'​💣​💣​!!! La Perla del Septentrión ¡¡¡​💣​💣​'],
            ['Ciudad'=>'Nueva Segovia','Halagos'=>'​​👻​👻​!!! Tierra de Mitos y Leyendas ¡¡¡​​👻​👻​'],
            ['Ciudad'=>'Rio San Juan','Halagos'=>'​​💯​💯​!!! El Rio San Juan es Nica ¡¡¡​​💯​💯​'],
            ['Ciudad'=>'Rivas','Halagos'=>'​​☀️​🌊​!! Las Mejores Playas del Pais ¡¡¡​​☀️​🌊​'],


        ]);
    }
}
