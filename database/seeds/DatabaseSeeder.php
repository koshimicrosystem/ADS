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
        $users = factory(App\User::class, 150)
            ->create()
            ->each(function ($user) {
                $user->assignRole('Student');
            });

        $faculty = factory(App\Faculty::class, 50)
            ->create()
            ->each(function ($faculty) {
                $user=$faculty->user()->save(factory(App\User::class)->make());
                $user->assignRole('Faculty');   
            });
    }
}
