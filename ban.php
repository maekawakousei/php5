<?php
require_once("function.php");
session_start();



//2.DB接続します


$pdo=db_conn("PHP4");
$id=$_POST["id"];
$stmt = $pdo->prepare('DELETE FROM user_tb WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: admin.php');
    exit();
}