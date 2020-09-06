<?php
require '../get_dbconn.php';
$dbconn = get_dbconn();
session_start();
if (isset($_SESSION['uid'])) {
  $uid = $_SESSION['uid'];
}

$time = date("Y-m-d H:i:s");
$filename = "./data/" . $_POST['fname'] . '.wav';
$result=@move_uploaded_file($_FILES["sound"]["tmp_name"], $filename);

$sql = "INSERT INTO recorded_voice(uid, file_name, time)
  VALUES('" . $uid . "','" . $filename . "','" . $time . "');";
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
