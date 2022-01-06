<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewYearAdvise;
use DB;
use App\User;
use App\Models\TimeSlot;
use App\Models\DoctorAvailableDays;
use Illuminate\Support\Carbon;

class NewYearAdviseCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'new_year_advise:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'New year wising doctor and advise regular weekly timetable';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("child to patient account Cron is working fine!");

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);

        */
        //child to patient account
        $doctors = User::with('weeklyAvailableDays')
            ->where('role',2)
            ->get();
        $startDate = date('Y-m-d');
        $endDate = date('Y').'-12-31';
        foreach($doctors as $doctor) {
            // foreach($doctor->weeklyAvailableDays as $doctor_avail) {
            //     for($i = strtotime(ucfirst($doctor_avail->day), strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i)){
            //         $date = date('Y-m-d', $i);

            //         $from_date_time =  $date.' '.$doctor_avail->from_time;
            //         $to_date_time =  $date.' '.$doctor_avail->to_time;

            //         $from_date_time = Carbon::parse($from_date_time);

            //         $total_minutes = $from_date_time->diffInMinutes($to_date_time);


            //         $available_day = new DoctorAvailableDays;
            //         $available_day->user_id = $doctor->id;
            //         $available_day->date = $date;
            //         $available_day->from_time = $doctor_avail->from_time;
            //         $available_day->to_time = $doctor_avail->to_time;
            //         $available_day->save();

            //         $number_of_slot = $total_minutes/15;
            //         $from_time = Carbon::parse($request->from_time,$time_zone);
            //         $to_time =Carbon::parse($request->from_time,$time_zone)->addMinutes(15);



            //         for ($j = 1; $j <= $number_of_slot; $j++) {
            //             $time_slot = new TimeSlot;
            //             $time_slot->user_id = $user->id;
            //             $time_slot->available_day_id = $available_day->id;
            //             $time_slot->start_time = $from_time->format('H:i');
            //             $time_slot->end_time = $to_time->format('H:i');
            //             $from_time = $from_time->addMinutes(15);
            //             $to_time = $to_time->addMinutes(15);
            //             $time_slot->save();
            //             // echo '<pre>';
            //             //    print_r($time_slot);
            //         }
            //             // exit;

            //     }
            // }
            Mail::to($doctor->email)->send(new NewYearAdvise($doctor));
        }

        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
