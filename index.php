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
            $aflag = 1;
        }
    }
}
if ($aflag == 0) {
    header('location: ./signin.php');
}

?>


<html>
<head>
    <title>
        login
    </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">


</head>
<body>

<?php
echo "<p>LOGIN SUCCEED: " . $email . "</p>\n";
echo "<p><a href=\"./logout.php\">LOGOUT</a>";
?>

<a href="profile.php">プロフィールを編集</a>
</body>
</html>
