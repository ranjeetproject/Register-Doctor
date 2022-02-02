<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\patient\PatientController;



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
            $prescriptionNotification= new PatientController();
            $data['patientNotification']=$prescriptionNotification->patientPrescriptionNotification($user->id);
            $view->with($data); 
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
