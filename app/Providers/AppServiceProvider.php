<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\patient\PatientController;
use App\Http\Controllers\doctor\DoctorController;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('frontend.patient.afterloginlayout.common_sidebar',function($view)
        {
            $user = Auth::guard('sitePatient')->user();
            if($user){
            $prescriptionNotification= new PatientController();
            $data['patientNotification']=$prescriptionNotification->patientPrescriptionNotification($user->id);
            $view->with($data); 
            }
        });

        view()->composer('*',function($view)
        {
            $user = Auth::guard('siteDoctor')->user();
            if($user){
                $appointmentsNotification= new DoctorController();
                $data['doctorAppointmentNotification']=$appointmentsNotification->doctorAppointmentNotification($user->id);
                $data['doctorCreatePrescriptionNotification']=$appointmentsNotification->doctorPrescriptionNotification($user->id);
                $data['doctorTotalBookingNotification']=$appointmentsNotification->doctorBookingNotification($user->id);
                $view->with($data); 
            }
            

        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}