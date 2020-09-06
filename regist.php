<!DOCTYPE html>
<html lang="en">
<head>
<title>registration</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
require 'get_sql_insert_statement.php';
require 'get_sql_select_statement.php';
require 'get_dbconn.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
}
### 後で性別を追加する場合の変更点
//if (isset($_POST['gender'])) {
//    $gender = $_POST['gender'];
//}
if (isset($_POST['password_1'])) {
    $password_1 = $_POST['password_1'];
}
if (isset($_POST['password_2'])) {
    $password_2 = $_POST['password_2'];
}

$gender = 'men';

if ($password_1 !== $password_2) {
    echo "<p>パスワードが一致しませんでした。</p>";
    echo ">戻る</p>";
} elseif (isset($email) && isset($user_name) && isset($gender) && isset($password_1)) {
    $select_sql_for_register = get_sql_select_statement($email);
    get_dbconn();
    $result = pg_query($select_sql_for_register) or die('Query failed: ' . pg_last_error());
    if (pg_num_rows($result) == 0) {
        $npw = $password_1;
        $npwh = password_hash($npw, PASSWORD_BCRYPT);
        $insert_sql_for_register = get_sql_insert_statement($user_name, $gender, $email, $npwh);
        pg_query($insert_sql_for_register) or die('Query failed: ' . pg_last_error());
        echo '<p>ユーザ登録を完了しました</p>';
        $mailfr = "naoki@gms.gdl.jp";
        $mailsb = "[phpua]ユーザ登録完了";
        $mailms = "下記のとおりユーザ登録を完了しました。\n\n" .
            "   ユーザ名:" . $user_name . "\n" .
            "   email:" . $email . "\n\n" .
            "http://gms.gdl.jp/~naoki/phpuav3/\n\n";
        if (mb_send_mail($email, $mailsb,
            $mailms, "From: " . $mailfr)) {
            echo "<p>メールが送信されました。</p>";
        } else {
            echo "<p>メールの送信に失敗しました。</p>";
        }
        echo "<a href='signin.php'>戻る</a>";
    } else {
        echo "<p>そのメールアドレスはすでに登録されています。</p>";
        echo "<a href='signup.php'>戻る</a>";
    }
} else {
    echo 'error';
}
?>
</body>
</html>
