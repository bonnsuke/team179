<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'type_name' => 'A-type',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'type_name' => 'B-type',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'type_name' => 'C-type',
                'created_at' => Now(),
                'updated_at' => Now()
            ]
            
        ]);

    }
}
