<?php
use App\Members;
use App\Models\BookTimeSlot;
use App\Models\DoctorReview;
use App\Models\FavouriteDoctor;
use App\Models\SiteSetting;
use App\Models\TimeSlot;
use App\Models\ThumbsUp;
use App\Models\MaxId;
use App\Models\UserTimezone;
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

function reviewCalc($doctor_id)
{
    $user = User::withCount('doctorReview')->find($doctor_id);
    $get_review = DoctorReview::where('doctor_id',$doctor_id)->sum('rating');
    $review = 0;
    if($user->doctor_review_count > 0){
        $review = round(($get_review/$user->doctor_review_count));
    }
    return [$review,$user->doctor_review_count];
}

function getReview($doctor_id)
{
//   $user = User::withCount('doctorReview')->find($doctor_id);
//   $get_review = DoctorReview::where('doctor_id',$doctor_id)->sum('rating');
//   $review = 0;
//   if($user->doctor_review_count > 0){
//   $review = round(($get_review/$user->doctor_review_count));
//   }
  $review_array = reviewCalc($doctor_id);
  $review = $review_array[0];

  if ($review==5) {
    return '<i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star reting"></i>';
  }

  elseif ($review==4) {
    return '<i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star"></i>';
  }

  elseif ($review==3) {
    return '<i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
  }

  if ($review==2) {
    return '<i class="fas fa-star reting"></i><i class="fas fa-star reting"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
  }

  elseif ($review==1) {
    return '<i class="fas fa-star reting"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
  }else{
    return '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
  }


}


 function getNearestSlot($doctor_id)
{
  $user = User::find($doctor_id);
  $booked_slot = BookTimeSlot::select('time_slot_id')->get()->toArray();
  $nearest_day = TimeSlot::select('*')->where('user_id',$doctor_id)->whereHas('availableDays',function($query){
    $query->where('date','>=',date('Y-m-d'));
  })->whereDoesntHave('bookedSlot',function($query) use($booked_slot){
    $query->whereIn('time_slot_id',$booked_slot);
  })->first();

  return $nearest_day;
}

function getThumbsUp($created_by) {
   $thumbsup =  ThumbsUp::where('created_by',$created_by)->count();
   if($thumbsup) {
       $axd = (int)$asd = $thumbsup/12;
       if($axd>5) {
           return 5;
       }
       return $axd;
   }
   return $thumbsup;
}

function getDiffOfTwoDateInMinute($date1)
{
    // $time = new DateTime();
    // $diff = $time->diff(new DateTime($date1));
    // return $minutes = ($diff->days * 24 * 60) +
    //            ($diff->h * 60) + $diff->i;
    return (strtotime($date1) - time()) / 60;

}

function findOutBSTStartEndDate($year){
    // $year = Date('Y');
    $start_date = date('Y-m-d 01:00:00', strtotime('last sunday of March ' . $year));
    $end_date = date('Y-m-d 02:00:00', strtotime('last sunday of October ' . $year));
    return [$start_date, $end_date];
}

function d_timezone($parm='')
{

    if($parm) {
  	// Initialize cURL.
    $ch = curl_init();

	// Set the URL that you want to GET by using the CURLOPT_URL option.
	curl_setopt($ch, CURLOPT_URL, 'https://ipgeolocation.abstractapi.com/v1/?api_key=90ecf805e4b5424bae7a7eff374a9307');

	// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	// Execute the request.
	$data = curl_exec($ch);

	// Close the cURL handle.
	curl_close($ch);

	// Print the data out onto the page.
	// echo $data;
	$data_obj = json_decode($data);
    // dd($data_obj);
    // dd($data_obj,$data_obj->timezone);
    $user = UserTimezone::firstOrNew(array('user_id' => auth()->user()->id));
    if (!empty($data_obj)) {
        # code...
        $user->time_zone = $data_obj->timezone->name;
        $user->date = date('Y-m-d');
    }
    $user->save();
    // return $data_obj->timezone->name;
    } else {
        $data = UserTimezone::where('user_id',auth()->user()->id)->first();
        return $data->time_zone;
    }
}

