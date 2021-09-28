<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid as Generator;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'    => Generator::uuid4()->toString(),
                'name'  => 'Superadmin',
                'slug'  => 'superadmin'
            ],
            [
                'id'    => Generator::uuid4()->toString(),
                'name'  => 'Admin',
                'slug'  => 'admin'
            ],
            [
                'id'    => Generator::uuid4()->toString(),
                'name'  => 'Cashier',
                'slug'  => 'cashier'
            ]
        ]);
    }
}
