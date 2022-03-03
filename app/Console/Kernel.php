<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\SetQuickQuestionCost;
use App\Models\PatientCase;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ChildMailSentCron::class,
        Commands\ChildToAdultCron::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('child_mail_sent:cron')
        //     // ->dailyAt('13:00');
        //     ->everyMinute();
        // $schedule->command('child_to_adult:cron')
        // ->dailyAt('23:00');
        $schedule->call(function(){
            // $today = Carbon::now()->format('yy-m-d');
            // $count = Customer::whereDate('created_at', $today)->get()->count();
            // Log::channel('data_channel')->info("Total New Customers Today: ".$count);
            $date = date('Y-m-d H:i:s');
            $quickQuestionCost = SetQuickQuestionCost::first();
            $sub_date = date('Y-m-d H:i:s', strtotime($date. ' -'.$quickQuestionCost->set_quick_question_time_doctor.' hours'));
            $responses = PatientCase::where('accept_status',1)->where('questions_type',3)->where('accept_time','>',$sub_date)->update([
                'accept_time' => null,
                'accept_status' => null,
                'doctor_id' => null
            ]);

        })
        ->everyMinute();
        // ->everyMinute();
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