function timezoneAdjustmentFetch($timezone, $date, $time) {
    // https://ipgeolocation.abstractapi.com/v1/?api_key=403446a0b17545e696d6159ac5d2d48c&ip_address=198.16.66.124
    // https://timezone.abstractapi.com/v1/convert_time?api_key=3395c724236f484bb6eaf53d49d8b3cf&base_location=Oxford, United Kingdom&base_datetime=2020-05-18 07:00:00&target_location=west_bengal, in
    // $year = date('Y', strtotime($date));
    // $dateTime = $date.' '.$time;
    // // dd($dateTime);
    // $start_date = date('Y-m-d 01:00:00', strtotime('last sunday of March ' . $year));
    // $end_date = date('Y-m-d 01:00:00', strtotime('last sunday of October ' . $year));

    // if((strtotime($start_date) <= strtotime($dateTime) )&& ( strtotime($dateTime)<  strtotime($end_date)) ) {
    //     $timestamp = strtotime($time) + 60*60;

    //     return date('H:i', $timestamp);
    // } else {
    //     return $time;
    // }
    $datetime = $date.' '.$time;
    $tz_from = 'UTC';
    $tz_to = $timezone;
    $format = 'Y-m-d H:i:s';
    // echo $datetime . "\n";
    $dt = new DateTime($datetime, new \DateTimeZone($tz_from));
    $dt->setTimeZone(new \DateTimeZone($tz_to));
    return $dt->format($format);

}

function timezoneAdjustmentFetchTwo($timezone, $datetime) {
    // https://ipgeolocation.abstractapi.com/v1/?api_key=403446a0b17545e696d6159ac5d2d48c&ip_address=198.16.66.124
    // https://timezone.abstractapi.com/v1/convert_time?api_key=3395c724236f484bb6eaf53d49d8b3cf&base_location=Oxford, United Kingdom&base_datetime=2020-05-18 07:00:00&target_location=west_bengal, in
    // $year = date('Y', strtotime($date));
    // $dateTime = $date.' '.$time;
    // // dd($dateTime);
    // $start_date = date('Y-m-d 01:00:00', strtotime('last sunday of March ' . $year));
    // $end_date = date('Y-m-d 01:00:00', strtotime('last sunday of October ' . $year));

    // if((strtotime($start_date) <= strtotime($dateTime) )&& ( strtotime($dateTime)<  strtotime($end_date)) ) {
    //     $timestamp = strtotime($time) + 60*60;

    //     return date('H:i', $timestamp);
    // } else {
    //     return $time;
    // }
    // $datetime = $date.' '.$time;
    $tz_from = 'UTC';
    $tz_to = $timezone;
    $format = 'Y-m-d H:i:s';
    // echo $datetime . "\n";
    $dt = new DateTime($datetime, new \DateTimeZone($tz_from));
    $dt->setTimeZone(new \DateTimeZone($tz_to));
    return $dt->format($format);

}

function timezoneAdjustmentStore($timezone, $datetime) {
    // $year = date('Y', strtotime($dateTime));
    // $start_date = date('Y-m-d 01:00:00', strtotime('last sunday of March ' . $year));
    // $end_date = date('Y-m-d 02:00:00', strtotime('last sunday of October ' . $year));
    // if($start_date <= $dateTime && $dateTime > $end_date) {
    //     return Carbon::parse($dateTime)->subHour();
    // } else {
    //     return $dateTime;
    // }
    $tz_from = $timezone;
    $tz_to = 'UTC';
    $format = 'Y-m-d H:i:s';
    // echo $datetime . "\n";
    $dt = new DateTime($datetime, new \DateTimeZone($tz_from));
    $dt->setTimeZone(new \DateTimeZone($tz_to));
    return $dt->format($format);
}

//direct chat unique id
function getDirectChatId($id)
{
    return 'DC'.str_pad($id,12,"0",STR_PAD_LEFT);
}

//sicknote unique id
function getSickNoteId()
{
    $max_id = MaxId::where('key_p','sicknoteid')->first();
    $stock_max_id = $max_id->value_p;
    $max_id->value_p =  $max_id->value_p+1;
    $max_id->save();
    return 'SN'.date('ymd').strtoupper(substr(date('l'),0,2)).str_pad($stock_max_id,6,"0",STR_PAD_LEFT);
}

function getQuestionTypeNumberToString($value)
{
    if($value == 1) {
        return 'Live Chat';
    } elseif($value == 2) {
        return 'Live Video';
    } elseif($value == 3) {
        return 'Live Video';
    } else {
        return 'Typed Booked Question';
    }
}
?>
