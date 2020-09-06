<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mypage</title>
    <link rel="stylesheet" href="./css/reboot.min.css" />
    <link rel="stylesheet" href="./css/friendpage.css" />
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
      <div class="list">
        <img src="icon/girl.png" alt="" width="50" height="50" />
        <p>Hana</p>
        <br />
        <audio controls>
          <source src="#" type="audio/mp3" />
          <source src="#" type="audio/ogg" />
          <source src="#" type="audio/wav" />
          <p>（audio要素に非対応なブラウザ向けの表示）</p>
        </audio>
        <br />
        <p id="free-word">#嬉しい #happy</p>
        ​
        <button>
          <img src="icon/ear_black.png" alt="" width="50" height="50" />
        </button>
        <p id="count">15</p>
      </div>
    </div>
    <a href="timeline.php">
      <img src="./icon/timeline.png" alt="" />
    </a>
    <a href="form.php">
      <img src="./icon/mic.png" alt="" />
    </a>
  </body>
</html>

