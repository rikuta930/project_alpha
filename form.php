<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <button class="rec__start__btn">録音</button>
        </div>
        <div class="rec__stop">
          <img src="./icon/not_talking.png" class="rec__stop__icon">
          <button class="rec__stop__btn">停止</button>
        </div>
      </div>
      <h2>ハッシュタグ</h2>
      <form action="" class="form">
        <select class="form__info"　name="gender">
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
        <select class="form__info"　name="gender">
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
          placeholder="#嬉しい"
        ></textarea><br />
        <div class="form__btn-wrapper">
          <button class="form__btn">公開</button>
        </div>
      </form>
      <a href="#"><img src="./icon/arrow.png" class="btn-arrow"></a>
    </div>
  </body>
</html>
