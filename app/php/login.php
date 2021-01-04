<?php

require 'db.php';

$errorMessage = "";
// issetで変数が存在するか
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  try {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user = :user');
    $stmt->execute(array(':user' => $_POST['user']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    unset($pdo, $stmt);

    // password_verifyで1つ目の引数のパスワードが2つ目の引数のhashのパスワードと一致するか調べる
    if(password_verify($_POST['pass'], $result['password'])){
      header('Location:form_page.php');
    }else{
      $errorMessage = "ログイン認証に失敗しました";
    } 

  }catch (Exeption $e) {
    $errorMessage = "データベースの接続に失敗しました：";
    exit;
  }
}