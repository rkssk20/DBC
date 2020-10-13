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
      $pdo = new PDO('mysql:host=testdb.cppaencyzjj6.ap-northeast-1.rds.amazonaws.com; dbname=dbc','mysql_dbc','password');
      $st = $pdo->query("INSERT INTO post(title,content) VALUES('$title','$content')");
      header('Location: post.php');
      exit();
    }
  }
  require 'form.php';
?>