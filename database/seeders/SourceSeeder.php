<?php

namespace Database\Seeders;

use App\Models\Sources;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sources = [
            [
                'path' => 'MXE',
                'country_code' => 'MX',
                'country_name' => 'Mexico',
                'project_name' => 'MXE template',
                'enabled' => true
            ],
            [
                'path' => 'AU',
                'country_code' => 'AU',
                'country_name' => 'Australia',
                'project_name' => 'AU template',
                'enabled' => false
            ]
            ];

        Schema::disableForeignKeyConstraints();

        Sources::truncate();

        foreach ($sources as $source) {
            Sources::create($source);
        }

        Schema::enableForeignKeyConstraints();
    }
}
