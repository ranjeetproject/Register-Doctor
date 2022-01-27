<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Call</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
    <style type="text/css">
    *{
        margin:0px;
        padding:0px;
        box-sizing: border-box;
    }
    header.live-v-chat {
    position: static;
    box-shadow: 0px 0px 14px #ccc;
}
        button.dt-button, div.dt-button, a.dt-button {
            margin-left: 5px;
            padding: 0.3em 1em;
        }
        header.live-v-chat {
    padding: 10px;
    width: 100%;
    float: left;
}
header.live-v-chat img{
    width: 100px;
    float: left;
}
.btn.blue-button {
    padding: 12px 24px;
    border-radius: 50px;
    background: #0351d2;
    background: -moz-linear-gradient(right, #0351d2 0%, #25b5ff 100%);
    background: -webkit-linear-gradient(right, #0351d2 0%, #25b5ff 100%);
    background: linear-gradient(right, #0351d2 0%, #25b5ff 100%);
    border: 0px;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
     cursor: pointer;
}
.btn.blue-button:hover{
    background: #0351d2;
}
.btn.orange-button {
    padding: 12px 24px;
    border-radius: 50px;
    background: #fc490d;
    background: -moz-linear-gradient(left, #fc490d 0%, #e92b02 100%);
    background: -webkit-linear-gradient(left, #fc490d 0%, #e92b02 100%);
    background: linear-gradient(left, #fc490d 0%, #e92b02 100%);
    border: 0px;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    cursor: pointer;
}
.btn.orange-button:hover {
    background: #fc490d;

}
a.btn.back-button{
    padding: 10px 24px;
    border-radius: 50px;
    border:2px solid #0351d2;
    color:#0351d2;
    text-decoration: none;
    font-size: 16px;
    outline: none;
    text-transform: uppercase;
}
.btn.back-button:hover{
    border:2px solid #000;
    color:#000;
}
.card-footer.live-v-chat-footer {
    float: left;
    width: 100%;
    position: fixed;
    bottom: 0;
    text-align: center;
    padding: 20px;
    box-shadow: 0px 0px 8px #ccc;
    display:none;
    background:#fff;
}
.card-body.live-v-chat-body {
    width: 100%;
    float: left;
    height: calc(100vh - 157px);
}
.card-body.live-v-chat-body .videocallBg {
    display: flex;
    justify-content: left;
    align-items: center;
    height: 100%;
    float: left;
    width: 100%;
}
.local_video_div, .remote_video_div {
    width: 50%;
    height: 100%;
    display: block;
    float: left;
}
.local_video_div video, .remote_video_div video {
    height: calc(100vh - 157px);
    width: 100%;
    object-fit: cover;
    background: #000;
}
.col-md-6.text-center {
    float: right;
    padding: 18px;
    font-weight: 700;
    text-transform: uppercase;
    color:#0351d2;
}
.btn.btn-success.btn.blue-button.larch {
    width: 250px;
    padding: 23px;
    position: absolute;
    left: 50%;
    transform: translate(-125px);
}
@media(max-width:768px){
    .btn.blue-button,
.btn.orange-button,
a.btn.back-button{
    padding: 10px 14px;
    font-size:12px;
}
.local_video_div, .remote_video_div {
    width: 100%;
    max-width:100%;
    height: auto;
    display: block;
    float: left;
    max-height: 50%;
}
.local_video_div video, .remote_video_div video {
    height: 100%;
    width: 100%;
}
.card-body.live-v-chat-body .videocallBg {
    flex-wrap: wrap;
}
}
canvas {
    display: none !important;
}
    </style>

</head>
<body>
<header class="live-v-chat">
<div class="contanir">
            <div class="col-md-3">
                <img src="https://demos.mydevfactory.com/debkumar/registered-doctor/public/images/frontend/images/logo.jpg" alt="">
            </div>
            <div class="col-md-6 text-center">
                live Video Chat
            </div>

        </div>
</header>
@php

    $time_zone = d_timezone();
@endphp
<div class="card-body live-v-chat-body">

    <div class="videocallBg">
    {{-- <button id="btn-open-or-join-room" class="btn btn-success btn blue-button larch">Join Room</button> --}}
        @php
            $diff_timer = 0;
            $diff_timer_ref = 0;
        @endphp
        @foreach ($case->getBookingSlot as $time_slot)
            {{-- @if (date('H:i:s', strtotime($time_slot->getSlot->start_time)) <= date('H:i:s') and date('H:i:s', strtotime($time_slot->getSlot->end_time)) > date('H:i:s')) --}}
            {{-- test --}}
            {{-- @if (date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $time_slot->getSlot->start_time))) <= date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), date('H:i:s')))) and date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $time_slot->getSlot->end_time))) > date('H:i:s', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), date('H:i:s'))))) --}}
            @php
                $diff = strtotime(date('H:i:s', strtotime($time_slot->getSlot->end_time)))-strtotime(date('H:i:s'));
                // $diff_timer = $diff*1000;
                $diff_timer = 300*1000;
            @endphp
            <button id="btn-open-or-join-room" class="btn btn-success btn blue-button larch join">Join Room</button>
            {{-- @else
            @php

                $diff = strtotime(date('H:i:s', strtotime($time_slot->getSlot->start_time)))-strtotime(date('H:i:s'));
                $diff_timer_ref = $diff*1000;
            @endphp

            <button class="btn btn-success btn blue-button larch">Calling time {{ date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $time_slot->getSlot->start_time))).' -- '.date('H:i a', strtotime(timezoneAdjustmentFetch($time_zone, date('Y-m-d'), $time_slot->getSlot->end_time))) }}</button>
            @endif --}}

        @endforeach
        <div id="remote-video-container" class="remote_video_div"></div>
        <div id="local-video-container" class="local_video_div"></div>
    </div>
