<?php
require 'get_dbconn.php';
require 'get_sql_insert_profile_statement.php';
require 'get_sql_select_statement.php';

$dbconn = get_dbconn();

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}

if (isset($_POST['user_name']) && strlen($_POST['gender']) > 0) {
    $posted_user_name = $_POST['user_name'];
}

if (isset($_POST['gender']) && strlen($_POST['gender']) > 0) {
    $posted_gender = $_POST['gender'];
}

if (isset($_POST['profile']) && strlen($_POST['profile']) > 0) {
    $profile = $_POST['profile'];
}

$sql_for_user_information = get_sql_select_statement($email);
$user_information = pg_query($sql_for_user_information) or die('Query failed: ' . pg_last_error());

if (pg_num_rows($user_information) == 1) {
    $row = pg_fetch_row($user_information);
    $user_id = $row[0];
    $user_name = $row[1];
    $gender = $row[2];
}

$sql = get_sql_insert_into_user_profile_statement($user_id, $profile);
$user_information = pg_query($sql) or die('Query faild: ' . pg_last_error());

##ユーザー名を変更
if ($posted_user_name == True) {
    $sql_for_change_user_name = "UPDATE phpua SET uname='" . $posted_user_name . "' WHERE uid='" . $user_id . "';";
    $change_user_name = pg_query($sql_for_change_user_name) or die('Query failed: ' . pg_last_error());
}

##性別を変更
if ($posted_gender == True) {
    $sql_for_change_gender = "UPDATE phpua SET gender='" . $posted_gender . "' WHERE uid='" . $user_id . "';";
    $change_gender = pg_query($sql_for_change_gender) or die('Query failed: ' . pg_last_error());
}
?>

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
    <p>ID:a</p>
    <div class="form">
      <form method="POST" action="#">
      <label>名前
        <br>
        <input type="text" name="user_name"></label>
        <br>
      <label>
          <select name="gender">
              <option value="man">男性</option>
              <option value="woman">女性</option>
              <option value="other">その他</option>
              <option value="noanswer">無回答</option>
          </select>
      </label>
        <br>
      <label>自己紹介
        <br>
        <textarea name="profile"></textarea>
      </label>
        <br>
    <input type="submit" value="変更">
    </form>
    </div>
    <a href="index.php">←</a>
  </div>
</body>
</html>
