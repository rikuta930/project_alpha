<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="">
        <a href="#">←</a>
        <button>録音</button>
        <button>停止</button><br>
        <label>
            <input type="radio" name="gender" value="male">
        </label>男性
        <label>
            <input type="radio" name="gender" value="female">
        </label>女性<br>
        <label>
            <select>
                <option value="10">10代</option>
                <option value="20">20代</option>
                <option value="30">30代</option>
                <option value="40">40代</option>
                <option value="50">50代</option>
                <option value="60">60代</option>
                <option value="70">70代</option>
                <option value="80">80代</option>
                <option value="90">90代</option>
            </select>
        </label><br>
        <label for="free-word">フリーワード(任意)</label><br>
        <textarea id="free-word" cols="40" rows="8" placeholder="#嬉しい"></textarea><br>
        <button>送信</button>
    </form>
</body>
</html>