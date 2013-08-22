<?php
namespace Davzie\LaravelBootstrap\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleSettingsSeeder extends Seeder {

    public function run()
    {

        $types = [
            [
                'key'           => 'application_name',
                'label'         => 'Application Name',
                'value'         => 'Laravel Bootstrap'
            ]
        ];
        DB::table('settings')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}