<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportDatabase extends Command
{
    protected $signature = 'db:import';
    protected $description = 'Importa la base de datos desde un archivo SQL';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $path = database_path('sql/bienesraices.sql');
        DB::unprepared(file_get_contents($path));
        $this->info('Base de datos importada con éxito.');
    }
}
