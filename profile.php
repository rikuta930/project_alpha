<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="css/reboot.min.css">
  <link rel="stylesheet" href="css/profile.css">
</head>
<body>
  <div class="main-container">
    <h1>プロフィール編集</h1>
    <img src="image/profile.png" alt="" width="50" height="50">
    <p>MailAdress:abcdefg@bbbbb.com</p>
    <p>ID:aaaaaaa</p>
    <div class="form">
      <form method="POST" action="#">
      <label>名前
        <br>
        <input type="text" name="name"></label>
        <br>
      <label>
          <select>
              <option value="man">男性</option>
              <option value="woman">女性</option>
              <option value="other">その他</option>
              <option value="noanswer">無回答</option>
          </select>
      </label>
        <br>
      <label>自己紹介
        <br>
        <textarea name="introduction"></textarea>
      </label>
        <br>
    <input type="submit" value="変更">
    </form>
    </div>
    <a href="#">←</a>
  </div>
</body>
</html>
