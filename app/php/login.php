<?php

require 'db.php';

$errorMessage = "";
// issetで変数が存在するか
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  try {
    // select countでレコード数を取得
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user = :user');
    // execuseで実行
    $stmt->execute(array(':user' => $_POST['user']));
    // fetchで結果を配列で取得
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    $pdo = null;

    $errorMessage = $result;

    if(password_verify($_POST['pass'], $result['password'])){
      include('form.php');
    }else{
      $errorMessage = "ログイン認証に失敗しました";
    } 

  }catch (Exeption $e) {
    $errorMessage = "データベースの接続に失敗しました：";
    exit;
  }
}
