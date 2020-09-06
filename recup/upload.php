<?php


$filename = "./data/" . $_POST['fname'];
$result=@move_uploaded_file($_FILES["sound"]["tmp_name"], $filename);
if($result === true){
  echo "アップロード成功(" . $filename . ")！！";
}
else{
  echo "アップロード失敗！！";
}

?>
