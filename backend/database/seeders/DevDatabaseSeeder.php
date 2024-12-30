<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Services\Excel\Excel;
use Database\Seeders\Dev\AppSeeder;
use Illuminate\Database\Seeder;

class DevDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ini_set('memory_limit', '-1');
        $this->call(DatabaseSeeder::class);

        $excel = new Excel();
        $file = base_path() . '/database/seeders/data/dev_data.xlsx';
        $excel->excelSeeder($file);
    }
}
