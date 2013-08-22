<?php
namespace Davzie\LaravelBootstrap\Seeds;
use Illuminate\Database\Seeder;
use Eloquent;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();
        $this->call('Davzie\LaravelBootstrap\Seeds\UserTable');
        $this->command->info('All Tables Seeded');
    }

}