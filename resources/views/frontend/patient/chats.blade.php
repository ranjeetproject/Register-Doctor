@extends('frontend.patient.afterloginlayout.app')

@section('content')
    <!-- <div class="col Post-prescription-right innerpage  Message-Doctor-to-Patient-Prescription-EL-Live-Chat-b-patient-end-page"> -->
    <div class="col Post-prescription-right Message-Doctor-to-Patient-via-Left-Hand-Navigation-page">
        <div class="row">
            <div class="col-sm-12">
               

                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb Pharmacist-doc-com">
                          <!-- <li class="breadcrumb-item"><a href="#">Dashboard <i class="fal fa-long-arrow-right"></i></a></li> -->
                          <li class="breadcrumb-item"><a href="#">Message Doctor to Patient</a></li>
                          <!-- <li class="breadcrumb-item active">Message</li> -->
                        </ol>
                      </nav>
                      <div class="row mb-20" style="
    margin-bottom: 12px;
">
        <div class="col-sm-5"></div>
        <div class="col-sm-7">
            <form class="form-inline for-chat-search">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected>Patient Name</option>
                        <option value="1">Patient ID</option>
                      </select>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Search..">
                <button type="submit" class="btn btn-primary blue-button">Submit</button>
              </form>
            </div>
    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="contacts-details">
                                <div class="contacts-title">
                                    <span>Contacts</span>
                                </div>
                                <div class="contacts-bottom">
                                    <a href="#" class="contacts-bottom-details">
                                        <div class="profile-img active">
                                            <img src="{{$case->doctor->profile->profile_photo}}" alt="">
                                        </div>
                                        <div class="profile-colnt">
                                            <div class="profile-colnt-det">
                                                {{-- <h3>Steve Doe <small>11:20 am</small></h3> --}}
                                                @if(!empty($case->doctor_id))
                                                <h3> {{$case->doctor->name}} <small></small></h3>
                                                @endif
                                            <p>Case Id. {{$case->case_id}} </p>
                                            </div>
                                            
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="chat-body" id="chat_list" style="height: 300px;">

                             <div class="chat-body-me">
                                    <div class="chat-body-left">
                                        <img src="{{ Auth::guard('sitePatient')->user()->profile->profile_photo }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <h3>You <small>{{date('d-m-Y h:i:s',strtotime($case->created_at))}}</small></h3>
                                        <p>{{$case->health_problem}}</p>
                                    </div>
                                </div>

                                 @if(!empty($case->casefile->file_name))
                                <div class="chat-body-me">
                                    <div class="chat-body-left">
                                        <img src="{{ Auth::guard('sitePatient')->user()->profile->profile_photo }}" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <h3>You <small>{{date('d-m-Y h:i:s',strtotime($case->created_at))}}</small></h3>
                                        <p></p>
                                 <img class="img-thumbnail mb-3" src="{{asset('public/uploads/cases/'.$case->casefile->file_name)}}">
                                    </div>
                                </div>
                                 @endif


                               




                                
                                {{-- <div class="chat-body-you tip">
                                    <div class="chat-body-left">
                                        <img src="images/msg-pic1.png" alt="">
                                    </div>
                                    <div class="chat-body-right">
                                        <img src="images/chat-dot.png" alt="">
                                    </div>
                                </div> --}}


                            </div>
                          <form method="post" id="upload_form" enctype="multipart/form-data">
                           @csrf
                              <input type="hidden" name="rec_user_id" id="rec_user_id" value="{{$case->doctor_id ?? ''}}">
                              <input type="hidden" name="case_id" id="case_id" value="{{$case->case_id}}">

                                <input type="text" name="message" id="message" placeholder="Type a new message..." class="chat-input" required>
                                <!-- <button type="button"><img src="{{ asset('public/images/frontend/images/cal-icon.png')}}" alt=""></button>
                                <button type="button"><img src="{{ asset('public/images/frontend/images/at-icon.png')}}" alt=""></button>  -->
                                 <button type="submit"><img src="{{ asset('public/images/frontend/images/chat-icon.png')}}" alt=""></button>
                            </form> 

                    


                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
   
@endsection
{{-- @section('scripts') --}}
@push('scripts')
   <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-app.js"></script>
{{-- <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script> --}}
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-firestore.js"></script>


