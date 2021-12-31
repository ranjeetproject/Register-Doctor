<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateChildToAdult;
use DB;
use App\User;
use App\Models\ChildToAdult;

class ChildToAdultCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'child_to_adult:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Childs to adult on his 18th birthday';

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
        $childs = User::wherehas('profile',function ( $query) {
                $query->where(DB::raw('DATEDIFF(SYSDATE(), dob)/365.25'),'>',18);
                // ->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 30 DAY),dob) / 365.25)'),18);
            })
            ->where('role',4)
            ->get();

        foreach($childs as $child) {
            // dd($child->parents);
            $patient = ChildToAdult::where('user_id',$child->id)->where('status',0)->first();
            User::where('id',$child->id)->update([
                    'email' => $patient->email,
                    'role' => 2,
                    'password' => $patient->password
            ]);
            
        }

        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
