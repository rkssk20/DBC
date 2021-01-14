<?php

require 'db.php';

try{

    $stmt = $pdo->prepare("INSERT INTO users (user, password) VALUES (:user, :password)");

    // 配列を使い、userにはPOSTされたuser、passwordにはhash化する関数を使う
    $stmt->execute(array(':user' => $_POST['user'],':password' => password_hash($_POST['pass'], PASSWORD_DEFAULT)));

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録</h1>
    <form action="" method="post">
        <p>
            <label>ユーザー名：</label>
            <input type="text" name="user">
        </p>

        <p>
            <label>パスワード：</label>
            <input type="password" name="pass">
        </p>

        <input type="submit" name="submit" value="会員登録する">
    </form>
</body>
</html>
