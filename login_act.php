<?php


session_start();
require_once("function.php");
//POST値
$u_id = $_POST['u_id'];
$u_pass = $_POST['u_pass'];

$pdo=db_conn("PHP4");


$stmt = $pdo->prepare('SELECT * FROM user_tb WHERE u_id = :u_id AND u_pass=:u_pass');
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_STR);
$stmt->bindValue(':u_pass', $u_pass, PDO::PARAM_STR); //* Hash化する場合はコメントする
$status = $stmt->execute();

$val = $stmt->fetch();
if( $val['id'] != '' ){
    //Login成功時
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION["id"]=$val["id"];
    $_SESSION['name']      = $val['name'];
    if($val["bool"]){
        redirect("admin.php");
    }else{
        redirect("user.php");
    }
    // redirect('select.php');
  }else{
    //Login失敗時(Logout経由)
    redirect('login.php');
  }


?>