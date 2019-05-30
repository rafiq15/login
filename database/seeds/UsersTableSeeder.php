<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $moderatorRole = Role::where('name', 'moderator')->first();
        $csrRole = Role::where('name', 'csr')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $moderator = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('moderator')
        ]);

        $csr = User::create([
            'name' => 'Csr',
            'email' => 'csr@gmail.com',
            'password' => bcrypt('csr')
        ]);

        $admin-> roles()->attach($adminRole);
        $moderator-> roles()->attach($moderatorRole);
        $csr-> roles()->attach($csrRole);
    }
}
