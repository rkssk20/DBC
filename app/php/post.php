<?php
  $error = $title = $content = '';
  if (@$_POST['submit']) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (!$title) $error .= 'タイトルを記入してください。<br>';
    if (mb_strlen($title) > 15) $error .= 'タイトルは15文字以内で記入してください。<br>';
    if (!$content) $error .= '本文を記入してください。<br>';
    if (mb_strlen($content) > 300) $error .= 'タイトルは300文字以内で記入してください。<br>';
    if (!$error) {
      if($_SERVER['SERVER_NAME']=='localhost'){
        // ローカル開発環境
        $pdo = new PDO('mysql:host=mysql_dbc; dbname=dbc','root','password');
      }else{
        // AWS本番環境
        $HOST = getenv('DATABASE_HOST');
        $NAME = getenv('DATABASE_NAME');
        $USER = getenv('DATABASE_USER');
        $PASSWORD = getenv('DATABASE_PASSWORD');
        $pdo = new PDO("mysql:host=$HOST; dbname=$NAME","$USER","$PASSWORD");
      }
      $st = $pdo->query("INSERT INTO post(title,content) VALUES('$title','$content')");
      header('Location: post.php');
      exit();
    }
  }
  require 'form.php';
?>