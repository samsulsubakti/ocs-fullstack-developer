<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Services\Excel\Excel;
use Database\Seeders\Prod\FieldTypeSeeder;
use Database\Seeders\Prod\FrameworkSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Auth\User::factory(10)->create();

        // \App\Models\Auth\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $excel = new Excel();
        $file = base_path() . '/database/seeders/data/prod_data.xlsx';
        $excel->excelSeeder($file);
    }
}
