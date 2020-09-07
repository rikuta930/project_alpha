<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href="./css/reboot.min.css">
  <link rel="stylesheet" href="./css/signup.css">
<body>
  <header class="header">
    <div class="header__icon"><img src="icon/logo.png" class="header__icon"></div>
    <div class="header__title">VOISTORIES</div>
  </header>
  <div class="main-container">
    <h1>新規作成</h1>
    <div class="form">
      <form method="POST" action="regist.php">
        <label for="user_name">ユーザ名</label>
          <input type="text" name="user_name" id="user_name" class="form__info" size="40"><br>
        <select class="form__info"　name="gender">
          <option value="">性別</option>
          <option value="boy">男性</option>
          <option value="girl">女性</option>
          <option value="others">その他</option>
          <option value="none">無回答</option>
        </select>
        <label for="mail">メールアドレス</label>
          <input type="text" name="email" id="mail" class="form__info" size="40"><br>
        <label for="pw">パスワード</label>
          <input type="password" name="password_1" id="pw" class="form__info" size="40"><br>
        <label for="re-pw">パスワード(確認用)</label>
          <input type="password" name="password_2" id="re-pw" class="form__info" size="40"><br>
        <div class="form__btn-wrapper">
          <input class="form__btn" type="submit" value="登録">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
