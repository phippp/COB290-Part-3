<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\Employee;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(
            function(){
                $now = Carbon::now()->toArray();
                $specialists = Employee::has('specialist');
                foreach($specialists as $spec){
                    $days = explode(",",$spec->specialist->working_days);
                    $in = false;
                    foreach($days as $day){
                        if($day == substr(strtolower($now['englishDayOfWeek']), 0, 2)){
                            $in = true;
                            break;
                        }
                    }
                    $holidays = Holiday::where('employee_id', $spec->id)->whereRaw('? between start_date and end_date',[Carbon::now()]);
                    if($holidays == null && $in){
                        $spec->specialist->is_available = true;
                    } else {
                        $spec->specialist->is_available = false;
                    }
                    $spec->specialist->save();
                }
            }
        )->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
