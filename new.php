
<?php
require_once("function.php");
session_start();
$name = back("name");
$u_pw=back("u_pw");
$u_id=back("u_id");
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
    <form method="POST" action="post_conf.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">名前</label>
            <input type="text" class="form-control" name="name"
            id="name" aria-describedby="name"
            value="<?= $name ?>">

        </div>
        <div class="mb-3">
            <label for="u_id" class="form-label">ユーザーid</label>
            <input type="text" class="form-control" name="u_id"
            id="u_id" aria-describedby="u_id"
            value="<?= $u_id ?>">
        </div>
        <div class="mb-3">
            <label for="u_pw" class="form-label">ユーザーid</label>
            <input type="text" class="form-control" name="u_pw"
            id="u_pw" aria-describedby="u_pw"
            value="<?= $u_pw ?>">

        </div>


        <div class="mb-3">
            <label for="title" class="form-label">画像</label>
            <input type="file" name="img">
        </div>

        <button type="submit" class="btn btn-primary">確認する</button>
    </form>
</body>
</html>