<?php

session_start();
require_once('function.php');




$name=$_POST["name"];
$u_pw=$_POST["u_pw"];
$u_id=$_POST["u_id"];
$img = '';


if(!(emp_check($name)&&emp_check($u_pw)&&emp_check($u_id))){
    redirect("aaa.php");
}

if ($_SESSION['post']['image_data'] !== "") {
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
    file_put_contents("../images/$img", $_SESSION['post']['image_data']);
}

//2. DB接続します
$pdo = db_conn("php4");

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO user_tb(
                            id,name,u_id,u_pass,eva,bool,img
                        )VALUES(
                            NULL, :name,:u_id,:u_pass, 0,false,:img
                        )');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':u_pass',$u_pw,PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('index.php');
}