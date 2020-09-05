<?php
require 'get_dbconn.php';
require 'get_sql_insert_profile_statement.php';
get_dbconn();
$userid = 1;

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}

echo $email;
echo $password;

 if (isset($_POST['user_name']) && strlen($_POST['user_name'])>0){
 $user_name=$_POST['user_name'];
 }
if (isset($_POST['profile']) && strlen($_POST['profile']) > 0) {
    $profile = $_POST['profile'];
}

$sql = get_sql_insert_into_user_profile_statement($userid, $profile);
$result = pg_query($sql) or die('Query faild: ' . pg_last_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>11
</head>
<body>
<h1>プロフィール</h1>
<form method="POST" action="profile.php">
     名前:
    <label>
        <input type="text" name="user_name">
    </label><br />
    　自己紹介:
    <label>
        <textarea name="profile"></textarea>
    </label><br/>
    <input type="submit">
</form>
</body>
</html>
