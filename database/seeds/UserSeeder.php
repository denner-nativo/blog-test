<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user = [
            'name' => "Superadmin",
            'lastname' => "Blog",
            'email' => 'admin@blog.com',
            'last_login' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => Str::random(10),
            'active' => true,
            'role_id' => 1
        ];

        User::insert($admin_user);
    }
}
