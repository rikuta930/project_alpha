<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<h1>プロフィール</h1>
<form method="POST" action="profile.php">
    <!-- 名前: <input type="text" name="user_name"><br /> -->
    　<label>自己紹介: <textarea name="profile"></textarea></label><br/>
    <input type="submit">
</form>

<?php
require 'get_dbconn.php';

get_dbconn();
$userid = 1;

// if (isset($_POST['user_name']) && strlen($_POST['user_name'])>0){
// $user=$_POST['user_name'];
// }
if (isset($_POST['profile']) && strlen($_POST['profile']) > 0) {
    $profile = $_POST['profile'];
}

{
    $sql = "insert into user_profile(uid, profile)
  values('" . $userid . "','" . $profile .
        "');";
    $result = pg_query($sql) or die('Query faild: ' . pg_last_error());
}
?>
</body>
</html>