</div>
<div class="card-footer live-v-chat-footer">
    <input type="hidden" id="txt-roomid" class="form-control" placeholder="unique room Id">
    <button id="btn-open-or-join-room" class="btn btn-success btn blue-button">Join Room</button>
    {{-- <button id="start-recording" class="btn btn-warning">Record</button> --}}
    <button id="stop-recording" class="btn btn-danger btn orange-button" disabled>Call End</button>


    <a id="save-recording" class="btn btn-dark float-right back-button"
    href="{{ Auth::guard('siteDoctor')->check() ? route('doctor.dashboard') : route('patient.dashboard') }}"> Back </a>
</div>

<script src="../../resources/js/jquery-3.5.1.min.js" ></script>
<script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.min.js"></script>
<script src="https://cdn.webrtc-experiment.com:443/FileBufferReader.js"></script>
<script src="https://cdn.webrtc-experiment.com/MediaStreamRecorder.js"></script>
<script src="https://cdn.jsdelivr.net/npm/record-entire-meeting@1.0.2/Browser-Recording-Helper.js"></script>
<script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var connection = new RTCMultiConnection();
    // this line is VERY_important
    connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/'; // signalling channel

    // if you want audio+video conferencing
    connection.session = {
        audio: true,
        video: true
    };
    connection.sdpConstraints.mandatory = {
        OfferToReceiveAudio: true,
        OfferToReceiveVideo: true
    };


    var localVideoContainer = document.getElementById('local-video-container');// local video div container
    var remoteVideoContainer = document.getElementById('remote-video-container');// remote video div container
    var remoteStream = {};

    /**
     * When connection is made video is open with this code in your browser
     * **/
    connection.onstream = function (event) {
        var video = event.mediaElement;
        if (event.type == 'local') {
            localVideoContainer.appendChild(video);
        }
        if (event.type == 'remote') {
            remoteVideoContainer.appendChild(video);
            remoteStream = event.stream;
            // startRecording();
        }
    }

    // 7177121012021120405
    var roomid = document.getElementById('txt-roomid');
    roomid.value = '{{ $case->case_id }}';

    document.getElementById('btn-open-or-join-room').onclick = function () {
        console.log('join Room Button');
        this.disabled = true;
        connection.openOrJoin(roomid.value || 'predefined-roomid');
    }

    //this below section we are used for recording
    var mediaConstraints = {
        audio: true,
        video: true
    };

    function onMediaError(e) {
        console.error('media error', e);
    }

    var videosContainer = document.getElementById('remote-video-container');
    function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
        console.log('Capture user media');
        navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
    }

    /**
     * Start recording is hear
     **/
    function startRecording() {
        this.disabled = true;
        $("#start-recording").prop("disabled", true);
        $("#stop-recording").prop("disabled", false);
        $("#save-recording").prop("disabled", true);
        captureUserMedia(mediaConstraints, onMediaSuccess, onMediaError);
    }


    /**
     * If data available start recording and upload data in server with 50000000 milisecond
     * **/
    var mediaRecorder;
    function onMediaSuccess(stream) {
        var arrayOfStreams = [stream, remoteStream];
        mediaRecorder = new MultiStreamRecorder(arrayOfStreams);
        mediaRecorder.ondataavailable = function (blob) {
            uploadToPHPServer(blob);
        };
        mediaRecorder.start(50000000);
    }

    /**
     * Make the temp video file is hear and creation the object for send video file in server
     * **/
    function uploadToPHPServer(blob) {
        var file = new File([blob], 'msr-' + (new Date).toISOString().replace(/:|\./g, '-') + '.webm', {
            type: 'video/webm'
        });
        var formData = new FormData();
        formData.append('video_blob', file);
        formData.append('room_id', '{{ $case->case_id }}');
        formData.append('_token', 'yz2RRZcw4QTL0LpbnwWJigudAblwJHLyenpGSU5l');
        makeXMLHttpRequest('http://localhost/vim/public/admin/profile-verification-call-record-video', formData, function () {
            console.log('File upload is complete');
        });
    }

    /**
     * Thgis function I am used for server side rendering data save in server for video recording
     **/
    function makeXMLHttpRequest(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                callback();
            }
        };
        request.open('POST', url);
        request.send(data);
    }

    /*
    * This function I am used for stop recording and close connection
    * */

    document.querySelector('#stop-recording').onclick = function () {
        this.disabled = true;
        mediaRecorder.stop();
        $("#start-recording").prop("disabled", false);
        $("#save-recording").prop("disabled", false);
        $("#btn-open-or-join-room").prop("disabled", false);

        // connection closed code are below
        connection.getAllParticipants().forEach(function (pid) {
            connection.disconnectWith(pid);
        });
        connection.attachStreams.forEach(function (localStream) {
            localStream.stop();
        });
        connection.closeSocket();
    };
