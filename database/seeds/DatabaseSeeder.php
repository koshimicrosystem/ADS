<?php

use App\Stdmaster;
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
        $this->call(StdmasterSeeder::class);

        $faculty = factory(App\Faculty::class, 10)
            ->create()
            ->each(function ($faculty) {
                $user=$faculty->user()->save(factory(App\User::class)->make());
                $user->assignRole('Faculty');   
            });
    }
}
