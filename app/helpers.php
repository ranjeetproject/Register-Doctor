<?php 
use App\Members;
use App\Models\FavouriteDoctor;
use App\Models\SiteSetting;
use App\User;


 function dateDifferent($date1, $date2)
{
    $date1 = $date1 ? $date1 : date('Y-m-d H:i:s');
    $date2 = $date2 ? $date2 : date('Y-m-d H:i:s');
  $date1 = strtotime($date1);
  $date2 = strtotime($date2);  

$diff = abs($date2 - $date1);  

$years = floor($diff / (365*60*60*24));  

$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  

$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 
  
$hours = floor(($diff - $years * 365*60*60*24  
       - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));  
  
$minutes = floor(($diff - $years * 365*60*60*24  
         - $months*30*60*60*24 - $days*60*60*24  
                          - $hours*60*60)/ 60);  
  
$seconds = floor(($diff - $years * 365*60*60*24  
         - $months*30*60*60*24 - $days*60*60*24 
                - $hours*60*60 - $minutes*60));

// return $time = ("%d years, %d months, %d days, %d hours, "
//      . "%d minutes, %d seconds", $years, $months, 
//              $days, $hours, $minutes, $seconds);

$time = '';
if($years > 0 ){
  $time .= ($years > 1) ? $years."years ": $years."year ";
  return $time;

}

if($months > 0 ){
  $time .= ($months > 1) ? $months."months ": $months."month ";
  return $time;
}

if($days > 0 ){
  // $time .= ($days > 1) ? "$days days ": "$days day ";
  $time .= $days."d ";
  return $time;
}

if($hours > 0 ){
  // $time .= ($hours > 1) ? "$hours hours ": "$hours hour ";
  $time .= $hours."h ";
  return $time;
}

if($minutes > 0 ){
  // $time .= ($minutes > 1) ? "$minutes minutes ": "$minutes minute ";
  $time .=  $minutes."m ";
} else{
    $time .=  '0m';
  return $time;
}

return $time;
}




function getUserDetails($id)
{
  $member = User::find($id);
  return $member ? $member : false ;
}

function getSetting($key)
{
  $setting = SiteSetting::where('key',$key)->first();
  return $setting ? $setting->value : '' ;
}

// function getLocaltime($){
//              $dt = new \DateTime();
//              $ts = strtotime($dt);
//              GMT+0530
//              $tz = new \DateTimeZone('Asia/Kolkata');
//              $dt->setTimezone($tz);
//              $ping->poll_time = $dt->format('Y-m-d H:i:s');
// }

function getFavDoc($doctor_id)
{
  $fav_doc = FavouriteDoctor::where('user_id', auth()->guard('sitePatient')->user()->id)->where('favourite_user_id',$doctor_id)->where('status',1)->first();
  // dd($fav_doc);
  return $fav_doc ? true : false;
}

function getChild()
{
  if(!empty(Session::get('parent_id')) ){
  $childs = User::find(Session::get('parent_id'));
  // print_r($childs); exit;
  // echo 'g'; exit;
  $childs = $childs->childs;
  }else{
  $childs = Auth::guard('sitePatient')->user()->childs;
  }
  // print_r($childs); exit;
  return $childs;

}

// function getTimeSlot($case_id)
// {
//   $get_time_slots_id = BookTimeSlot
// }

?>