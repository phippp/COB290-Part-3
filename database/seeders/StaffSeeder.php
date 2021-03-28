<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //To run execute the following
        //php artisan db:seed --class=StaffSeeder

        //Create employees
        $employees = \App\Models\Employee::factory()->count(20)->create();

        foreach($employees as $employee){
            //Create users for employees
            $user = \App\Models\User::factory()->count(1)->create(['employee_id' => $employee->id]);

            //If employee is specialist make a specialist entry and add some problems
            if($employee->job->type == "Specialist"){

                $specialist = \App\Models\Specialist::factory()->count(1)->create(['employee_id' => $employee->id]);

                $skills = \App\Models\SpecialistSkill::factory()->count(rand(1,6))->create(['employee_id' => $employee->id]);

            }
        }

    }
}
