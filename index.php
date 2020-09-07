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
            $_SESSION['uid'] = $row[0];
            $_SESSION['user_name'] = $row[1];
            $_SESSION['gender'] = $row[2];

            ###### 写真
            $profile_pic = "icon/" . $_SESSION['gender'] . ".png";


            ###### プロフィール
            $sql = "SELECT * FROM user_profile WHERE uid = '". $_SESSION['uid'] ."';";
            $result = pg_query($sql) or die('Query faild: ' .pg_last_error());

            if (pg_num_rows($result) == 1) {
                $row = pg_fetch_row($result);
                $profile = $row[2];
            }

            ######### タイムライン
            $sql = "SELECT * FROM recorded_voice WHERE uid = '". $_SESSION['uid'] ."';";
            $result = pg_query($sql) or die('Query failed: ' . pg_last_error());
            if (pg_num_rows($result) == 1) {
                $row = pg_fetch_row($result);
            }

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
  <img src="<?php echo $profile_pic;?>" alt="" width="100" height="100">
   <div class="follow">
     <p>フォロー</p>
     <p id="follow">5</p>
   </div>
   <div class="follower">
     <p>フォロワー</p>
     <p id="follow">5</p>
   </div>
  <h2><?php echo $_SESSION['user_name']?></h2>
  <p id="id">ID:<?php echo $_SESSION['uid'];?></p>
  <p id="profile"><?php echo $profile;?></p>
  <button type="button" name="edit" onclick="location.href='profile.php'">プロフィール編集</button>
</div>
<hr>
<?php foreach($row as $item):?>
  <div class="secound-container">
    <img src="<?php echo $profile_pic;?>" alt="" width="50" height="50">
    <p><?php echo $_SESSION['user_name'];?></p>
    <br>
  <audio controls>
     <source src="<?php echo $item[2];?>" type="audio/mp3">
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
<?php endforeach;?>


  </div>
    <a href="timeline.php">
      <img src="icon/timeline.png" alt="">
    </a>
    <a href="form.php">
      <img src="icon/mic.png" alt="" >
    </a>
</body>
</html>
