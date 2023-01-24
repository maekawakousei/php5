<?php
//データベース接続
function db_conn($db_name,$db_id='root',$db_pw='',$db_host='localhost'){
    try {
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header('Location: ' . $file_name );
    exit();
}

//          SQL集
//where
function sql_wh($cul){
    $script ='WHERE ';
    foreach($cul as $i =>$value){
        if($i!=0){$script .=' AND ';}
        $script.=($value.'= :t'.$i);
    }
    return $script;
}

//bindvalue
function sql_bind($script,$values,&$stmt){
    foreach($values as $i =>$v){
        $target = ":t".$i;
        if(is_string($v)){
            $kind = PDO::PARAM_STR;
        }elseif(is_bool($v)){
            $kind = PDO::PARAM_BOOL;
        }elseif(is_integer($v)){
            $kind=PDO::PARAM_INT;
        }else{
            //エラー処理
            break;
        }
        $stmt->bindValue($target,$v,$kind);
    }
}

//update
function sql_up(){
}

//delete
function sql_del($table,$pdo,$cul,$target,$kind = 'int'){
    $script = 'DELETE FROM '.$table.' WHERE '. $cul . '= :target';
    $stmt = $pdo->prepare($script);
    if($kind=='int'){
        $stmt->bindValue(':target', $target, PDO::PARAM_INT);
        $status = $stmt->execute(); //実行
    }elseif($kind=='str'){
        $stmt->bindValue(':target', $target, PDO::PARAM_STR);
        $status = $stmt->execute(); //実行
    }elseif($kind=='bool'){
        $stmt->bindValue(':target', $target, PDO::PARAM_BOOL);
        $status = $stmt->execute(); //実行
    }else{
        //エラー表示
    }   
}

function back($name){
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    }else{
        return "";
    }
}

function emp_check($name){
    if(trim($name)===""){
       return false;
    }else{
        return true;
    }
}
?>