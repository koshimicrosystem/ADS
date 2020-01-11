<?php

use App\Student;
use Illuminate\Database\Seeder;

class DueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        foreach ($students as $key => $student) {
            $fees = $student->std->stdmaster->fees;
            foreach ($fees as $key => $fee) {
                factory(App\Due::class)->create([
                    'fee_id' => $fee->id,
                    'student_id' => $student->id,
                    'name'=> $fee->name,
                    'amount'=>$fee->amount
                ]);
            }
        }
    }
}
