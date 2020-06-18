<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AddRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
               'slug' => 'administrator',
               'name' => 'Administrator'
        ]);
        DB::table('roles')->insert([
                'slug' => 'subscriber',
                'name' => 'Subscriber'
        ]);
        DB::table('roles')->insert([
                'slug' => 'unsubscribed-member',
                'name' => 'Unsubscribed Member'
        ]);
    }
}
