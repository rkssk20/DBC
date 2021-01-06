<?php

session_start();

require 'db.php';

$errorMessage = "";

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  if(empty($user)){
    $errorMessage = 'ユーザー名を入力してください';
  }else if(empty($pass)){
    $errorMessage = 'パスワードを入力してください';
  }

  if(!empty($user) && !empty($pass)){
    try {
      $stmt = $pdo->prepare('SELECT * FROM users WHERE user = :user');
      $stmt->execute(array(':user' => $_POST['user']));
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if(password_verify($_POST['pass'], $result['password'])){
        $_SESSION['USER'] = $result['user'];
        header('Location:form_page.php');
      }else{
        $errorMessage = "ログイン認証に失敗しました";
      } 

    }catch (Exeption $e) {
      $errorMessage = "データベースの接続に失敗しました：";
      exit;
    }
  }
}