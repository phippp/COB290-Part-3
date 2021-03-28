<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\ProblemLog;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //To run execute the following
        //php artisan db:seed --class=ProblemSeeder

        $clients = Employee::with('job')->whereHas('job', function ($query){
            $query->where('type','User');
        })->get();

        $specialists = Employee::with('job')->whereHas('job', function ($query){
            $query->where('type','Specialist');
        })->get();

        //create problems with no initial solutions
        for($i = 0; $i < 20; $i++){

            $specialist = $specialists->random();
            $client = $clients->random();
            $x = rand(0,100);

            //create new problem
            if($x % 4 == 0 || $x % 4 == 2){
                $newproblem = \App\Models\ProblemLog::factory()->create(
                    ['specialist_assigned' => true,'client_id' => $client->id, 'status' => 'In queue']
                );
            } else if($x % 4 == 1){
                $newproblem = \App\Models\ProblemLog::factory()->create(
                    ['specialist_assigned' => true,'client_id' => $client->id, 'status' => 'Verified']
                );
            } else {
                $newproblem = \App\Models\ProblemLog::factory()->create(
                    ['specialist_assigned' => true,'client_id' => $client->id, 'status' => 'Solved',
                    'solved_at' => CarbonImmutable::now()->addDays(rand(0,3))->addHours(rand(0,10)),'employee_id' => $specialist->id]
                );
            }

            //create tracker to assign the specialist to the task
            $tracker = \App\Models\SpecialistTracker::factory()->create(
                ['problem_log_id'=> $newproblem->id, 'employee_id' => $specialist->id]
            );

            //create notes
            $notes = \App\Models\ProblemNote::factory()->count(rand(0,4))->create(['problem_log_id' => $newproblem->id]);

            //create call history
            $calls = \App\Models\CallLog::factory()->count(rand(0,3))->create(
                ['client_id' => $newproblem->client_id, 'specialist_id' => $specialist->id, 'problem_log_id' => $newproblem->id]
            );

            //add final note with solution on it
            if($newproblem->status == "Solved"){

                $solution = \App\models\ProblemNote::factory()->create(
                    ['problem_log_id' => $newproblem->id, 'solution' => "This is a hardcoded solution"]
                );

            }

        }

        //create problems which dont have to have to have specialist assigned
        for($i = 0; $i < 35; $i ++){

            $specialist = $specialists->random();
            $client = $clients->random();
            $x = rand(0,100);

            //create problem
            if($x % 4 == 1 || $x % 4 == 3){
                $newproblem = \App\Models\ProblemLog::factory()->create(
                    ['specialist_assigned' => true,'client_id' => $client->id, 'status' => 'In queue']
                );
            } else if($x % 4 == 0){
                $newproblem = \App\Models\ProblemLog::factory()->create(
                    ['specialist_assigned' => true,'client_id' => $client->id, 'status' => 'Verified']
                );
            } else {
                if($x %6 != 0){ //2 out of 3 will not need specialists
                    $newproblem = \App\Models\ProblemLog::factory()->create(
                        ['specialist_assigned' => false,'client_id' => $client->id, 'status' => 'Solved','solved_at' => Carbon::now()]
                    );
                } else {
                    $newproblem = \App\Models\ProblemLog::factory()->create(
                        ['specialist_assigned' => true,'client_id' => $client->id, 'status' => 'Solved',
                        'solved_at' => CarbonImmutable::now()->addDays(rand(0,3))->addHours(rand(0,10)),'employee_id' => $specialist->id]
                    );
                }

            }

            if($newproblem->status == "Solved" && $newproblem->employee_id == null){
                //no comments should be made

                $solutions = ProblemLog::with(['notes'])->where([['status','Solved'],['id','<>',$newproblem->id]])->get();

                //add random solution
                $random = $solutions->random();
                $last = $random->notes->last();

                $solution = \App\models\ProblemNote::factory()->create(
                    ['problem_log_id' => $newproblem->id, 'solution' => $last->solution]
                );


            }else{
                //comments should be made

                //create tracker to assign the specialist to the task
                $tracker = \App\Models\SpecialistTracker::factory()->create(
                    ['problem_log_id'=> $newproblem->id, 'employee_id' => $specialist->id]
                );

                //create notes
                $notes = \App\Models\ProblemNote::factory()->count(rand(0,4))->create(['problem_log_id' => $newproblem->id]);

                //create call history
                $calls = \App\Models\CallLog::factory()->count(rand(0,3))->create(
                    ['client_id' => $newproblem->client_id, 'specialist_id' => $specialist->id, 'problem_log_id' => $newproblem->id]
                );

                //add final note with solution on it
                if($newproblem->status == "Solved"){

                    $solution = \App\models\ProblemNote::factory()->create(
                        ['problem_log_id' => $newproblem->id, 'solution' => "This is a hardcoded solution"]
                    );

                }

            }

        }

    }

}
