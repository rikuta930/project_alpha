<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mypage</title>
    <link rel="stylesheet" href="css/reboot.min.css">
    <link rel="stylesheet" href="css/mypage.css">
  </head>
  <body>
<div class="main-container">
  <img src="icon/girl.png" alt="" width="100" height="100">
   <div class="follow">
     <p>フォロー</p>
     <p id="follow">5</p>
   </div>
   <div class="follower">
     <p>フォロワー</p>
     <p id="follow">5</p>
   </div>
  <h2>Hana</h2>
  <p id="id">ID:aaaaaaa</p>
  <p id="profile">自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介</p>
  <div class="FollowButton">
　　　　　<button id="follow-button" class="open" onClick="onClickFollow()">
　　　　　　　　　　<span id="follow-no" style="display: block">フォローする</span>　　　
　　　　　　　　　　<span id="follow-yes" style="display: none">フォロー中</span>
　　　　　</button>
  </div>
 </div>
<hr>

  <div class="secound-container">
    <img src="icon/girl.png" alt="" width="50" height="50">
    <p>Hana</p>
    <br>
  <audio controls>
     <source src="#" type="audio/mp3">
     <source src="#" type="audio/ogg">
     <source src="#" type="audio/wav">
     <p>（audio要素に非対応なブラウザ向けの表示）</p>
  </audio>
    <br>
    <p id="free-word">
      #嬉しい #happy
    </p>
​
  <button>
    <img src="icon/ear_black.png" alt="" width="50" height="50">
  </button>
  <p id="count">15</p>
  <hr>
  </div>
    <a href="timeline.php">
      <img src="icon/timeline.png" alt="">
    </a>
    <a href="form.php">
      <img src="icon/mic.png" alt="" >
    </a>
</body>
</html>
