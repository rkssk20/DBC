<?php

require 'db.php';

$errorMessage = "";
// issetで変数が存在するか
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
    // select countでレコード数を取得
    $sql = 'select count(*) from users where username=? and password=?';
    // prepareでsqlに入力をセット
    $stmt = $pdo->prepare($sql);
    // execuseで実行
    $stmt->execute(array($username,$password));
    // fetchで結果を配列で取得
    $result = $stmt->fetch();
    $stmt = null;
    $pdo = null;

    // レコード数が0でなければok
    if ($result[0] != 0){
      include('form.php');
    exit;

    }else{
      $errorMessage = "入力に間違いがあります";
    }

  }catch (PDOExeption $e) {
    echo $e->getMessage();
    exit;
  }
}