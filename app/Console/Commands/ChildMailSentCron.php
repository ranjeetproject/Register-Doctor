<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateChildToAdult;
use DB;
use App\User;

class ChildMailSentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'child_mail_sent:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parents mail sent before childs are adult';

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
        \Log::info("Cron is working fine!");

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);

        */
        //30 days earlier sent mail
        $childs = User::with('parents')
            ->wherehas('profile',function ( $query) {
                $query->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 30 DAY),dob) / 365.25) - (FLOOR(DATEDIFF(DATE(NOW()),dob) / 365.25))'),1)
                ->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 30 DAY),dob) / 365.25)'),18);
            })
            ->where('role',4)
            ->get();

        foreach($childs as $child) {
            // dd($child->parents);
            $patient = User::select('name','email')->where('id',$child->parents->user_id)->first();

            Mail::to($patient->email)->send(new CreateChildToAdult($child, $patient->name));
        }

        //15 days earlier
        $childs = User::with('parents')
            ->wherehas('profile',function ( $query) {
                $query->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 15 DAY),dob) / 365.25) - (FLOOR(DATEDIFF(DATE(NOW()),dob) / 365.25))'),1)
                ->where(DB::raw('FLOOR(DATEDIFF(DATE_ADD(DATE(NOW()),INTERVAL 15 DAY),dob) / 365.25)'),18);
            })
            ->where('role',4)
            ->get();

        foreach($childs as $child) {
            // dd($child->parents);
            $patient = User::select('name','email')->where('id',$child->parents->user_id)->first();

            Mail::to($patient->email)->send(new CreateChildToAdult($child, $patient->name));
        }

        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
