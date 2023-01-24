
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<br>
人気順

<?php
require_once("function.php");
$pdo=db_conn("PHP4");
$stmt= $pdo->prepare("SELECT name FROM user_tb ORDER BY eva DESC");
$status=$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
foreach($result as $i =>$value){    
    echo "<br>";
    echo $value;

    if($i>5){
        break;
    }
}

?>
<br>
<a href="login.php">ログイン</a>
<br>
<a href="new.php">アカウント制作</a>
<br>



</body>
</html>