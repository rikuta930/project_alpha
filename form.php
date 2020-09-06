<?php
require 'get_dbconn.php';

$dbconn = get_dbconn();

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['filename'];
}

if (isset($_POST['gender']) && strlen($_POST['gender']) > 0) {
    $posted_gender = $_POST['gender'];
}

if (isset($_POST['age']) && strlen($_POST['age']) > 0) {
    $posted_age = $_POST['age'];
}

if (isset($_POST['freeword']) && strlen($_POST['freeword']) > 0) {
    $posted_freeword = $_POST['freeword'];
}

$sql = "insert into murmur(uid, gender, age, freeword)
  values('" . $uid . "','" . $posted_gender . "','" . $posted_age . "','" . $posted_freeword . "');";
$result = pg_query($sql) or die('Query faild: ' .pg_last_error());

$sql = "SELECT * FROM recorded_voice WHERE uid = '". $uid ."';";
$result = pg_query($sql) or die('Query faild: ' .pg_last_error());
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Form</title>
    <link rel="stylesheet" href="./css/reboot.min.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
<header class="header">
    <img src="./icon/logo.png" class="header__icon">
    <div class="header__title">サービス名</div>
</header>
<div class="main-container">
    <h2>つぶやき</h2>
    <div class="rec">
        <div class="rec__start">
            <img src="./icon/talking.png" class="rec__start__icon">
            <!--            <button class="rec__start__btn">録音</button>-->
            <button onclick="startRecording(this);">録音</button>
            <button onclick="stopRecording(this);" disabled>停止</button>
        </div>
        <div class="rec__stop">
            <img src="./icon/not_talking.png" class="rec__stop__icon">
            <!--            <button class="rec__stop__btn">停止</button>-->
        </div>
    </div>
    <ul id="recordingslist"></ul>
    <h2>ハッシュタグ</h2>
    <form action="" class="form" method="post">
        <select class="form__info" name="age">
            <option value="">年代</option>
            <option value="10">10代</option>
            <option value="20">20代</option>
            <option value="30">30代</option>
            <option value="40">40代</option>
            <option value="50">50代</option>
            <option value="60">60代</option>
            <option value="70">70代</option>
            <option value="80">80代</option>
            <option value="90">90代</option>
        </select><br>
        <select class="form__info" name="gender">
            <option value="">性別</option>
            <option value="boy">男性</option>
            <option value="girl">女性</option>
            <option value="others">その他</option>
            <option value="secret">無回答</option>
        </select><br>
        <label for="free-word">フリーワード(任意)</label>
        <textarea
                id="free-word"
                class="form__info"
                cols="40"
                rows="8"
                name="freeword"
                placeholder="#嬉しい"
        ></textarea><br/>
        <div class="form__btn-wrapper">
            <button class="form__btn">公開</button>
        </div>
    </form>
    <a href="#"><img src="./icon/arrow.png" class="btn-arrow"></a>
</div>


<h2>Log</h2>
<pre id="log"></pre>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    function __log(e, data) {
        log.innerHTML += "\n" + e + " " + (data || '');
    }

    var audio_context;
    var recorder;

    function startUserMedia(stream) {
        var input = audio_context.createMediaStreamSource(stream);
        audio_context.resume();
        __log('Media stream created.');

        // Uncomment if you want the audio to feedback directly
        //input.connect(audio_context.destination);
        //__log('Input connected to audio context destination.');

        recorder = new Recorder(input);
        __log('Recorder initialised.');
    }

    function startRecording(button) {
        recorder && recorder.record();
        button.disabled = true;
        button.nextElementSibling.disabled = false;
        __log('Recording..');
    }

    function stopRecording(button) {
        recorder && recorder.stop();
        button.disabled = true;
        button.previousElementSibling.disabled = false;
        __log('Stopped recording.');

        // create WAV download link using audio data blob
        createDownloadLink();

        recorder.clear();
    }


    function createDownloadLink() {
        recorder && recorder.exportWAV(function (blob) {
            var url = URL.createObjectURL(blob);
            var li = document.createElement('li');
            var au = document.createElement('audio');
            var hf = document.createElement('a');

            au.controls = true;
            au.src = url;
            hf.href = url;
            hf.download = new Date().toISOString() + '.wav';
            hf.innerHTML = hf.download;
            li.appendChild(au);
            li.appendChild(hf);
            recordingslist.appendChild(li);

            var random = Math.round(Math.random() * 1000000);
            var data = new FormData();
            data.append('fname', random)
            data.append('sound', blob, 'j.wav');

            $.ajax({
                url: "./recup/upload.php",
                type: 'POST',
                data: data,
                contentType: false,
                processData: false
            }).done(function (data) {
                console.log(data);
            });
        });

    };


    window.onload = function init() {
        try {
            // webkit shim
            window.AudioContext = window.AudioContext || window.webkitAudioContext;
            if (navigator.mediaDevices === undefined) {
                navigator.mediaDevices = {};
            }
            if (navigator.mediaDevices.getUserMedia === undefined) {
                navigator.mediaDevices.getUserMedia = function (constraints) {
                    // First get ahold of the legacy getUserMedia, if present
                    let getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

                    // Some browsers just don't implement it - return a rejected promise with an error
                    // to keep a consistent interface
                    if (!getUserMedia) {
                        return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
                    }

                    // Otherwise, wrap the call to the old navigator.getUserMedia with a Promise
                    return new Promise(function (resolve, reject) {
                        getUserMedia.call(navigator, constraints, resolve, reject);
                    });
                }
            }
            window.URL = window.URL || window.webkitURL;

            audio_context = new AudioContext;
            __log('Audio context set up.');
            __log('navigator.mediaDevices ' + (navigator.mediaDevices.length != 0 ? 'available.' : 'not present!'));
        } catch (e) {
            alert('No web audio support in this browser!');
        }

        navigator.mediaDevices.getUserMedia({audio: true})
            .then(function (stream) {
                startUserMedia(stream);
            })
            .catch(function (e) {
                __log('No live audio input: ' + e);
            });
    };
</script>

<script src="./recup/js/recorder.js"></script>
</body>
</html>
