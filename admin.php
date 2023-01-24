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
    session_regenerate_id(true);
    ?>

    
    <?php if (isset($_GET['error'])) : ?>
        <p class='text-danger'>入力されていません</p>
    <?php endif ?>
    <?php if (isset($_GET['none'])) : ?>
        <p class='text-danger'>存在しない、若しくは削除済みです</p>
    <?php endif ?>
    <form method="post" action="ban_conf.php">
    <div class="jumbotron">
        <fieldset>
            <legend>レビューBAN</legend>
            <label>ユーザーid：<input type="number" name="id"></label><br>
            <input type="submit" value="削除">
        </fieldset>
    </div>
</form>
</body>
</html>