{{-- <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-analytics.js"></script> --}}


<script>
   var firebaseConfig = {
    apiKey: "AIzaSyBsMAZz3cv4jvbQ0TIOJkuNyg2R4E92PKY",
    authDomain: "registered-doctor.firebaseapp.com",
    projectId: "registered-doctor",
    storageBucket: "registered-doctor.appspot.com",
    messagingSenderId: "157388494665",
    appId: "1:157388494665:web:16386a49e5ffc0929dac98",
    measurementId: "G-9JEFR47720"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

 
</script>

<script type="text/javascript">
  

var db = firebase.firestore();
// alert('jhghyfgh');





var chatDetails = [];
   var userId = '{{ Request::segment(2) }}';


db.collection("chats").where("case_id", "==", '{{$case->case_id}}').get().then((querySnapshot) => {
    querySnapshot.forEach((doc) => {
      var details = doc.data();
      chatDetails.push(details);
    });
});

// console.log(chatDetails);


setTimeout(() => {
 var onSnapshotchatDetails = []
db.collection("chats").where("case_id", "==", '{{$case->case_id}}').onSnapshot(function(querySnapshot) {
    querySnapshot.forEach((doc) => {
      var details = doc.data();
      console.log(details);
      onSnapshotchatDetails.push(details);
      if(chatDetails.length < onSnapshotchatDetails.length){
        chatDetails = onSnapshotchatDetails;

      loadData();
      }
    });
});


 }, 5000);


loadData();

function loadData() {

 setTimeout(() => {


   chatData = '';
  
   console.log('chatDetails');
   console.log(chatDetails);


  chatDetails = chatDetails.filter((v,i,a)=>a.findIndex(t=>(t.created_at === v.created_at))===i);
   chatDetails = _.sortBy( chatDetails, 'created_at' );

$.each(chatDetails, function (key, value) {
  var time = moment(value.created_at).format("DD-MM-YYYY h:mm:ss");
      if(value.sender_id != '{{Auth::guard('sitePatient')->user()->id}}' ){
         chatData += '<div class="chat-body-you"><div class="chat-body-left"><img src="{{$case->doctor->profile->profile_photo}}" alt=""></div><div class="chat-body-right"><h3>{{$case->doctor->name}}  <small>'+time+'</small></h3><p>'+value.message+'</p></div></div>';
        
      }else{
            chatData += '<div class="chat-body-me"><div class="chat-body-left"><img src="{{ Auth::guard('sitePatient')->user()->profile->profile_photo }}" alt=""></div><div class="chat-body-right"><h3>You <small>'+time+'</small></h3><p>'+value.message+'</p></div></div>';
      }
  });
// $(".overlay").hide();
$('#chat_list').append(chatData);
   console.log('chatData');
   console.log(chatData);

$('.chat-body').scrollTop($('.chat-body')[0].scrollHeight);
     
        }, 5000);

}







 $('#upload_form').on('submit', function(event){
 	// alert('ffffffff');
  event.preventDefault();
  if($('#image').val()){

  $.ajax({
   url:"",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
   console.log(data);
              var d = new Date();
              var currentTime = d.getTime();

                db.collection("chats").add({
                sender_id: {{ Request::segment(3) ??  '0' }},
                receiver_id: {{ Request::segment(4) ?? '0' }},
                image: data.data,
                read: false,
                message: document.getElementById('message').value,
                created: currentTime
            })

            .then(function(docRef) {
                console.log("Document written with ID: ", docRef.id);
            })
            .catch(function(error) {
                console.error("Error adding document: ", error);
            });
            document.getElementById('message').value ='';
   }
  })
} else {

  var d = new Date();
  var currentTime = d.getTime();
    db.collection("chats").add({
    sender_id: '{{ Auth::guard('sitePatient')->user()->id }}',
    receiver_id: document.getElementById('rec_user_id').value,
    case_id: document.getElementById('case_id').value,
    message: document.getElementById('message').value,
    created_at: currentTime
})

.then(function(docRef) {
    console.log("Document written with ID: ", docRef.id);
})
.catch(function(error) {
    console.error("Error adding document: ", error);
});
document.getElementById('message').value ='';
}
 });

  
 // });


</script>
@endpush
{{-- @endsection --}}