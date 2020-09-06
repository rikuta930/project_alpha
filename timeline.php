<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>timeline</title>
  <link rel="stylesheet" href="css/reboot.min.css">
  <link rel="stylesheet" href="css/timeline.css">
</head>
<body>
  <header class="header">
    <div class="header__icon"><img src="icon/logo.png" class="header__icon" width="50" height="50"></div>
    <div class="header__title">サービス名</div>
    <div class="header__search"><img src="icon/search.png" class="header__search" width="20" height="20"></div>
  </header>
  <div class="main-container">
    <a href="profile.php">
      <img src="icon/girl.png" alt="" class="user_img">
    </a>
    <a href="profile.php">
      <h2 style="display:inline;">Taro</h2>
    </a>
    <br>
  <audio controls>
     <source src="#" type="audio/mp3">
     <source src="#" type="audio/ogg">
     <source src="#" type="audio/wav">
     <p>（audio要素に非対応なブラウザ向けの表示）</p>
  </audio>
    <p style="display:inline;" id="free-word">
      #嬉しい #happy
    </p>

    <button class="hear" type="button">
      <img src="icon/ear_black.png" alt="" width="30" height="30">
    </button>
    <p style="display:inline;" id="count">15</p>
  </div>
  <hr>
  <div class="donut">
    <a href="#blueLink" class="right">
    </a> <br>
    <a href="#RedLink" class="left">
    </a>
  </div>
    <a href="timeline.php">
      <img src="icon/timeline.png" alt="">
    </a>
    <a href="form.php">
      <img src="icon/mic.png" alt="" >
    </a>
</body>
</html>
