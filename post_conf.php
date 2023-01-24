<?php
require_once("function.php");
session_start();
$name=$_SESSION["name"]=$_POST["name"];
$u_pw=$_SESSION["u_pw"]=$_POST["u_pw"];
$u_id=$_SESSION["u_id"]=$_POST["u_id"];

if(!(emp_check($name)&&emp_check($u_pw)&&emp_check($u_id))){
    redirect("aaa.php");
}

if ($_FILES['img']['name'] !== '') {
    $file_name = $_SESSION['post']['file_name'] = $_FILES['img']['name'];
    $image_data = $_SESSION['post']['image_data'] = file_get_contents($_FILES['img']['tmp_name']);
    $image_type = $_SESSION['post']['image_type'] = exif_imagetype($_FILES['img']['tmp_name']);
} else {
    $file_name = $_SESSION['post']['file_name'] = '';
    $image_data = $_SESSION['post']['image_data'] = '';
    $image_type = $_SESSION['post']['image_type'] = '';
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
<form method="POST" action="register.php" enctype="multipart/form-data" class="mb-3">

        <div class="mb-3">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="hidden"name="name" value="<?= $name ?>">
            <p><?= $name ?></p>
        </div>

        <div class="mb-3">
            <label for="u_pw" class="form-label">u_pw</label>
            <input type="hidden"name="u_pw" value="<?= $u_pw ?>">
            <p><?= $u_pw ?></p>
        </div>

        <div class="mb-3">
            <label for="u_id" class="form-label">u_id</label>
            <input type="hidden"name="u_id" value="<?= $u_id ?>">
            <p><?= $u_id ?></p>
        </div>

 
        <?php if ($image_data) :?>
            <div class="mb-3">
                <img src="img.php">
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">投稿</button>
    </form>
</body>
</html>