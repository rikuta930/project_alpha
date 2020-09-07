<?php
require 'get_dbconn.php';
$dbconn = get_dbconn();

session_start();
if(isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
}

$sql = "SELECT * FROM recorded_voice WHERE uid = '". $_SESSION['uid'] ."' AND murmur_id = -1;";
$result = pg_query($sql) or die('Query faild: ' .pg_last_error());

$sql = "SELECT max(id) FROM murmur WHERE uid = '". $_SESSION['uid'] ."';";
$result_max = pg_query($sql) or die('Query faild: ' .pg_last_error());

$murmur_id_max = pg_fetch_row($result_max);
$murmur_id = $murmur_id_max[0];

if(isset($_POST['murmur_id'])){
    $sql = "UPDATE recorded_voice SET murmur_id = '". $murmur_id ."' WHERE uid = '". $uid ."' AND murmur_id = -1;";
    $result = pg_query($sql) or die('Query failed:' . pg_last_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php while ($row = pg_fetch_row($result)): ?>
    <audio
        controls
        src="./recup/data/<?php print($row[2]);?>">
            Your browser does not support the
            <code>audio</code> element.
    </audio>
    <form action="" method="post">
            <button type="submit" name="murmur_id" value="<?php echo $murmur_id;?>">これを選択!</button>
    </form>
    <br>
<?php endwhile; ?>
</body>
</html>

