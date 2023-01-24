<?php
session_start();
require_once('function.php');




$id=$_POST['id'];

if($id===""){
    redirect('admin.php?error');
}else{
    $_SESSION["id"]=$id;
    $pdo=db_conn("PHP4");
    $stmt = $pdo->prepare('SELECT * FROM user_tb WHERE id=:id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute(); //実行
    $val = $stmt->fetch();
    if( $val['id'] != '' ){
        $eva=$val['eva'];
        $name = $val['name'];

        // redirect('select.php');
      }else{
        //Login失敗時(Logout経由)
        redirect('admin.php?none');
      }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="ban.php" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <label for="id" class="form-label">id</label>
            <input type="hidden"name="id" value="<?= $id ?>">
            <div><?= $id ?></div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="hidden"name="name" value="<?= $name ?>">
            <div><?= $name ?></div>
        </div>
        <div class="mb-3">
            <label for="eva" class="form-label">評価</label>
            <input type="hidden"name="eva" value="<?= $eva ?>">
            <div><?= $eva ?></div>
        </div>

        
        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <a href="admin.php">前の画面に戻る</a>
</body>
</html>