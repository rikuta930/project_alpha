<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <link rel="stylesheet" href="css/reboot.min.css">
  <link rel="stylesheet" href="css/signin.css">
</head>
<body>
  <header class="header">
    <div class="header__icon">ロゴ</div>
    <div class="header__title">サービス名</div>
  </header>
  <div class="main-container">
    <h1>サインイン</h1>
    <div class="form">
      <form method="POST" action="./index.php">
      <label for="mail">メースアドレス</label>
      <input class="form__info" type="text" name="email" id="mail" size="40"><br>
      <label for="pw">パスワード</label>
      <input class="form__info" type="password" name="password" id="pw" size="40"><br>
      <div class="form__btn-wrapper">
        <input class="form__btn" type="submit" value="サインイン">
      </form>
      <p><a href="./signup.php" class="form__new">新規登録</a></p>
    </div>
    </div>
  </div>
</body>
</html>
