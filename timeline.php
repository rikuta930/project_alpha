<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>timeline</title>
  <link rel="stylesheet" href="css/reboot.min.css">
  <link rel="stylesheet" href="css/timeline.css">
  <link rel="stylesheet" href="css/button.css">
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
      <audio
              controls
              src="./recup/data/229406.wav">
          Your browser does not support the
          <code>audio</code> element.
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
  <a href="timeline.php" class="btn btn--orange btn--circle btn--circle-a btn--shadow left">
    <img src="icon/timeline.png" alt="" width="40" height="40">
  </a>
  <a href="form.php" class="btn btn--orange btn--circle btn--circle-a btn--shadow right">
    <img src="icon/mic.png" alt="" width="30" height="50">
  </a>
</body>
</html>
