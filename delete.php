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
require_once("function.php");
session_start();
$s_id=$_SESSION["id"];
$name  = $_POST['name'];

//2.DB接続します


$pdo=db_conn("PHP4");

$stmt = $pdo->prepare('SELECT id FROM user_tb WHERE name=:name');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$status = $stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
$r_id=$result[0];

//3.削除SQLを作成
$stmt = $pdo->prepare('DELETE FROM review_tb WHERE r_id = :r_id');
$stmt->bindValue(':r_id', $r_id, PDO::PARAM_STR);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: user.php');
    exit();
}
    ?>
</body>
</html>