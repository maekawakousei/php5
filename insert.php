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
/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
session_start();
$s_id=$_SESSION["id"];
$name = $_POST['name'];
$eva = $_POST['eva'];
$comment = $_POST['comment'];
require_once("function.php");
$pdo=db_conn("PHP4");
//３．データ登録SQL作成
$stmt = $pdo->prepare('SELECT id FROM user_tb WHERE name=:name');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$status = $stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
$r_id=$result[0];


// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO
                        review_tb(id, s_id,r_id,eva, comment)
                        VALUES(NULL, :user_id,:r_id, :eva, :comment)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':user_id', $s_id, PDO::PARAM_INT);
$stmt->bindValue(":r_id",$r_id,PDO::PARAM_INT);
$stmt->bindValue(':eva', $eva, PDO::PARAM_INT);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: user.php');
}
?>
</body>
</html>