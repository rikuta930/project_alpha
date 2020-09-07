<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mypage</title>
    <link rel="stylesheet" href="./css/reboot.min.css" />
    <link rel="stylesheet" href="./css/friendpage.css" />
    <link rel="stylesheet" href="./css/button.css" />
  </head>
  <body>
    <header class="header">
      <img src="./icon/logo.png" class="header__icon" />
      <div class="header__title">サービス名</div>
      <img src="./icon/search.png" class="header__search">
    </header>
    <div class="main-container">
      <div class="profile">
        <div class="profile__left">
          <img src="./icon/girl.png" alt="" width="100" height="100" class="profile__left__icon"/>
          <div class="profile__left__number">
            <div class="profile__left__follow">
              <h2 class="profile__follow-title">フォロー</h2>
              <p class="profile__follow-number" id="follow">5</p>
            </div>
            <div class="profile__left__follow">
              <h2 class="profile__follow-title">フォロワー</h2>
              <p class="profile__follow-number" id="follow">5</p>
            </div>
          </div>
        </div>
        <div class="profile__right">
          <h2 class="profile__right__name">Hana</h2>
          <div id="id" class="profile__right__id">aaaaaaa</div>
          <div id="divrofile" class="profile__right__introduction">
            自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介自己紹介
          </div>
          <div class="profile__btn-wrapper">
            <button class="profile__btn">フォロー</button>
          </div>
        </div>
      </div>
      <hr>
      <div class="list">
        <a href="profile.php">
          <img src="./icon/girl.png" alt="" class="user_img">
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
          <img src="./icon/ear_black.png" alt="" width="30" height="30">
        </button>
        <p style="display:inline;" id="count">15</p>
        <hr>
      </div>
  <a href="timeline.php" class="btn btn--orange btn--circle btn--circle-a btn--shadow left">
    <img src="./icon/timeline.png" alt="" width="40" height="40">
  </a>
  <a href="form.php" class="btn btn--orange btn--circle btn--circle-a btn--shadow right">
    <img src="./icon/mic.png" alt="" width="30" height="50">
  </a>
  </body>
</html>

