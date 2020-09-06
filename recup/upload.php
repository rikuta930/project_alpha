<?php
require '../get_dbconn.php';
session_start();
if (isset($_SESSION['uid'])) {
  $uid = $_SESSION['uid'];
}

$filename = "./data/" . $_POST['fname'];
$result=@move_uploaded_file($_FILES["sound"]["tmp_name"], $filename);

$sql = "INSERT INTO recorded_voice(uid, file_name)
  VALUES('" . $uid . "','" . $filename . "');";
$result = pg_query($sql) or die('Query faild: ' .pg_last_error());

if($result === true){
  echo "アップロード成功(" . $filename . ")！！";
}
else{
  echo "アップロード失敗！！";
}

?>
