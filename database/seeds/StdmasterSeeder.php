<?php

use Illuminate\Database\Seeder;

class StdmasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Stdmaster::class)->create([
            'name' => 'PG',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'Pre-Nursery',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'Nursery',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'KG',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'I',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'II',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'III',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'IV',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'V',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'VI',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'VII',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'VIII',
        ]);
        factory(App\Stdmaster::class)->create([
            'name' => 'IX',
        ]);

        factory(App\Stdmaster::class)->create([
            'name' => 'X',
        ]) ->each(function ($stdmaster) {
            $stdmaster->fees()->saveMany(factory(App\Fee::class,5)->create());
            $stdmaster->stds()->saveMany(factory(App\Std::class,2)->create()
            ->each(function ($std) {
                $std->students()->saveMany(factory(App\Student::class,5)->create()
                ->each(function ($student) {
                    $student->guardians()->saveMany(factory(App\Guardian::class,2)->create());
                    $student->user()->save(factory(App\User::class)->create()->assignRole('Student')
                    // ->each(function ($user) {
                    //     $user->assignRole('Student'); 
                    // })
                );
                })
            );
            })
        );
            }
        );
    }
}