//   $(".btn.btn-success.btn.blue-button.larch").click(function(){
//     $(".btn.btn-success.btn.blue-button.larch").hide();
//     $(".card-footer.live-v-chat-footer").show();
//   });

    var doIt = function() {
        $("div.my").text("My message");
        this.disabled = true;
        mediaRecorder.stop();
        $("#start-recording").prop("disabled", false);
        $("#save-recording").prop("disabled", false);
        $("#btn-open-or-join-room").prop("disabled", false);
        // connection closed code are below
        connection.getAllParticipants().forEach(function (pid) {
            connection.disconnectWith(pid);
        });
        connection.attachStreams.forEach(function (localStream) {
            localStream.stop();
        });
        connection.closeSocket();
    }
    // if ({{ $diff_timer }}>0) {
    //  window.setTimeout(doIt, {{ $diff_timer }});
    // }
    // var doRef = function() {
    //     window.location.reload();
    // }
    // if ({{ $diff_timer_ref }}>0) {
    //     window.setTimeout(doRef, {{ $diff_timer_ref }});
    // }

$(".btn.btn-success.btn.blue-button.larch.join").click(function(){
    $(".btn.btn-success.btn.blue-button.larch.join").hide();
    $(".card-footer.live-v-chat-footer").show();
});

</script>
</body>
</html>
