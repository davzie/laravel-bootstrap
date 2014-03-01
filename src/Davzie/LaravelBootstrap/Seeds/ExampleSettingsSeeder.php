<?php
namespace Davzie\LaravelBootstrap\Seeds;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class ExampleSettingsSeeder extends Seeder {

    public function run()
    {

        $types = [
            [
                'key'           => 'application_name',
                'label'         => 'Application Name',
                'value'         => Config::get('laravel-bootstrap::app.name')
            ]
        ];
        DB::table('settings')->insert($types);
        $this->command->info('Settings Table Seeded With An Example Record');

    }

}
