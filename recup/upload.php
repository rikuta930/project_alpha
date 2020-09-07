<?php
require '../get_dbconn.php';
$dbconn = get_dbconn();
session_start();
if (isset($_SESSION['uid'])) {
  $uid = $_SESSION['uid'];
}

$time = date("Y-m-d H:i:s");
$murmur_id = -1;
$filename = "./data/" . $_POST['fname'] . '.wav';
$result=@move_uploaded_file($_FILES["sound"]["tmp_name"], $filename);

$file = $_POST['fname']. '.wav';
$sql = "INSERT INTO recorded_voice(uid, file_name, time, murmur_id)
  VALUES('" . $uid . "','" . $file . "','" . $time . "','" . $murmur_id . "');";
$result = pg_query($sql) or die('Query faild: ' .pg_last_error());

$sql = "SELECT * FROM murmur WHERE uid = '". $user_id ."';";
$result = pg_query($sql) or die('Query faild: ' .pg_last_error());

if($result === true){
  echo "アップロード成功(" . $filename . ")！！";
}
else{
  echo "アップロード失敗！！";
}

?>
