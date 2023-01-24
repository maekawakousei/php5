<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();
if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    exit('LOGIN ERROR');
}else{
session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}

$name=$_SESSION["name"];
echo "こんにちは".$name;
?>

<form method="post" action="insert.php">
    <div class="jumbotron">
        <fieldset>
            <legend>レビュー投稿</legend>
            <label>ユーザー名：<input type="text" name="name"></label><br>
            <label>評価：<input type="number" name="eva" id=""></label><br>
            <label>感想<textArea name="comment" rows="4" cols="40"></textArea></label><br>
            <input type="submit" value="送信">
        </fieldset>
    </div>
</form>

<form method="post" action="delete.php">
    <div class="jumbotron">
        <fieldset>
            <legend>レビュー削除</legend>
            <label>ユーザー名：<input type="text" name="name"></label><br>
            <input type="submit" value="削除">
        </fieldset>
    </div>
</form>
</body>
</html>