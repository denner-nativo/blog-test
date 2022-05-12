<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'Admin', 'active'=> true],
            ['name'=>'Supervisor', 'active'=> true],
            ['name'=>'Blogger', 'active'=> true],
        ];
        Role::insert($data);
    }
}
