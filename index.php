<?php
require 'get_dbconn.php';
require 'get_sql_select_statement.php';

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$aflag = 0;
if (isset($email) && isset($password)) {
    $sql = get_sql_select_statement($email);
    get_dbconn();
    $result = pg_query($sql) or die('Query failed: ' . pg_last_error());
    if (pg_num_rows($result) == 1) {
        $row = pg_fetch_row($result);
        if (password_verify($password, $row[4])) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $aflag = 1;
        }
    }
}
if ($aflag == 0) {
    header('location: ./signin.php');
}

?>


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
  <button type="button" name="edit" onclick="profile.php">プロフィール編集</button>
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
