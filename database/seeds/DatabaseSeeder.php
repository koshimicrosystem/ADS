<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(userseeder::class);
        $users = factory(App\User::class, 350)
           ->create()
           ->each(function ($user) {
                $user->assignRole('Student');
            });
    }
}
